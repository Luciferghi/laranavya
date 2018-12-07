<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
        	['name' => 'T-shirt', 'slug' => 'T-shirt', 'created_at' => $now, 'updated_at' => $now ],
        	['name' => 'Pant', 'slug' => 'Pant', 'created_at' => $now, 'updated_at' => $now ],
        	['name' => 'Jacket', 'slug' => 'Jacket', 'created_at' => $now, 'updated_at' => $now ],
        	['name' => 'Lehenga', 'slug' => 'Lehenga', 'created_at' => $now, 'updated_at' => $now ],
        	['name' => 'Tops', 'slug' => 'Tops', 'created_at' => $now, 'updated_at' => $now ],
        	
        ]);


    }
}
