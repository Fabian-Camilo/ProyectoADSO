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

        $company = Company::create([
            'name'      => 'A-Team SAS',
            'email'     => 'soporte@ateam.com.co',
            'nit'      => '900983307-8'
        ]);
        User::create([
            'company_id'=> $company->id,
            'name'      => 'Dev',
            'email'     => 'test@test.dev',
            'password'  => bcrypt('123456789')
        ])->assignRole('SuperAdmin');
    }
}
