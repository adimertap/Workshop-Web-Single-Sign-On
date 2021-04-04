<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'adminroleeee@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $admin->assignRole('super_admin');

        $admin_fo = User::create([
            'name' => 'FO Role',
            'email' => 'fo@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $admin_fo->assignRole('admin_fo');
    }
}
