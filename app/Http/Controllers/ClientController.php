<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;
use PDF;

class ClientController extends Controller
{
    public function index (Request $request){
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir) {
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;
        }

        // return view('client.client', compact('tanggalAwal', 'tanggalAkhir', 'data'));
        
        // if ($request->has('search')) {
        //     $data = Clients::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        // } else {
        //     $data = Clients::paginate(5);
        // }
        $search = $request->search;
        $data = Clients::where('name', 'LIKE', '%' .$search. '%')
        ->orWhere('phone', 'LIKE', '%' .$search. '%')
        ->orWhere('address', 'LIKE', '%' .$search. '%')
        ->paginate(5);

        return view('client.client', compact('tanggalAwal', 'tanggalAkhir', 'data'));

        //$data = Clients::all();
        // return view('client.client', compact('data'));
    }

    public function getData($tglawal, $tglakhir)
    {
        $no = 1;
        $data = array();
        $client = 0;
        $jumlah_client = 0;

        while (strtotime($tglawal) <= strtotime($tglakhir)) {
            $tanggal = $tglawal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($tglawal)));

            $nama = Clients::where('created_at', 'LIKE', "%$tanggal%")->sum('name');
            $phone = Clients::where('created_at', 'LIKE', "%$tanggal%")->sum('phone');
            $address = Clients::where('created_at', 'LIKE', "%$tanggal%")->sum('address');

            $client = $nama - $phone - $address;
            $jumlah_client += $client;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = tanggal_indonesia($tanggal, false);
            // $row['penjualan'] = format_uang($total_penjualan);
            // $row['pembelian'] = format_uang($total_pembelian);
            // $row['pengeluaran'] = format_uang($total_pengeluaran);
            // $row['pendapatan'] = format_uang($pendapatan);

            $data[] = $row;
        }
        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            // 'penjualan' => '',
            // 'pembelian' => '',
            // 'pengeluaran' => 'Total Pendapatan',
            // 'pendapatan' => format_uang($total_pendapatan),
        ];

        return $data;

    }

    public function tambahdata(){
        return view('client.tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $client=[
            'name'=> $request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ];
        
        $check_if_client_exist = Clients::where(
                'email', $request->email
            )
            ->orWhere(
                'phone', $request->phone
            )
            ->exists();

        if($check_if_client_exist) {
            return redirect('client')->with('success', 'Email dan Nomor Sudah terdaftar!');
        } 
       
        Clients::create($client);
        return redirect('client')->with('success','Client Added Successfully'); 
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

    public function cetakForm()
    {
        return view('client.pdf');
        // $data = $this->getData($awal, $akhir);
        // $pdf  = PDF::loadView('client.pdf', compact('awal', 'akhir', 'data'))->setOptions([
        //     'defaultFont' => 'sans-serif'
        // ]);
        // $pdf->setPaper('a4', 'potrait');
        
        // return $pdf->stream('Laporan-Data-Client-'. date('Y-m-d-his') .'.pdf');
    }

    public function cetakClientPertanggal($tglawal, $tglakhir)
    {
        // dd("Tanggal Awal: ".$tglawal, "Tanggal Akhir: ".$tglakhir);
        // $cetakPertanggal = Clients::whereBetween('created_at', [$tglawal, $tglakhir])->latest()->get();
        // return view('client.cetak-client', compact('cetakPertanggal'));
        $data = Clients::all();
        $pdf = PDF::loadView('client.cetak-client', ['data' => $data]);
        return $pdf->stream('dataclient.pdf');
    }
}