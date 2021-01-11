<?php

namespace App\Http\Controllers;

use App\models\Account;
use App\Models\Ledger;
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

    // Ledger Controller
    public function create_income($id)
    {
        $data['account_id'] = $id;
        return view('ledger.create_income', compact('data'));
    }

    public function store_income(Request $request)
    {
        // return $request;
        Ledger::create([
            'account_id' => $request->account_id,
            'amount' => $request->amount,
            'type' => 1,
            'transaction_name' => $request->transaction_name
        ]);
        return redirect()->route('home')->with('message-success', 'Income has been recorded');
    }
}
