<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Progres;
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
        $progres = Progres::where('project_id', 'LIKE', '%' .$search. '%')
        ->orWhere('presentase', 'LIKE', '%' .$search. '%')
        ->orWhere('job_details', 'LIKE', '%' .$search. '%')
        ->orWhere('date', 'LIKE', '%' .$search. '%')
        ->paginate(5);
        // $projek = Project::where('name', 'LIKE', '%'. $search. '%')->paginate(2);
        // $progres = Progres::paginate(5);
    // return view('user.user',['user' => $data]);
    
       return view('progres.progres ',['progress' => $progres]);
    }
    public function add()
    {
        $projek = Project::all();
        $picture = Picture::all();
        return view('progres.progres-add',['project' => $projek, 'picture' => $picture]);
      
    }

    public function store(Request $request)
    {
        $progres = Progres::create([
            'project_id' => $request->project_id,
            'presentase' => $request->presentase,
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
        // $progres->pictures()->sync($request->pictures);
        return redirect('progres')->with('success','Progres Added Successfully');
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
     
    
        return redirect('progres')->with('success','Progres Edited Successfully');
   
    }

    public function progresdelete($id)
    {
        Progres::where('id', $id)->delete();
        return redirect()->route('progres')->with('success', 'Progress Deleted Successfully');
    }

    public function detail($id)
    {
      
        $progres = Progres::find($id);
        // $pictures = Picture::all();
        return view('progres.detailprogres', compact('progres'));
    } 
}