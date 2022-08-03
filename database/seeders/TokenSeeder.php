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
        Token::where('user_id', '2')->update([
            'bought' => 500
        ]);
        Token::where('user_id', '3')->update([
            'bought' => 500
        ]);
    }
}
