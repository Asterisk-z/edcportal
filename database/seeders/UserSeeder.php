<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' =>'superAdmin',
            'email' => 'suadmin@gmail.com',
            'role' => 'admin',
            'role_id' => '1',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'temp_password' => 'NO',
            'mobileNumber' => '123456789',
        ])->createToken();

        $vendor = User::create([
            'name' =>'vendor',
            'email' => 'vendor@gmail.com',
            'role_id' => '4',
            'role' => 'vendor',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'temp_password' => 'NO',
            'mobileNumber' => '123456789',
        ])->createToken();

        $vendor = User::create([
            'name' =>'vendor stew',
            'email' => 'vendorstew@gmail.com',
            'role_id' => '4',
            'role' => 'vendor',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'temp_password' => 'NO',
            'mobileNumber' => '123456789',
        ])->createToken();


        User::factory(10)->create();
    }
}
