<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view ('user.user');
    }
    // public function add()
    // {
    //     return view ('user.add_user');
    // }

    // public function index()
    // {
    //  //   $users = User::all();

    //    // return view('user',['users' => $users]);
    // }
    public function add()
    {
        return view('user.add_user');
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect('users')->with('status','User Added Successfully');
    }
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('user-edit',['user' => $user]);
    }
    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $user->update($request->all());
        return redirect('users')->with('status','User Updated Successfully');
    }
    public function delete($slug)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect('users')->with('status','User deleted Successfully');
    }

}