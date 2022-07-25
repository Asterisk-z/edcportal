<?php

namespace Database\Seeders;

use App\Models\Venture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venture::create([
            'name' => 'videography',
            'code' => 'VT001',
            'fee' => '2000',
        ]);
        Venture::create([
            'name' => 'barbing',
            'code' => 'VT002',
            'fee' => '1000',
        ]);
        Venture::create([
            'name' => 'bathing & laundry product',
            'code' => 'VT003',
            'fee' => '3500',
        ]);
        Venture::create([
            'name' => 'bee farming',
            'code' => 'VT004',
            'fee' => '2000',
        ]);
        Venture::create([
            'name' => 'bread making',
            'code' => 'VT005',
            'fee' => '3500',
        ]);
        Venture::create([
            'name' => 'catering',
            'code' => 'VT006',
            'fee' => '3500',
        ]);
        Venture::create([
            'name' => 'cctv installation',
            'code' => 'VT007',
            'fee' => '2000',
        ]);
        Venture::create([
            'name' => 'fashion and design',
            'code' => 'VT008',
            'fee' => '2000',
        ]);
        Venture::create([
            'name' => 'fish farming',
            'code' => 'VT009',
            'fee' => '2500',
        ]);
        Venture::create([
            'name' => 'hair dressing',
            'code' => 'VT010',
            'fee' => '2500',
        ]);
        Venture::create([
            'name' => 'hat and fascinator',
            'code' => 'VT011',
            'fee' => '3500',
        ]);
        Venture::create([
            'name' => 'ict (microsoft application and graphic design)',
            'code' => 'VT012',
            'fee' => '1000',
        ]);
        Venture::create([
            'name' => 'interior decorating and event management',
            'code' => 'VT013',
            'fee' => '2500',
        ]);
        Venture::create([
            'name' => 'makeup and gele tying',
            'code' => 'VT014',
            'fee' => '2500',
        ]);
        Venture::create([
            'name' => 'mushroom',
            'code' => 'VT015',
            'fee' => '2000',
        ]);
        Venture::create([
            'name' => 'paint production',
            'code' => 'VT016',
            'fee' => '4000',
        ]);
        Venture::create([
            'name' => 'phone repair',
            'code' => 'VT017',
            'fee' => '2500',
        ]);
        Venture::create([
            'name' => 'photography',
            'code' => 'VT018',
            'fee' => '1000',
        ]);
        Venture::create([
            'name' => 'poultry farming',
            'code' => 'VT019',
            'fee' => '1500',
        ]);
        Venture::create([
            'name' => 'recycling craft',
            'code' => 'VT020',
            'fee' => '2500',
        ]);
        Venture::create([
            'name' => 'satellite installation',
            'code' => 'VT021',
            'fee' => '2000',
        ]);
        Venture::create([
            'name' => 'shoe making',
            'code' => 'VT022',
            'fee' => '3500',
        ]);
        Venture::create([
            'name' => 'snail farming',
            'code' => 'VT023',
            'fee' => '1000',
        ]);
        // Venture::create([
        //     'name' => 'introduction to entrepreneur',
        //     'code' => 'VT024',
        //     'fee' => '2900',
        // ]);
        // Venture::create([
        //     'name' => 'entrepreneurship education',
        //     'code' => 'VT025',
        //     'fee' => '7000',
        // ]);
        // Venture::create([
        //     'name' => 'entrepreneurship trade skill',
        //     'code' => 'VT026',
        //     'fee' => '2900',
        // ]);
        // Venture::create([
        //     'name' => 'equipment maintenance',
        //     'code' => 'VT027',
        //     'fee' => '3500',
        // ]);
    }
}

