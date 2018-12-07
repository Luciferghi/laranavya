<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
        	'code' => 'ABCDE',
        	'type' => 'fixed',
        	'value' => 30,

        ]);
        Coupon::create([
        	'code' => 'ABC123',
        	'type' => 'percent',
        	'percent_off' => 30,

        ]);
    }
}
