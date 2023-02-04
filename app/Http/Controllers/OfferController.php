<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Offer;
use App\Models\Project;
// use App\Models\facility;
use App\Models\Facility;
use App\Models\Detail_offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $offer = Offer::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        // } else {
            // $offer = Offer::paginate(5);
        // }
        // $offer = Offer::all();
        $search = $request->search;
        $offer = Offer::where('project_id', 'LIKE', '%' .$search. '%')
        ->orWhere('status', 'LIKE', '%' .$search. '%')
        ->orWhere('date_offer', 'LIKE', '%' .$search. '%')
        ->paginate(5);

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
            'number' => $request->number,
        ]);
            // Detail_offer::create([
            //     'offer_id' => $offer->id,
            //     'category'=>$request->category,
            //     'quantity'=>$request->quantity,
            //     'total'=>$request->total,
            // ]);      
        return redirect(route('detail-offer', $offer->id))
        ->with('success','Offer Added Successfully');
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
        // $detail = Detail_offer::find($id);
        return view('offer.detailoffer',['offer'=>$offer] );
    }
    public function addcategory()
    {
        return view('offer.detailoffer');
    }
    public function insertcategory(Request $request)
    {

        $detail_offer =[
            'offer_id'=> $request->offer_id,
            'category'=> $request->category,
            // 'quantity'=> $detail_offer->quantity,
            // 'total'=> $detail_offer->total,
        ];
        Detail_offer::create($detail_offer);
        return redirect()
        ->back();
    }
    public function addfacility()
    {
        return view('offer.detailoffer');
    }
    public function insertfacility(Request $request)
    {
        $facility =[
            'detail_offer_id'=>$request->detail_offer_id,
            'nama'=> $request->nama,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
        ];
        Facility::create($facility);
        return redirect()
        ->back();
    }
    public function export_pdf($id)
    {
        // dd($id)
    	$offer = Offer::find($id);     
    	$detail = Detail_offer::find($id);     
    	$facility = Facility::find($id);     
    	$pdf = PDF::loadview('offer.export-pdf',['offer'=>$offer, 'facilities'=>$facility]);
        return $pdf->stream('export-pdf');
      
          }
          
    public function destroy($id)
    {
        $data = Facility::where('id',$id)->first();
        $data->delete(); 
        return redirect()
        ->back();

    }
      }