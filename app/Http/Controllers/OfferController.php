<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Project;
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
        return view('offer.offer-add',['project' => $project]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
      
        Offers::create($request->all());
        return redirect('offer')->with('status','Category Added Successfully'); 
    }
}