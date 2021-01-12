<?php

namespace App\Http\Controllers;

use App\models\Account;
use App\Models\Ledger;
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
    public function index(Request $request)
    {
        if(Auth::user()->roles[0]->role_name == "administrator"){
            return redirect()->route('admin.home');
        }

        $accounts = Account::where('user_id', Auth::user()->id)->get();
        $data = NULL;

        $data['start_date'] = $request->start_date ? $request->start_date : date('Y-m-d');
        $data['end_date'] = $request->end_date ? $request->end_date : date('Y-m-d', strtotime($data['start_date'] . ' +1 day'));

        foreach($accounts as $account)
        {
            $data['income'][$account->currency_code] = $account->income($data['start_date'], $data['end_date']);
            $data['expenses'][$account->currency_code] = $account->expenses($data['start_date'], $data['end_date']);
        }

        return view('member.home', compact('accounts', 'data') );
    }
}
