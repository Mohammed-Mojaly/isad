<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'Show users',
            'Add users',
            'Update users',
            'Delete users',

            'Show permissions',
            'Add permissions',
            'Update permissions',
            'Delete permissions',


            'Update beneficiary',
            'Update House Info',




        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // $user = User::find(1);
        // $role = Role::find(1);
        // $permissions = Permission::pluck('id', 'id')->all();
        // $role->syncPermissions($permissions);
        // $user->assignRole([$role->id]);
    }
}
