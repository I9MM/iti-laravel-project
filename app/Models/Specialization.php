<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function doctor() {
        return $this->belongsTo(User::class);
    }
}
