<?php

namespace App\Http\Controllers;
use App\Models\Detail_offer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
    public function edit($id)
    {
        $detail_offer = Detail_offer::find($id);
        return view('offer.editcategory', compact( 'detail_offer'));
    }
    public function update(Request $request)
    {
        $detail_offer = Detail_offer::select('*')->where('id', $request->id)->first();
        $detail_offer->category = $request->category;
        $detail_offer->save();
        return redirect()->back();    
    }
    public function delete($id)
    {
        $cat = Detail_offer::where('id',$id)->first();
        $cat->delete(); 
        return redirect()
        ->back();

    }

}
