<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin'
        ]);

        $role2 = Role::create([
            'name' => 'sekprod'
        ]);

        $role3 = Role::create([
            'name' => 'kaprod'
        ]);

        $role4 = Role::create([
            'name' => 'dosen'
        ]);

        $role5 = Role::create([
            'name' => 'mahasiswa'
        ]);




    }
}
