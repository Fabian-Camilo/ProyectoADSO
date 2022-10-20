<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PermissionSeeder::class]);

        $ateam = Company::create([
            'name'      => 'A-Team SAS',
            'email'     => 'soporte@ateam.com.co',
            'nit'      => '900983307-8',
            'logo_photo_path' => "company-logos/logo-ateam.png",
            'icon_photo_path' => "company-logos/icono-ateam.png",

        ]);
        User::create([
            'company_id' => $ateam->id,
            'name'      => 'Fabian Cabrera',
            'email'     => 'sistemas@ateam.com.co',
            'password'  => bcrypt('1234567890')
        ])->assignRole('SuperAdmin');

        $sinamco = Company::create([
            'name'      => 'SINAMCO SAS',
            'email'     => 'contacto@sinamco.com.co',
            'nit'      => '901271844-1',
            'website' => 'www.sinamco.com.co',
            'logo_photo_path' => "company-logos/logo-sinamco.png",
            'icon_photo_path' => "company-logos/icono-sinamco.png",
        ]);
        User::create([
            'company_id' => $sinamco->id,
            'name'      => 'Miguel Bermudez',
            'email'     => 'test@test.test',
            'password'  => bcrypt('1234567890')
        ])->assignRole('Cliente');
    }
}
