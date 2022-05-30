<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $adminPermissions = ['manage-users', 'view-users', 'create-users', 'edit-users', 'delete-users', 'manage-permission', 'product-add', 'product-view'];
        foreach($adminPermissions as $ap)
        {
            $permission = Permission::create(['name' => $ap]);
            $adminRole->givePermissionTo($permission);
        }
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@natieva.com',
            'password' => Hash::make('123456')
        ]);
        $adminUser->assignRole($adminRole);

        $editorRole = Role::create(['name' => 'Reseller']);
        $editorPermissions = ['product-view'];
        foreach($editorPermissions as $ep)
        {
            $permission = Permission::firstOrCreate(['name' => $ep]);
            $editorRole->givePermissionTo($permission);
        }
        $editorUser = User::create([
            'name' => 'Reseller',
            'email' => 'reseller@natieva.com',
            'password' => Hash::make('123456')
        ]);
        $editorUser->assignRole($editorRole);

    }
}
