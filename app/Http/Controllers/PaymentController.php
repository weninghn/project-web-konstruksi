<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\payment_method;

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
        $payment = payment_method::all();
        return view('payment.payment-add',['project' => $project , 'payments' => $payment ]);
      
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
    public function edit($id)
    {
        $payment = Payment::where('id',$id)->first();
        return view('payment.payment-edit',['payment' => $payment]);
    }
    public function update(Request $request, $id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment->update($request->all());
        return redirect('payment')->with('status','Payment Updated Successfully');
    }
}