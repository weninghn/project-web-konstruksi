<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        $data = Picture::all();
        return view('progtres.progres',['data' => $data ]);
    }
    public function destroy($id)
    {
        $data = Picture::where('id',$id)->first();
        $file_path = public_path('uploads/progres/'.$data->image);
        unlink($file_path);
        $data->delete();
        return redirect()->route('progres')->with('success', 'Gambar berhasil dihapus!');
    }
}