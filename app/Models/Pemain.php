<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt; 

class Pemain extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function klub()
    {
        return $this->belongsTo(\App\Models\Klub::class);
    }

    // ✅ Mutator untuk menyimpan gaji terenkripsi
    public function setGajiAttribute($value)
    {
        $this->attributes['gaji_encrypted'] = Crypt::encrypt($value);
    }

    // ✅ Mutator untuk menyimpan kontak terenkripsi
    public function setKontakAttribute($value)
    {
        $this->attributes['kontak_encrypted'] = Crypt::encrypt($value);
    }

    // ✅ Accessor untuk membaca gaji terdekripsi
    public function getGajiAttribute()
    {
        return Crypt::decrypt($this->gaji_encrypted);
    }

    // ✅ Accessor untuk membaca kontak terdekripsi
    public function getKontakAttribute()
    {
        return Crypt::decrypt($this->kontak_encrypted);
    }
}
