<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index (Request $request){

        if ($request->has('search')) {
            $data = Clients::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $data = Clients::paginate(5);
        }

        //$data = Clients::all();
        return view('client.client', compact('data'));
    }

    public function tambahdata(){
        return view('client.tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
         Clients::create($request->all());
         return redirect()->route('client')->with('success','Client Added Successfully'); 
    }

    public function tampilkandata($slug){

        $data = Clients::where('slug',$slug)->first();
        // dd($data);
        return view('client.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $slug){
        $data = Clients::where('slug',$slug)->first();
        $data->slug = null;
        $data->update($request->all());

        return redirect()->route('client')->with('success', 'Client Update Successfully');
    }

    public function destroy($slug)
    {
        $data = Clients::where('slug',$slug)->first();
        $data->delete(); 
        return redirect()->route('client')->with('success', 'Client Delete Successfully');
      
    }
    public function deletedClients()
    {
        $data = Clients::onlyTrashed()->get();
        return view('client.client-deleted-list',['deletedClients' =>$data]);
    }
    public function restore($slug)
    {
        $data = Clients::withTrashed()->where('slug',$slug)->first();
        $data->restore();
        return redirect('client')->with('status','Client Restored Sucessfully');
    }
}