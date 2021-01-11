<?php

namespace App\Http\Controllers;

use App\models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view("account.create");
    }

    public function store(Request $request)
    {
        // return $request;
        Account::create([
            'name' => $request->account_name,
            'user_id' => Auth::user()->id,
            'currency_code' => $request->currency_code,
        ]);
        return redirect()->route('home')->with('message-success', 'Account has been created successfully');
    }
}
