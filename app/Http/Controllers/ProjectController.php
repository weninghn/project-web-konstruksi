<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::orderBy('id','asc')->get();
        return view ('project',['pro'=>$project]);
    }
    public function create()
    {
        return view('create_project');
    }
    // public function add()
    // {
    //     $project =[
    //         ''=> $request->nama,
            
    //     ];
    //     projectModel::create($project);
    //     return redirect('project');
    // }
}
