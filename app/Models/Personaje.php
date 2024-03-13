<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'raza_id',
        'clase',
        'habilidades',
        'imagen',
        'user_id',
    ];

    public function raza()
    {
        return $this->belongsTo(Raza::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
