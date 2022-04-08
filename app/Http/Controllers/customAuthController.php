<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;


class customAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function registration(){
        return view('auth.registration');
    }

    public function registerUser(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:5 | max:12',
        ]);

        $user = new user();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have registerd succesfully');
        }else{
            return back()->with('fail', 'something wrong');
        }


    }

    public function loginUser(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = user::where('email', '=', $req->email)->first();
        if($user){
            if(Hash::check($req->password, $user->password)){
                $req->Session()->put('loginid', $user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'password not matched');
            }

        }else{
            return back()->with('fail', 'this email is not registerd');
        }
    }


    public function dashboard(){
        $data = array();

        if(Session()->has('loginid')){
         $data = user::where('id', '=', Session()->get('loginid'))->first();
        }
            //$id = Session()->get('loginid');

        return view('auth.dashboard', compact('data')) ;
    }

    public function logout(){
        if(Session()->has('loginid')){
            Session()->pull('loginid');
            return redirect('login');
        }
    }


}
