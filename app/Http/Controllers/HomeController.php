<?php

namespace App\Http\Controllers;

use App\models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $accounts = Account::where('user_id', Auth::user()->id)->get();

        if(Auth::user()->roles[0]->role_name == "administrator"){
            return redirect()->route('admin.home');
        }else{
            return view('member.home', compact('accounts') );
        }
    }
}
