<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Detail_offer;
use App\Models\facility;
use App\Models\Project;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $offer = Offer::where('name', 'LIKE', '%' .$request->search. '%')->paginate(2);
        } else {
            $offer = Offer::paginate(2);
        }
        // $offer = Offer::all();
        return view('offer.offer',['offer' => $offer]);
    }
    public function add()
    {
        $project = Project::all();
        // $detail = Detail_offer::all();
        // $facility = Facility::all();
        return view('offer.offer-add',['project' => $project]);
    }
    public function store(Request $request)
    {
        $offer = Offer::create([
            'project_id' => $request->project_id,
            'status' => $request->status,
            'date_offer' => $request->date_offer,
        ]);
            Detail_offer::create([
                'offer_id' => $offer->id,
                'category'=>$request->category,
                'quantity'=>$request->quantity,
                'total'=>$request->total,
            ]);      
        return redirect('offer')->with('success','Offer Added Successfully');
}
    public function edit($id)
    {
        $offer = Offer::find($id);
        $detail_offer = Detail_offer::find($id);
        return view('offer.offer-edit', compact('offer', 'detail_offer'));
    }
    public function update(Request $request)
    {
        $offer = Offer::select('*')->where('id', $request->id)->first();
        $detail_offer = Detail_offer::select('*')->where('id', $request->id)->first();
        $offer->category = $request->category;
        $offer->status = $request->status;
        $offer->date_offer = $request->date_offer;
        $detail_offer->facility = $request->facility;
        $detail_offer->quantity = $request->quantity;
        $detail_offer->save();
        $offer->save();
        return redirect('offer')->with('success','Offer Update Successfully');    
    }
    public function deleteoffer($id)
    {
        Offer::where('id', $id)->delete();
        return redirect()->route('offer')->with('success', 'Offer deleted successfully');
    }
    public function detail($id)
    {
        $offer = Offer::find($id);
        return view('offer.detailoffer', compact('offer'));
    }
   
    public function export_pdf()
    {
    	// $offer = Offer::find($id);
 
    	// $pdf = PDF::loadview('export-pdf',['offers'=>$offer]);
    	// return $pdf->download('Offer-pdf');
        return view('offer.export-pdf');
      
    }
}