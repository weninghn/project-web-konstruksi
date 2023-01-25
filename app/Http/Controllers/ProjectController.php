<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::orderBy('id','asc')->get();
        return view ('project.project',['pro'=>$project]);
    }
    public function create()
    {
        $client = Client::all();
        return view ('add',['client'=> $client]);
    }
    public function add()
    {
        $karyawan =[
            'client_id'=> $request->client_id,
            'work_date'=> $request->work_end,
            'date_end'=> $request->date_end,
            'name'=> $request->name,
            'location'=> $request->location,
            'date_offer'=> $request->date_offer,
            'status'=> $request->status,
            'status_payment'=> $request->status_payment,
            
        ];
        return redirect('project')->with('status','project Added Successfully');   
    }
    
}
