<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use App\Models\Project;
// use App\Models\Payment;
use App\Models\Offer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        // $payment = Payment::all();
        $offer = Offer::all();
        return view ('project.project',['pro'=>$project, 'offer'=>$offer]);
    }
    public function create()
    {
        $client = Clients::all();
        // $status = status::all();
        // $status_pay = status_payment::all();
        // dd($status_pay);
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
            'price'=> $request->price,
            // 'status_id'=> $request->status_id,
            // 'status_payment_id'=> $request->status_payment_id,
        ];
        Project::create($project);
        return redirect('project')->with('success','Project Added Successfully');    
    }
    public function edit($id)
    {
        $project = Project::find($id);
        return view('project.edit' , compact('project'));
    }
    public function update(Request $request)
    {
        $project = Project::select('*')->where('id', $request->id)->first();
        $project->work_date = $request->work_date;
        $project->date_end = $request->date_end;
        $project->name = $request->name;
        $project->location = $request->location;
        $project->date_offer = $request->date_offer;
        $project->price = $request->price;
        // $project->status = $request->status;
        // $project->status_payment = $request->status_payment;
        $project->save();

        return redirect('project')->with('success','Project Update Successfully');    


       }
    public function delete($id)
    {
        Project::where('id', $id)->delete();
        // $user = Users::find($id);
        // $user->delete();
        return redirect()->route('project')->with('Success', 'Project Delete Successfully');

    }
}