<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Users::all();
        return view('user.user', compact('user'));
    }

    public function adduser()
    {
        return view('user.adduser');
    }

    public function insertuser(Request $request)
    {
        Users::create($request->all());
        return redirect()->route('user')->with('success', 'Data berhasil ditambahkan');
    }

    public function edituser($id)
    {
        $user = Users::find($id);
        return view('user.edituser', compact('user'));
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