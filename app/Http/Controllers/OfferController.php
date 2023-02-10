<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Offer;
use Carbon\Carbon;
use App\Models\Project;
use App\Models\Bill;
// use App\Models\facility;
use App\Models\Facility;
use App\Models\Detail_offer;
use App\Models\Status_offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
	public function index(Request $request)
	{
		// if ($request->has('search')) {
		//     $offer = Offer::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
		// } else {
		// $offer = Offer::paginate(5);
		// }


        $search = $request->search;
        $offer = Offer::with('project')
        ->when($search, function($query) use ($search) {
            $query->whereHas('project', function($query) use($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orWhere('status', 'LIKE', '%' .$search. '%')
            ->orWhere('date_offer', 'LIKE', '%' .$search. '%');
        })
        ->paginate(5);
        return view('offer.offer',['offer' => $offer ]);
    }




	public function add()
	{
		$project = Project::all();
		// $status = Status_offer::all();
		// dd($status->all());
		return view('offer.offer-add',  ['project' => $project]);
	}
	public function store(Request $request)
	{
		// $offer = new Offer();
		// $file = $request->file;
		// $filename = time().'.'.$file->getClientOriginalExtension();
		// $request->file->move('assets', $filename);
		// $this->validate($request, [
		// 	'dokumen' => 'required',
		// 	'project_id' => 'required',
		// 	'status' => 'required',
		// 	'date_offer' => 'required',
		// 	'number' =>  'required',
		// 	'dokumen' => 'required',
		// ]);
		// $count = Offer::where('project_id', $request->project_id)->where('status', 0)->count();
		// if ($count >= 1) {
		// 	Session::flash('message', 'Tidak bisa menambahkan, Penawaran Sudah deal');
		// 	Session::flash('alert-class', 'alert-danger');
		// 	return redirect('offer');
		// } else {
		// 	try {
		// 		DB::beginTransaction();
		// 		$offer = Offer::all();
		// 		$tanggal = Carbon::now()->format('Y-m-d');
		// 		$now = Carbon::now();
		// 		$thnBulan = $now->year . $now->month;
		// 		$cek = Offer::count();
		// 		if ($cek == 0) {
		// 			$urut = 10000001;
		// 			$nomer = 'MDK' . $thnBulan . $urut;
		// 		} else {
		// 			$ambil = Offer::all()->last();
		// 			$urut = (int)substr($ambil->number, -8) + 1;
		// 			$nomer = 'MDK' . $thnBulan . $urut;
		// 		}
		// $file = $request->file('dokumen');
		// $nama_file = $file->getClientOriginalName();
		// $file->move('dokumen', $file->getClientOriginalName());
		// $upload = new Offer();
		// $upload->file = $nama_file;
		// // $upload->keterangan = $request->input('keterangan');
		// $upload->save();
		// Offer::create($offer);

		// 		DB::commit();

		// 		return redirect('offer')->with('success', 'Offer Added Successfully');
		// 	} catch (\Throwable $th) {
		// 		DB::rollback();
		// 		return back()->with('error', 'Gagal menambahkan Offer!');
		// 	}
		// return back();
		$count = Offer::where('project_id', $request->project_id)->where('status', 0)->count();
		if ($count >= 1) {
			Session::flash('message', 'Tidak bisa menambahkan, Penawaran Sudah deal');
			Session::flash('alert-class', 'alert-danger');
			return redirect('offer');
		} else {
			try {
				DB::beginTransaction();
				$offer = Offer::all();
				$tanggal = Carbon::now()->format('Y-m-d');
				$now = Carbon::now();
				$thnBulan = $now->year . $now->month;
				$cek = Offer::count();
				if ($cek == 0) {
					$urut = 10000001;
					$nomer = 'MDK' . $thnBulan . $urut;
				} else {
					$ambil = Offer::all()->last();
					$urut = (int)substr($ambil->number, -8) + 1;
					$nomer = 'MDK' . $thnBulan . $urut;
				}

				// if($request->file('file')) {
				// 	$alphanumeric = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

				// 	foreach ($request->file('file') as $file) {
				// 		$extension = $file->getClientOriginalExtension();
				// 		$random = substr(str_shuffle($alphanumeric), 0, 4);
				// 		$filename = $offer->dokumen.'-'.$random.now()->timestamp.'.'.$extension;
				// 		$file->move(public_path('dokumen'), $filename);
						// $progres->pictures()->create([
						//     'image' => $filename
						// ]);

						// Picture::create([
						// 	'progres_id' => $progres->id,
						// 	'image' => $filename
						// ]);
				// 	}
				// }
				$data = new Offer();
				$file = $request->file;
				$filename = 'dokumen/'.time().'.'.$file->getClientOriginalName();
				$request->file->move(public_path('dokumen'), $filename);
				// $data->file = $filename;
				$offer = [
					'project_id' => $request->project_id,
					'status' => 2,
					'date_offer' => $request->date_offer,
					'number' =>  $nomer,
					'dokumen' => $filename,
				];
				Offer::create($offer);

				DB::commit();

				return redirect('offer')->with('success', 'Offer Added Successfully');
			} catch (\Throwable $th) {
				DB::rollback();
				return back()->with('error', 'Gagal menambahkan Offer!');
			}
		}
	}


	public function edit($id)
	{
		$offer = Offer::find($id);
		$status = Status_offer::all();

		if (!checkStatusOffer($offer?->project_id)) {
			Session::flash('message', 'Project Sudah Deal! Tidak dapat melakukan Edit!');
			Session::flash('alert-class', 'alert-danger');
			return back();
		}
		return view('offer.offer-edit', compact('offer', 'status'));
	}
	public function update(Request $request, $id)
	{
		$count = Offer::where('project_id', $request->project_id)->where('status', 0)->count();

		if ($count >= 1) {
			Session::flash('message', 'tdak bisa menambahkan Penawarana Sudah ada');
			Session::flash('alert-class', 'alert-danger');
			return redirect('offer');
		} else {
			try {
				$offer = offer::where('id', $id)->first();
				$offer->update($request->all());
				if($request->status == 0){
					$total = 0;
					foreach($offer->detail_offers as $category){
						foreach($category->facilities as $facility){
							$total += $facility->price;
						}
					}
					Bill::create([
						'offer_id' => $offer->id,
						'total' => $total,
						'status' => 0
					]);
				}
				return redirect(route('offer'))
					->with('success', 'Offer Update Successfully');
				return redirect(route('offer'))
					->with('success', 'Offer Update Successfully');
			} catch (\Throwable $th) {
				DB::rollBack();
			}
		}
	}
    public function deleteoffer($id)
    {
        Offer::where('id', $id)->delete();
        return redirect()->route('offer')->with('success', 'penawaran berhasil dihapus!');
    }
    public function detail($id)
    {
        $offer = Offer::find($id);
        return view('offer.detailoffer',['offer'=>$offer] );
    }

    public function addcategory()
    {
        return view('offer.detailoffer');
    }
    public function insertcategory(Request $request)
    {

        $detail_offer =[
            'offer_id'=> $request->offer_id,
            'category'=> $request->category,
        ];
        Detail_offer::create($detail_offer);
        return redirect()->back();
    }
    public function addfacility($id)
    {
		// $offer = Offer::find($id);
		// $detail = $offer->detail_offers->load('facilities');
		// $price = 0;
		// foreach ($detail as $item) {
		// 	foreach ($item->facilities as $facility) {
		// 		$price += $facility->price;
		// 	}
		// }
        return view('offer.detailoffer');
    }
    public function insertfacility(Request $request, $id)
    {
		$facility = Facility::find($id);
		$detail = $facility->Detail_offer->load('facilities');
		$price = 0;
		foreach ($detail as $item) {
			foreach ($item->facilities as $facility) {
				$price += $facility->price;
			}
		}
		$price = $facility->price * $request->quantity;
        $facility =[
            'detail_offer_id'=>$request->detail_offer_id,
            'nama'=> $request->nama,
            'quantity'=> $request->quantity,
            'price'=> $request->price,

			// $price = $facility->price * $request->quantity
        ];

        Facility::create($facility);
        return redirect()->back();
		// $total = $facility->sum('price');
	}

	public function export_pdf($id, $price)
	{
		// dd($id)
		$offer = Offer::find($id);
		$detail = $offer->detail_offers->load('facilities');
		$total = 0;
		foreach ($detail as $item) {
			foreach ($item->facilities as $facility) {
				$total += $facility->price;
			}
		}
		$pdf = PDF::loadview('offer.export-pdf', ['offer' => $offer, 'detail' => $detail, 'total' => $total]);
		return $pdf->stream('export-pdf');
	}
	public function destroy($id)
	{
		$data = Facility::where('id', $id)->first();
		$data->delete();
		return redirect()
			->back();
		return redirect()->back();
	}
	public function show()
	{
		$offer = Offer::all();
		return view('offer.detailoffer', compact('offer'));
	}
	public function download(Request $request, Offer $offer)
	{
		return response()->download(public_path($offer->dokumen));
		// return $offer->download('tugasss');
	}
	public function view($id)
	{
		$offer = Offer::find($id);
		return view('offer.view', compact('offer'));
	}
	// public function destroyfile($id)
	// {
	// 	$data = Offer::where('id',$id)->first();
	// 	$file_path = public_path()
	// }
	// public function uploadpage()
	// {
	// 	return view('offer.upload');
	// }
}