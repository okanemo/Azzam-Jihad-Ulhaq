<?php

namespace App\Http\Controllers;

use App\models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function index ()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->get();
        return view('administrator.home', compact('accounts'));
    }
}
