<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Project;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offer = Offer::all();
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
      
        Offer::create($request->all());
        return redirect('offer')->with('success','Offer Added Successfully');
    }
    public function edit($id)
    {
        $offer = Offer::find($id);
        return view('offer.offer-edit', compact('offer'));
    }
    public function update(Request $request)
    {
        // $offer = Offer::findOrFail($id);
        $offer = Offer::select('*')->where('id', $request->id)->first();
        $offer->category = $request->category;
        $offer->status = $request->status;
        $offer->date_offer = $request->date_offer;
        $offer->save();
        return redirect('offer')->with('success','Offer Update Successfully');    
    }

    public function deleteoffer($id)
    {
        Offer::where('id', $id)->delete();
        return redirect()->route('offer')->with('success', 'Offer deleted successfully');
    }
}