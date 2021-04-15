<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        
        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.update'])->assignRole($role1);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.categories.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.categories.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.products.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.products.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.products.destroy'])->assignRole($role1);
        
        
    }
}
