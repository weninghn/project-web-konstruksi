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
        // dd($request->all());
        $payment =[
            'project_id'=> $request->project_id,
            'payment_method_id'=> $request->payment_method_id,
            'amount_payment'=> $request->amount_payment,
            'payment_date'=> $request->payment_date,
            'payment_to'=> $request->payment_to,
            'note'=> $request->note
        ];
        Payment::create($payment);
        return redirect('payment')->with('success','payment Added Successfully');   
    }
    
}