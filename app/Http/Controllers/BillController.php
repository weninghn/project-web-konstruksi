<?php

namespace App\Http\Controllers;
 
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $data=Bill::all();
        return view('Bill.bill',['bill'=>$data]);
    }
}
