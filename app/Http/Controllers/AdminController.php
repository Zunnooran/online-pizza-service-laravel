<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin-dashboard');
    }
    public function login(){
        return view('admin.admin-login');
    }
    public function create(Request $request){
        $admin=admin::all();
        if ($admin['0']->password == $request->password and $admin['0']->email==$request->email) {
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('admin_id',$admin['0']->id);
                return redirect(route('admin-dashboard'));
           
        }
        else{
            return redirect(route('admin'));
        }
    }
    public function logout(){
        session()->forget(['ADMIN_LOGIN','admin_id']);
        return redirect()->route('admin');
    }
}
