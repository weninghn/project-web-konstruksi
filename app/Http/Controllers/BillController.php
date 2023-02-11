<?php

namespace App\Http\Controllers;
 
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bill = Bill::orderby('id','asc')->get();
        return view ('Bill.bill', [
            'emp'=>$bill
        ]);
        
    }
   public function detail($id)
   {
    $bill = Bill::find($id);
    return view('bill.detail-bill',['bill'=>$bill]);
   }

}
