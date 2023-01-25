<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index (Request $request){
        $data = Client::all();
        return view('client.client', compact('data'));
    }

    public function tambahdata(){
        return view('tambahclient');
    }

    public function insertdata(Request $request){
        //dd($request->all());
         Client::create($request->all());
         return redirect()->route('client')->with('success','Data Berhsail di Tambahkan');
    }

}
