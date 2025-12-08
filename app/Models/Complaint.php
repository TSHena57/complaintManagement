<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => '']);
    }

    public function complaint_details()
    {
        return $this->hasMany(ComplaintDetail::class);
    }
}
