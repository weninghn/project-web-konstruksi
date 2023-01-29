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


        $newName = '';

        if($request->file('files')){
            $name = [];
            foreach ($request->file('files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
                $name[]= $newName;
                $file->storeAs('certificateImages', $newName);
            }
            $request['photos'] = json_encode($name);
          
        }
        $progres = Progres::create($request->all());
        // $progres->pictures()->sync($request->pictures);
        return redirect('progres')->with('Success','Progres Added Successfully');
    }
    public function edit($id)
    {
        $progres = Progres::where($id)->first();
        $pictures = Picture::all();
        return view('progres.proges',['progress' => $progres, 'pictures' => $pictures]);
    }
    public function update( Request $request,$id)
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
}