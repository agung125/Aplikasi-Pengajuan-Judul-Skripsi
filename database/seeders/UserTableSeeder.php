<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data user
        $userCreate = User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin')
        ]);

        //assign permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        //assign role with permission to user
        $user = User::find(1);
        $user->assignRole($role->name);



//sekprod akun
        $sekprodCreate = User::create([
            'name'      => 'wijayanti',
            'email'     => 'wijayanti@gmail.com',
            'password'  => bcrypt('wijayanti')
        ]);


        $role = Role::find(2);
        $permissions = Permission::whereIn('name', ['skripsis.index'])->get();
        $role->syncPermissions($permissions);


        $user = User::find(2);
        $user->assignRole($role->name);


//kaprod akun
        $kapprodCreate = User::create([
            'name'      => 'slamet wiyono',
            'email'     => 'slamet@gmail.com',
            'password'  => bcrypt('slamet')
        ]);


        $role = Role::find(3);
        $permissions = Permission::whereIn('name', ['skripsis.index','dps.index', 'dps.create', 'dps.edit', 'dps.delete'])->get();
        $role->syncPermissions($permissions);

        $user = User::find(3);
        $user->assignRole($role->name);

    }
}
