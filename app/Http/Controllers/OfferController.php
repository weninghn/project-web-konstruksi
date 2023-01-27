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
        return redirect('offer')->with('success','Offer Added Successfully');
    }
    public function editoffer($id)
    {
        $offer = Offers::find($id);
        return view('offer.offer-edit', compact('offer'));
    }
    public function update(Request $request)
    {
        $offer = Offers::select('*')->where('id', $request->id)->first();
        $offer->category = $request->category;
        $offer->status = $request->status;
        $offer->date_offer = $request->date_offer;
        $offer->save();
        return redirect('offer')->with('success','Offer Update Successfully');    
    }
}