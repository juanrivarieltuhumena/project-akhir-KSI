<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pemains()
    {
        return $this->hasMany(\App\Models\Pemain::class);
    }
}
