<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Countries;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        // Countries Object
        $country_id1 = Countries::where('code', 'US')->get(['id'])->first()->toArray();
        $country_id2 = Countries::where('code', 'CA')->get(['id'])->first()->toArray();

        // Employee
        $role_employee = Role::where('name', 'employee')->first();
        $employee = new User();
        $employee->name = 'Employee';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('123456');
        $employee->country_id = $country_id1['id'];
        $employee->save();
        $employee->roles()->attach($role_employee);
        $employee = new User();
        $employee->name = 'Employee 2';
        $employee->email = 'employee2@example.com';
        $employee->password = bcrypt('123456');
        $employee->country_id = $country_id2['id'];
        $employee->save();
        $employee->roles()->attach($role_employee);

        // Manager
        $role_manager  = Role::where('name', 'manager')->first();
        $manager = new User();
        $manager->name = 'Manager';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('123456');
        $manager->country_id = $country_id1['id'];
        $manager->save();
        $manager->roles()->attach($role_manager);
        $manager = new User();
        $manager->name = 'Manager2';
        $manager->email = 'manager2@example.com';
        $manager->password = bcrypt('123456');
        $manager->country_id = $country_id2['id'];
        $manager->save();
        $manager->roles()->attach($role_manager);

        // Admin
        $role_admin  = Role::where('name', 'admin')->first();
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('123456');
        $admin->country_id = $country_id1['id'];
        $admin->save();
        $admin->roles()->attach($role_admin);

        // Super Admin
        $role_superadmin  = Role::where('name', 'superadmin')->first();
        $superadmin = new User();
        $superadmin->name = 'Super Admin';
        $superadmin->email = 'superadmin@example.com';
        $superadmin->password = bcrypt('123456');
        $superadmin->country_id = $country_id2['id'];
        $superadmin->save();
        $superadmin->roles()->attach($role_superadmin);
    }
}
