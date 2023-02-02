<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Progres;
use App\Models\Project;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
       $progres = Progres::all();

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
        return redirect('progres')->with('Success','Progres Added Successfully');
    }
    public function edit($slug)
    {
        $data = Progres::where('slug',$slug)->first();
        return view('progres.progres-edit',['progress' => $data]);
    }

    public function update(Request $request,$slug)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'-'.$extension;
            $request->file('image')->storeAs('uploads/progres', $newName);
            $request['uploads/progres'] = $newName;
        }

      
        $progres = Progres::where('slug',$slug)->first();
        $progres->update($request->all());
       
        return redirect('progres')->with('Success','Progres Added Successfully');
   
    }

    public function progresdelete($id)
    {
        Progres::where('id', $id)->delete();
        return redirect()->route('progres')->with('Success', 'Progress Deleted Successfully');
    }

    public function detail($id)
    {
      
        $progres = Progres::find($id);
        // $pictures = Picture::all();
        return view('progres.detailprogres', compact('progres'));
    }
}