<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Token::create([
            'used' => 0,
            'bought' => 0
        ]);
        Token::create([
            'used' => 0,
            'bought' => 0
        ]);
    }
}
