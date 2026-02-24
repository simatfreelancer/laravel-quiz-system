<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\adminModel;


class adminController extends Controller
{
    function adminlogin(Request $req){
    //    return $req->input();
    //     return 'admin login';
    //validation on form
    $validation = $req->validate([
          "name"=>"required",
          "password"=>"required"
    ]);
    $admin = adminModel::where([
        ['name',"=",$req->name],
        ['password',"=",$req->password]

    ])->first();

    if(!$admin){
        $validation = $req->validate([
        "user"=>"required",
        ],[
            "user.required"=>"User does not exist"
        ]);
    }
    // return view('admin');
    //return $req->name;
    Session::put('admin',$admin);
    return redirect('dashboard');
    }

    function dashboard(){
        $admin =    Session::get('admin');
        if($admin){
            return view('admin',['name'=>$admin->name]);
        }else{
            return redirect('admin-login');
        }

    }
}
