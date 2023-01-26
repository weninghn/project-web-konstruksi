<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('user.user',['user' => $data]);
    }

    public function adduser()
    {
        $role = Role::all();
        return view ('user.adduser',['Roles'=> $role]);
    }
    public function insertuser(Request $request){
        //dd($request->all());
         User::create($request->all());
         return redirect()->route('user')->with('success','Data Berhsail di Tambahkan');
    }
    public function tampiluser($id)
    {
        $user = User::find($id);
        return view('user.edituser', compact('data'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('user')->with('Success', 'Data berhasil di update');
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user')->with('Success', 'Data Berhasil Dihapus');
    }
}

?>