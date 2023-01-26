<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        return view('payment.payment',['payment' => $payment]);
    }
    public function add()
    {
        $project = Project::all();
        return view('payment.payment-add',['project' => $project]);
      
    }
    public function store(Request $request)
    {
        Payment::create($request->all());
         return redirect()->route('payment')->with('success','Data Berhsail di Tambahkan'); 
    }
    
}