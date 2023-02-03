<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use App\Models\Project;
// use App\Models\Payment;
use App\Models\Offer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $project  = Project::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
            $offer = Offer::where('status', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $project = Project::paginate(5);
            $offer = Offer::paginate(5);
        }
        // $project = Project::all();
        // $offer = Offer::all();
        return view ('project.project',['pro'=>$project, 'offer'=>$offer]);
    }
    public function create()
    {
        $client = Clients::all();
        return view ('project.create',['client'=> $client]);
    }
    public function add(Request $request)
    {
        
        $project =[
            'client_id'=> $request->client_id,
            'work_date'=> $request->work_date,
            'date_end'=> $request->date_end,
            'name'=> $request->name,
            'location'=> $request->location,
            'date_offer'=> $request->date_offer,
            'price'=> $request->price,
            // 'status_id'=> $request->status_id,
            // 'status_payment_id'=> $request->status_payment_id,
        ];
        Project::create($project);
        return redirect('project')->with('success','Project Added Successfully');    
    }
    public function edit($slug)
    {
        $project = Project::find($slug);
        return view('project.edit' , compact('project'));
    }
    public function update(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();
        $project->update($request->all());

        // $project->work_date = $request->work_date;
        // $project->date_end = $request->date_end;
        // $project->name = $request->name;
        // $project->location = $request->location;
        // $project->date_offer = $request->date_offer;
        // $project->price = $request->price;
        // $project->status = $request->status;
        // $project->status_payment = $request->status_payment;
        // $project->save();

      
        return redirect()->route('project')->with('success', 'Project Update Successfully');

       }
    public function delete($slug)
    {
        $data = Project::where('slug',$slug)->first();
        $data->delete(); 
        return redirect()->route('project')->with('Success', 'Project Delete Successfully');

    }
}