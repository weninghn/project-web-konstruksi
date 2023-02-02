<?php

namespace App\Http\Controllers;
use App\Models\Detail_offer;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $detail = Detail_offer::all();
        return view('offer.detailoffer',['detail' => $detail]);
    }
}
