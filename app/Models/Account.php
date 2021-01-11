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

    public function income($start_date, $end_date)
    {
        return Ledger::where('account_id', $this->id)->where('type', 1)->whereBetween('created_at', [$start_date, $end_date])->sum('amount');
    }

    public function expenses($start_date, $end_date)
    {
        return Ledger::where('account_id', $this->id)->where('type', 2)->whereBetween('created_at', [$start_date, $end_date])->sum('amount');
    }

}
