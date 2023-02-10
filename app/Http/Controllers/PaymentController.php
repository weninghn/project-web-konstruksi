<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Bill;
use App\Models\paymemt_method;
use Illuminate\Http\Request;
use App\Models\payment_method;

class PaymentController extends Controller
{
	public function index(Request $request)
	{
		$search = $request->search;
		$payment = Payment::with('bill')
			->when($search, function ($query) use ($search) {
				// $query->whereHas('project', function ($query) use ($search) {
				// 	$query->where('name', 'LIKE', '%' . $search . '%');
				// })
				$query->orWhere('payment_method_id', 'LIKE', '%' . $search . '%')
					->orWhere('amount_payment', 'LIKE', '%' . $search . '%')
					->orWhere('payment_date', 'LIKE', '%' . $search . '%')
					->orWhere('payment_to', 'LIKE', '%' . $search . '%')
					->orWhere('status', 'LIKE', '%' . $search . '%')
					->orWhere('note', 'LIKE', '%' . $search . '%');
			})
			->paginate(5);

		// return view('user.user',['user' => $data]);
		// $payment = Payment::all();
		return view('payment.payment', ['payment' => $payment]);
	}
	public function add()
	{
		$project = Project::join('offers', function ($join) {
			$join->on('offers.project_id', '=', 'projects.id')
				->where('offers.status', '=', 0);
		})
			->select(
				'projects.id AS id',
				\DB::raw("CONCAT(projects.name,' - ',offers.number) AS name")
			)
			->get();
		$bills = Bill::all();
		$payment = payment_method::all();
		return view('payment.payment-add', ['bills' => $bills, 'payments' => $payment]);
	}
	public function store(Request $request)
	{

		
        $newName = '';

        if($request->file('image')){
            $file = $request->image;
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $file->move('storage/image/', $newName);

          
        }
        $request['image'] = $newName;
		$bill = Bill::findOrFail($request->bill_id);
		$payment_to = count($bill->payments) + 1;
		$payment = [
			'bill_id' => $request->bill_id,
			'payment_method_id' => $request->payment_method_id,
			'amount_payment' => $request->amount_payment,
			'payment_date' => $request->payment_date,
			'note' => $request->note,
			'image' => $request->image,
		];
		Payment::create($payment);
		$bill->total;
		$status = 0;
		$bill->update([
			// 'status' => $status;
		]);
		return redirect('payment')->with('success', 'payment Added Successfully');

	}
	public function edit($id)
	{
		$payment = Payment::find($id);
		// $pictures = Picture::all();
		$method = payment_method::all();
		// return view('progres.editprogres',['progress' => $progres, 'pictures' => $pictures]);
		// $payment = Payment::where('id',$id)->first();
		// $method = payment_method::all();
		return view('payment.payment-edit', ['payment' => $payment, 'method' => $method]);
	}
	public function update(Request $request, $id)
	{
		$payment = Payment::where('id', $id)->first();
		$payment->update($request->all());
		return redirect('payment')->with('success', 'Payment Updated Successfully');
	}

	public function paymentdelete($id)
	{
		Payment::where('id', $id)->delete();
		return redirect()->route('payment')->with('Success', 'Payment Deleted Successfully');
	}
	public function detail($id)
	{

		$payment = Payment::find($id);
		return view('payment.detail-payment', ['payment' => $payment]);
	}
}