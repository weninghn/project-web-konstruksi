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
        return redirect('project')->with('success','Data Berhsail di Tambahkan');   
    }
    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit', compact('project'));
    }
    public function update(Request $request)
    {
        $project = Project::select('*')->where('id', $request->id)->first();
        $project->work_date = $request->work_date;
        $project->date_end = $request->date_end;
        $project->name = $request->name;
        $project->location = $request->location;
        $project->date_offer = $request->date_offer;
        $project->status = $request->status;
        $project->status_payment = $request->status_payment;
        $project->save();
        return redirect('project')->with('success','Data Berhsail di Tambahkan');   
    }
}