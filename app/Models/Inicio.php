<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'informacion', 
        'producto1',
        'producto2',
        'producto3',
        'producto4',
        'producto5',
        'producto6',
        'producto7',
        'producto8',
        'producto9',
    ];
}
