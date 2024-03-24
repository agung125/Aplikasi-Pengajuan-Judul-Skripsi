<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        Permission::create(['name' => 'skripsis.index']);
        Permission::create(['name' => 'skripsis.create']);
        Permission::create(['name' => 'skripsis.edit']);
        Permission::create(['name' => 'skripsis.delete']);

        Permission::create(['name' => 'dps.index']);
        Permission::create(['name' => 'dps.create']);
        Permission::create(['name' => 'dps.edit']);
        Permission::create(['name' => 'dps.delete']);


        Permission::create(['name' => 'mahasiswas.index']);
        Permission::create(['name' => 'mahasiswas.create']);
        Permission::create(['name' => 'mahasiswas.edit']);
        Permission::create(['name' => 'mahasiswas.delete']);

        Permission::create(['name' => 'dosens.index']);
        Permission::create(['name' => 'dosens.create']);
        Permission::create(['name' => 'dosens.edit']);
        Permission::create(['name' => 'dosens.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
    }
}
