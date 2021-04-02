<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name'      => 'Sari and vbc vn vnvbc nvbhh nvbn  wrapped garments',
            'quantity'   => '20',
            'buy_price'  => '250',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Salwaar Kameez',
            'quantity'   => '50',
            'buy_price'  => '800',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Churidaar',
            'quantity'   => '40',
            'buy_price'  => '400',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Lehenga Chol',
            'quantity'   => '70',
            'buy_price'  => '650',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Undergarments',
            'quantity'   => '120',
            'buy_price'  => '100',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Dhoti',
            'quantity'   => '35',
            'buy_price'  => '500',
            'date'         =>Carbon::now()->addHours(6),

        ]); DB::table('items')->insert([
            'name'      => 'Sari and wrapped garments',
            'quantity'   => '20',
            'buy_price'  => '250',
        'date'         =>Carbon::now()->addHours(6),
        ]);

        DB::table('items')->insert([
            'name'      => 'Salwaar Kameez',
            'quantity'   => '50',
            'buy_price'  => '800',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Churidaar',
            'quantity'   => '40',
            'buy_price'  => '400',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Lehenga Chol',
            'quantity'   => '70',
            'buy_price'  => '650',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Undergarments',
            'quantity'   => '120',
            'buy_price'  => '100',
            'date'         =>Carbon::now()->addHours(6),
        ]);
        DB::table('items')->insert([
            'name'      => 'Dhoti',
            'quantity'   => '0',
            'buy_price'  => '500',
            'date'         =>Carbon::now()->addHours(6),
        ]);
    }
}
