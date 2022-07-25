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
        User::create([
            'name' =>'superAdmin',
            'email' => 'suadmin@gmail.com',
            'role_id' => '1',
            'token_id' => '1',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'temp_password' => 'NO',
            'mobileNumber' => '123456789',
        ]);

        User::create([
            'name' =>'vendor',
            'email' => 'vendor@gmail.com',
            'role_id' => '4',
            'token_id' => '2',
            'password' => Hash::make('123456'),
            'gender' => 'male',
            'temp_password' => 'NO',
            'mobileNumber' => '123456789',
        ]);

        User::factory(10)->create();
    }
}
