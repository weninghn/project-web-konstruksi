<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use PDF;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $data = Users::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        // } else {
        //     $data = Users::paginate(5);
        // }
        // $data = Users::all();
        $search = $request->search;
        $data = Users::where('name', 'LIKE', '%' .$search. '%')
        ->orWhere('email', 'LIKE', '%' .$search. '%')
        ->orWhere('addres', 'LIKE', '%' .$search. '%')
        ->orWhere('phone', 'LIKE', '%' .$search. '%')
        ->orWhere('role_id', 'LIKE', '%' .$search. '%')
        ->paginate(5);

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
        $check_if_user_exist = User::where([
            ['email', $request->email],
            ['role_id', $request->role_id]
        ])->exists();
        if($check_if_user_exist) {

            return redirect('user')->with('success', 'Email Sudah ada!');
        } 
        else {
            $user = Users::create($user);
        }
        Users::create($user);
        return redirect('user')->with('success','User Added Successfully');
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
        return redirect()->route('user')->with('success', 'User Update Successfully');
    }

    public function deleteuser($id)
    {
        User::where('id', $id)->delete();
        // $user = Users::find($id);
        // $user->delete();
        return redirect()->route('user')->with('success', 'User Delete Successfully');
    }

    public function exportpdf()
    {
        $user = User::all();
        view()->share('user', $user);
        $pdf = PDF::loadview('user-pdf');
        return $pdf->download('data.pdf');
    }
}

?>