<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];

    public function currency_desc()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_code', 'code');
    }

}
