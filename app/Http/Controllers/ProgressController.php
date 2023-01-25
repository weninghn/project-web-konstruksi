<?php

namespace App\Http\Controllers;

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
        return view('progres.progres-add',['project' => $projek]);
      
    }

    public function store(Request $request)
    {


        $newName = '';

        if($request->file('image')){
            $file = $request->image;
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            // $request->file('image')->storeAs('cover', $newName);
            $file->move('storage/cover/', $newName);

          
        }
        $request['cover'] = $newName;
         
        $progres = Progres::create($request->all());
        $progres->pictures()->sync($request->pictures);
        return redirect('progres.progres')->with('status','Progres Added Successfully');
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
   
    public function destroy($slug)
    {
        $progres = Progres::where($id)->first();
        $progres->delete();
        return redirect('progres.progres')->with('status','Progres deleted Successfully');
    }
}