<?php

namespace App\models;

use App\Models\Ledger;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];

    public function currency_desc()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_code', 'code');
    }

    public function income()
    {
        return Ledger::where('account_id', $this->id)->where('type', 1)->sum('amount');
    }

    public function expenses()
    {
        return Ledger::where('account_id', $this->id)->where('type', 2)->sum('amount');
    }

}
