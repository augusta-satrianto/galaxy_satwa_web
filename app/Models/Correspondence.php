<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function patient()
    {
        return $this->belongsTo(User::class);
    }
}
