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
    public function editprogres($id)
    {
        // $progres = Progres::find($id);
        // return view('progres.editprogres', compact('progres'));

        $progres = Progres::where($id)->first();
        $pictures = Picture::all();
        return view('progres.editprogres',['progress' => $progres, 'pictures' => $pictures]);
    }
    public function updateprogres( Request $request,$id)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'-'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

      
        $progres = Progres::where($id)->first();
        $progres->update($request->all());
       
        if($request->pictures){
            $book-pictures()->sync($request->pictures);
        }
        return redirect('progres.progres')->with('status','Progres Updated Successfully');
        
    }
   
    public function progresdelete($id)
    {
        Progres::where('id', $id)->delete();
        return redirect()->route('progres')->with('Success', 'Progress Deleted Successfully');
        // $progres = Progres::where($id)->first();
        // $progres->delete();
        // return redirect('progres.progres')->with('status','Progres deleted Successfully');
    }

    public function detail(Progres $progres)
    {
        return view('progres.detailprogres', compact('progres'));
    }
}