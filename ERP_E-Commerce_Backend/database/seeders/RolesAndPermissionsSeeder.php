<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'view all users']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'view post']);
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'view all posts']);
        Permission::create(['name' => 'delete post']);

        Permission::create(['name' => 'create categoryPost']);
        Permission::create(['name' => 'view categoryPost']);
        Permission::create(['name' => 'view all categoriesPosts']);
        Permission::create(['name' => 'delete categoryPost']);
        Permission::create(['name' => 'edit categoryPost']);

        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'view order']);
        Permission::create(['name' => 'view all orders']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);
        Permission::create(['name' => 'print order']);

        Permission::create(['name' => 'create invoice']);
        Permission::create(['name' => 'edit invoice']);
        Permission::create(['name' => 'view invoice']);
        Permission::create(['name' => 'view all invoices']);
        Permission::create(['name' => 'delete invoice']);
        Permission::create(['name' => 'print invoice']);

        Permission::create(['name' => 'create contract']);
        Permission::create(['name' => 'edit contract']);
        Permission::create(['name' => 'view contract']);
        Permission::create(['name' => 'delete contract']);
        Permission::create(['name' => 'view all contracts']);
        Permission::create(['name' => 'print contract']);

        Permission::create(['name' => 'create payment']);
        Permission::create(['name' => 'edit payment']);
        Permission::create(['name' => 'view payment']);
        Permission::create(['name' => 'delete payment']);
        Permission::create(['name' => 'view all payments']);
        Permission::create(['name' => 'print payment']);

        Permission::create(['name' => 'create attendance']);
        Permission::create(['name' => 'edit attendance']);
        Permission::create(['name' => 'view attendance']);
        Permission::create(['name' => 'delete attendance']);
        Permission::create(['name' => 'view all attendances']);

        Permission::create(['name' => 'create leave']);
        Permission::create(['name' => 'edit leave']);
        Permission::create(['name' => 'view leave']);
        Permission::create(['name' => 'delete leave']);
        Permission::create(['name' => 'view all leaves']);

        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'manage roles']);

        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Staff']);
        $role4 = Role::create(['name' => 'Customer']);
        $role5 = Role::create(['name' => 'Visitor']);

        $role1->givePermissionTo(Permission::all());
        $role2->givePermissionTo(Permission::all());
        $role3->givePermissionTo(Permission::all());
        $role4->givePermissionTo(Permission::all());
        $role5->givePermissionTo(Permission::all());


        $user1 = User::create([
            'name' => 'SupAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'confirm_password'=> Hash::make('superadmin'),
            'birthday'=>'25-02-2001',
            'phone'=>'694437466',
            'gender'=>'male',
            'role_id' => '1',
        ]);
        $user2 = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'confirm_password'=> Hash::make('admin'),
            'birthday'=>'31-12-2000',
            'phone'=>'620209734',
            'gender'=>'male',
            'role_id' => '2',
        ]);

        $user1->assignRole($role1);
        $user2->assignRole($role2);

    }
}
