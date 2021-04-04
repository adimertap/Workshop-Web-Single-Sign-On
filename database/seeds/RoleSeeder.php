<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'super_admin',
            'guard_name' => 'api'
        ]);

        Role::create([
            'name' => 'admin_fo',
            'guard_name' => 'api'
        ]);
    }
}
