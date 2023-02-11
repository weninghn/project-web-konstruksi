<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Progres;
use App\Models\Project;
use App\Models\Payment;
use App\Models\Bill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $offercount = Offer::count();
        $projectcount = Project::count();
        $progrescount = Progres::count();
        $paymentcount = Payment::count();
        $jumlahpendapatan = Payment::sum('amount_payment');
        return view('admin.dashboard',['offer_count'=>$offercount, 'project_count' => $projectcount, 'progres_count' => $progrescount, 'payment_count' => $progrescount, 'jumlah_pendapatan' => $jumlahpendapatan]);
    }
}