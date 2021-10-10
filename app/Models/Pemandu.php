<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pemanduans()
    {
        return $this->hasMany(Pemanduan::class);
    }
}
