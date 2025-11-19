<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guard = ['id'];

    public function state()
    {
        return $this->belongsTo(State::class)->withDefault(['name' => 'N/A']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault(['name' => 'N/A']);
    }
}
