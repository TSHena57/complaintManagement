<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guard = ['id'];

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault(['name' => 'N/A']);
    }
}
