<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
       $users = User::all();

       return view('user.user');
    //    return view('user.user ',['users' => $users]);
    }

    public function data()
    {
        $user = User::orderBy('id', 'asc')->get();

        return datatables()
        ->of($user)
        ->addIndexColumn()
        ->addColumn('aksi', function($user)
        {
            return '
                <div class="btn-group">
                    <button onclick="editUser(`'. route('user.update', $user->id).'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('user.destroy', $user->id).'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
            ';

            // return '
            //     <div class="btn-group">
            //         <button onclick="editUser(`'. route('user.update', $user->id).'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
            //         <button onclick="deleteData(`'. route('user.destroy', $user->id). `')" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            //     </div>
            // ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function create()
    {

    }
    
    // public function add()
    // {
    //     return view('user.add_user');
    // }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->save();

        return redirect(route('user.data'))->withSuccess('Data Berhasil Disimpan');
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        // $user = User::where('id',$id)->first();
        // return view('user-edit',['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // $user = User::where('id', $id)->first();
        // $user->update($request->all());
        // return redirect('users')->with('status','User Updated Successfully');

        $user = User::find($id);
        $user->name = $request->name;
        $user->update();

        return redirect(route('user.user'))->withSuccess('Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response(null, 204);
    }

    // public function delete($slug)
    // {
    //     $user = User::where('id',$id)->first();
    //     $user->delete();
    //     return redirect('users')->with('status','User deleted Successfully');
    // }

}