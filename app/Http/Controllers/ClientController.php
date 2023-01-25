<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index (Request $request){
        $data = Clients::all();
        return view('client.client', compact('data'));
    }

    public function tambahdata(){
        return view('client.tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
         Clients::create($request->all());
         return redirect()->route('client')->with('success','Data Berhsail di Tambahkan');
    }

    public function tampilkandata($id){

        $data = Clients::find($id);
        //dd($data);
        return view('client.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Clients::find($id);
        $data->update($request->all());

        return redirect()->route('client')->with('success','Data Berhasil di Update');
    }

    public function delete($id){
        $data = Clients::find($id);
        $data->delete();
        return redirect()->route('client')->with('success','Data Berhsail di Delete');
    }

}
