<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = Users::all();
        return view('user.user',['user' => $data]);
    }

    public function adduser()
    {
        $role = Role::all();
        return view ('user.adduser',['roles'=> $role]);
    }
    public function insertuser(Request $request)
    {
        // dd($request->all());
        $user =[
            'role_id' => $request->role_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'addres'=> $request->addres,
            'phone'=> $request->phone,
            'password' => $request->password,
        ];
        Users::create($user);
        return redirect('user')->with('Success','User Added Successfully'); 
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
        User::where('id', $id)->delete();
        // $user = Users::find($id);
        // $user->delete();
        return redirect()->route('user')->with('Success', 'Data Berhasil Dihapus');
    }
}

?>