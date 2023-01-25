<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = Users::all();
        return view('user.user', compact('data'));
    }

    public function adduser()
    {
        return view('user.adduser');
    }

    public function tampiluser($id)
    {
        $user = Users::find($id);
        return view('user.tampiluser', compact('data'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = Users::find($id);
        $user->update($request->all());
        return redirect()->route('user')->with('Success', 'Data berhasil di update');
    }

    public function deleteuser($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect()->route('user')->with('Success', 'Data Berhasil Dihapus');
    }
}

?>