<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Offer;
use App\Models\Project;
// use App\Models\facility;
use App\Models\Facility;
use App\Models\Detail_offer;
use App\Models\Status_offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $offer = Offer::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        // } else {
            // $offer = Offer::paginate(5);
        // }
        $search = $request->search;
        $offer = Offer::with('project')
        ->when($search, function($query) use ($search) {
            $query->whereHas('project', function($query) use($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orWhere('status', 'LIKE', '%' .$search. '%')
            ->orWhere('date_offer', 'LIKE', '%' .$search. '%');
        })
        ->paginate(5);
        return view('offer.offer',['offer' => $offer]);
    }
    public function add()
    {
        $project = Project::all();
        $status = Status_offer::all();
        // dd($status->all());
        return view('offer.offer-add',['project' => $project , 'status' => $status]);
    }
    public function store(Request $request)
    {
        $count = Offer::where('project_id',$request->project_id)->where('status_id',1)->count();

        if($count >= 1){
            Session::flash('message','tdak bisa menambahkan Penawarana Sudah ada');
            Session::flash('alert-class','alert-danger');
            return redirect('offer');
        }else{
            try {
             $offer = [
                 'project_id' => $request->project_id,
                 'status_id'=> $request->status_id,
                 'date_offer' => $request->date_offer,
                 'number' => $request->number,
             ];
             Offer::create($offer);
             return redirect(route('offer'))
             ->with('success','Offer Added Successfully');
            } catch (\Throwable $th) {
<<<<<<< HEAD
             DB::rollBack();
            }
=======
             DB::rollBack();
            }
>>>>>>> e5015eb72b9e2517883c47570ab4ac6812389e15
         }
}
    public function edit($id)
    {
        $offer = Offer::find($id);
        $status = Status_offer::all();

        if(!checkStatusOffer($offer?->project_id)) {
            Session::flash('message','Project Sudah Deal! Tidak dapat melakukan Edit!');
            Session::flash('alert-class','alert-danger');
            return back();
        }
        return view('offer.offer-edit', compact('offer', 'status'));
    }
    public function update(Request $request,$id)
    {
        $count = Offer::where('project_id',$request->project_id)->where('status_id',1)->count();

        if($count >= 1){
            Session::flash('message','tdak bisa menambahkan Penawarana Sudah ada');
            Session::flash('alert-class','alert-danger');
            return redirect('offer');
        }else{
            try {
                $offer = offer::where('id', $id)->first();
                $offer->update($request->all());


             return redirect(route('offer'))
             ->with('success','Offer Update Successfully');
            } catch (\Throwable $th) {
             DB::rollBack();
            }}

        // return redirect('offer')->with('success','Offer Update Successfully');
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
<<<<<<< HEAD

=======
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
>>>>>>> e5015eb72b9e2517883c47570ab4ac6812389e15
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
<<<<<<< HEAD

=======
>>>>>>> e5015eb72b9e2517883c47570ab4ac6812389e15
      }