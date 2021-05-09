<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
    public function change(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        if (Hash::check($oldpass,$password)){     
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login')->with('successMsg','successfully password change, Now Login again');
        }else{
            return Redirect()->back()->with('ErrorMsg','Old Password does not match');
        }
    }
}
