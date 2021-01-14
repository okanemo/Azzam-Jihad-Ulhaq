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

    // Account Controller

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

    public function show ($id)
    {
        $data['account']    = Account::where('id', $id)->first();
        // $data['transactions']['income']     = Ledger::where('account_id', $id)->where('type', 1)->get();
        // $data['transactions']['expenses']   = Ledger::where('account_id', $id)->where('type', 2)->get();
        $data['transactions']     = Ledger::where('account_id', $id)->get();
        // return $data['transactions'];
        return view('account.show', compact('data'));
    }

    // Ledger Controller

    public function create_income($id)
    {
        $data['account_id'] = $id;
        return view('ledger.create_income', compact('data'));
    }

    public function store_income(Request $request)
    {
        Ledger::create([
            'account_id' => $request->account_id,
            'amount' => $request->amount,
            'type' => 1,
            'transaction_name' => $request->transaction_name
        ]);
        return redirect()->route('home')->with('message-success', 'Income has been recorded');
    }

    public function create_expenses($id)
    {
        $data['account_id'] = $id;
        return view('ledger.create_expenses', compact('data'));
    }

    public function store_expenses(Request $request)
    {
        Ledger::create([
            'account_id' => $request->account_id,
            'amount' => $request->amount,
            'type' => 2,
            'transaction_name' => $request->transaction_name
        ]);
        return redirect()->route('home')->with('message-success', 'Expenses has been recorded');
    }
}
