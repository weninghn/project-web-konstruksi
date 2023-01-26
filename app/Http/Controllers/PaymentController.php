<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.payment');
    }
    public function add()
    {
        $project = Project::all();
        return view('payment.payment-add',['project' => $project]);
      
    }
    public function store(Request $request)
    {
        
    }
}