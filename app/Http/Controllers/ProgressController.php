<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Picture;
use App\Models\Progres;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $projek = Project::where('name', 'LIKE', '%' .$request->search. '%')->paginate(2);
        // } else {
        //     $projek = Project::paginate(2);
        //     $progres = Progres::paginate(2);
        // }
        $search = $request->search;
        $progres = Progres::with('project')
        ->when($search, function($query) use ($search) {
            $query->whereHas('project', function($query) use($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orWhere('presentase', 'LIKE', '%' .$search. '%')
        ->orWhere('job_details', 'LIKE', '%' .$search. '%')
        ->orWhere('date', 'LIKE', '%' .$search. '%');
        })
        ->paginate(5);
        // $projek = Project::where('name', 'LIKE', '%'. $search. '%')->paginate(2);
        // $progres = Progres::paginate(5);
    // return view('user.user',['user' => $data]);

       return view('progres.progres ',['progress' => $progres]);
    }
    public function add()
    {
        $projek = Project::join('offers', function($join) {
                $join->on('offers.project_id', '=', 'projects.id')
                    ->where('offers.status', '=', 0);
            })
            ->select(
                'projects.id AS id',
                DB::raw("CONCAT(projects.name,' - ',offers.number) AS name")
            )
            ->get();
        $picture = Picture::all();
        // $offer = Offer::all();
        $payment = Payment::all();
        return view('progres.progres-add',['project' => $projek, 'picture' => $picture, 'payment'=>$payment]);

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $progres = Progres::create([
            'project_id' => $request->project_id,
            // 'offer_id' => $request->$offer,
            // 'payment_id' => $request->payment_id,
            'presentase' => $request->presentase,
            'job_details' => $request->job_details,
            'date' => $request->date,
        ]);

        if($request->file('files')) {
            $alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

            foreach ($request->file('files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $random = substr(str_shuffle($alphanumeric), 0, 4);
                $filename = $progres->project->name.'-'.$random.now()->timestamp.'.'.$extension;
                $file->move(public_path('uploads/progres'), $filename);
                // $progres->pictures()->create([
                //     'image' => $filename
                // ]);

                Picture::create([
                    'progres_id' => $progres->id,
                    'image' => $filename
                ]);
            }
        }
        // $progres->pictures()->sync($request->pictures);
        return redirect('progres')->with('success','Progres berhasil ditambahkan!');
    }
    public function edit($slug)
    {
        $data = Progres::where('slug',$slug)->first();
        return view('progres.progres-edit',['progress' => $data]);
    }

    public function update(Request $request,$slug)
    {

        $progres = Progres::where('slug',$slug)->first();
        $progres->update([
            'presentase' => $request->persentase,
            'job_details' => $request->job_details,
            'date' => $request->date,
        ]);


        $alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        if($request->file('files')){
            foreach ($request->file('files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $random = substr(str_shuffle($alphanumeric), 0, 4);
                $filename = $progres->project->name.'-'.$random.now()->timestamp.'.'.$extension;
                $file->move(public_path('uploads/progres'), $filename);
                // $progres->pictures()->create([
                //     'image' => $filename
                // ]);

                Picture::create([
                    'progres_id' => $progres->id,
                    'image' => $filename
                ]);
            }
        }


        return redirect('progres')->with('success','Progres berhasil di update!');

    }

    public function progresdelete($id)
    {
        Progres::where('id', $id)->delete();
        return redirect()->route('progres')->with('success', 'Progress berhasil dihapus!');
    }

    public function detail($id)
    {

        $progres = Progres::find($id);
        // $pictures = Picture::all();
        return view('progres.detailprogres', compact('progres'));
    }
}