<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }



    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/file/' . $value),
        );
    }
}
