<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombreEmpresa',
        'razonSocial',
        'rif',
        'correo',
        'telefono',
        'direccion',
        'ciudad',
        'estado',
        'codigoPostal',
        'google',
        'facebook',
        'instagram',
        'foto'
    ];
}
