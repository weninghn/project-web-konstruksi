<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offer = Offers::all();
        return view('offer.offer',['offer' => $offer]);
    }
    public function add()
    {
        $project = Project::all();
        return view('offer.offer',['project' => $project]);
    }
    public function store(Request $request)
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