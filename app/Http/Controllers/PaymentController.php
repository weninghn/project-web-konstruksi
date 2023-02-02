<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Project;
use App\Models\paymemt_method;
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
            'status'=> $request->status,
            'note'=> $request->note,
        ];
        Payment::create($payment);
        return redirect('payment')->with('success','payment Added Successfully');   
    }
    public function edit($id)
    {
        $payment = Payment::find($id);
        // $pictures = Picture::all();
        $method = payment_method::all();
        // return view('progres.editprogres',['progress' => $progres, 'pictures' => $pictures]);
        // $payment = Payment::where('id',$id)->first();
        // $method = payment_method::all();
        return view('payment.payment-edit',['payment' => $payment,'method'=>$method]);
    }
    public function update(Request $request, $id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment->update($request->all());
        return redirect('payment')->with('success','Payment Updated Successfully');
    }

    public function paymentdelete($id)
    {
        Payment::where('id', $id)->delete();
        return redirect()->route('payment')->with('Success', 'Payment Deleted Successfully');
    }
}