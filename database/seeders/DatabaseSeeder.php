<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Empresa;
use App\Models\Inicio;
use App\Models\QuienesSomo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12121212')
        ]);

        Empresa::create([
            'nombreEmpresa' => '',
            'razonSocial' => '',
            'rif' => '',
            'correo' => '',
            'telefono' => '',
            'direccion' => '',
            'ciudad' => '',
            'estado' => '',
            'codigoPostal' => '',
            'google' => '',
            'facebook' => '',
            'instagram' => '',
            'foto' => 'empresa/logo.png',

        ]);

        Banner::create([
            'primaria' => '',
            'secundaria' => '',
            'quienesSomos' => '',
        ]);

        QuienesSomo::create([
            'informacion' => ''
        ]);

        Inicio::create([
            'informacion' => ''
        ]);

    }
}
