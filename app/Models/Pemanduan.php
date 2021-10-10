<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemanduan extends Model
{
    use HasFactory;

    public function pemandu()
    {
        return $this->belongsTo(Pemandu::class);
    }
}
