<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminController extends Controller
{
     public function index()
    {
        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'name' => 'required',
            'phone' => 'required|unique:admins|regex:/(0)[0-9]/|not_regex:/[a-z]/|max:14',
        ]);

        $user = new \App\Models\Admin;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt('password');
        $user->profile_image = 'admin.png';
        $user->save();

        return redirect('admin/list')->with('status', 'Data Admin Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $admin = DB::table('admins')->where('id', $id)->first();
        return view('admin.admin.edit', compact('admin'));
    }

     public function editprocess(Request $request, $id)
    {
        $request->validate([
            'username' => "required|unique:admins,username,$id",
            'name' => 'required',
            'phone' => "required|regex:/(0)[0-9]/|not_regex:/[a-z]/|max:14|unique:admins,phone,$id",
        ]);

        DB::table('admins')->where('id', $id)
            ->update([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            ]);
             return redirect('admin/list')->with('status', 'Data Admin Berhasil Teredit!');
    }
    public function delete($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        return redirect()-> route('listadmin');
    }
}
