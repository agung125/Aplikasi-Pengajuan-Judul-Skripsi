<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function skripsi()
    {
        return $this->hasMany(Skripsi::class,'dosen_id');
    }


    public function dps()
     {
         return $this->hasMany(Skripsi::class,'mahasiswa_id');
     }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
