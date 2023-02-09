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
			->when($search, function ($query) use ($search) {
				$query->whereHas('project', function ($query) use ($search) {
					$query->where('name', 'LIKE', '%' . $search . '%');
				})
					->orWhere('status', 'LIKE', '%' . $search . '%')
					->orWhere('date_offer', 'LIKE', '%' . $search . '%');
			})
			->paginate(5);
		return view('offer.offer', ['offer' => $offer]);
	}
	public function data($id)
	{
		$detail = Detail_offer::with('facilities')
			->where('offer_id', $id)
			->get();

		$data = array();
		$total = 0;

		foreach ($detail as $item) {
			$row = array();
			$row['category'] = $item->category['category'];
			$row['nama'] = $item->nama['nama'];
			$row['quantity'] = $item->quantity['quantity'];
			$row['price'] = $item->price['price'];

			$data[] = $row;

			$total;
		}
		$data[] = [
			'category' => '',
			'nama' => '',
			'quantity' => '',
			'price' => '',
		];
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
		$count = Offer::where('project_id', $request->project_id)->where('status', 0)->count();
		if ($count >= 1) {
			// $dokumen = $request->file('dokumen');
			// 	$nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
			// 	$dokumen->move('public/dokumen/', $nama_dokumen);
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
				$this->validate($request, [
					'dokumen' => 'mimes:doc,docx,pdf',
				]);
				$dokumen = $request->file('dokumen');
				$nama_dokumen = 'FT' . date('Ymdhis') . '.' . $request->file('dokumen')->getClientOriginalExtension();
				$dokumen->move('public/dokumen/', $nama_dokumen);

				$offer = [
					'project_id' => $request->project_id,
					'status' => $request->status,
					'date_offer' => $request->date_offer,
					'number' =>  $nomer,
					'dokumen' => $dokumen,
				];
				Offer::create($offer);

				DB::commit();

				return redirect('offer')->with('success', 'Offer Added Successfully');
			} catch (\Throwable $th) {
				DB::rollback();
				return back()->with('error', 'Gagal menambahkan Offer!');
				// return redirect('offer')->with('success','Offer Added Successfully');
			}
			// return redirect('offer')->with('success','Offer Added Successfully');
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
		return redirect()->route('offer')->with('success', 'Offer deleted successfully');
	}
	public function detail($id)
	{
		$offer = Offer::find($id);
		return view('offer.detailoffer', ['offer' => $offer]);
	}

	public function addcategory()
	{
		return view('offer.detailoffer');
	}
	public function insertcategory(Request $request)
	{


		$detail_offer = [
			'offer_id' => $request->offer_id,
			'category' => $request->category,
		];
		Detail_offer::create($detail_offer);
		return redirect()->back();
	}
	public function addfacility()
	{
		return view('offer.detailoffer');
	}
	public function insertfacility(Request $request)
	{
		$facility = [
			'detail_offer_id' => $request->detail_offer_id,
			'nama' => $request->nama,
			'quantity' => $request->quantity,
			'price' => $request->price,
		];
		Facility::create($facility);
		return redirect()->back();
        if($count >= 1){
            Session::flash('message','tdak bisa menambahkan Penawarana Sudah ada');
            Session::flash('alert-class','alert-danger');
            return redirect('offer');
        }else{
            try {
                $offer = offer::where('id', $id)->first();
                $offer->update($request->all());
             return redirect(route('offer'))
             ->with('success','Penawaran berhasil diupdate!');
                return redirect(route('offer'))
                ->with('success','Penawaran berhasil diupdate!');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }

    }
	public function export_pdf($id)
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
}
