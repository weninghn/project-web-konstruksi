<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::orderBy('id','asc')->get();
        return view ('project.project',['pro'=>$project]);
    }
    public function create()
    {
        $client = Clients::all();
        return view ('project.create',['client'=> $client]);
    }
    public function add(Request $request)
    {
        // dd($request->all());
        $project =[
            'client_id'=> $request->client_id,
            'work_date'=> $request->work_date,
            'date_end'=> $request->date_end,
            'name'=> $request->name,
            'location'=> $request->location,
            'date_offer'=> $request->date_offer,
            'status'=> $request->status,
            'status_payment'=> $request->status_payment,
        ];
        Project::create($project);
        return redirect('project')->with('status','project Added Successfully');   
    }
    
}