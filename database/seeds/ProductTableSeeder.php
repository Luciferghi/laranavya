<?php

use App\Product;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Product::create([
              'name' => 'Lehenga',
              'slug' => 'lehenga-lehenga',
              'details' => ' Subtopic',
              'price' => 2000,
              'description' =>'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

          ])->categories()->attach(4);
          Product::create([
                  'name' => 'Tops',
                  'slug' => 'Tops-tops',
                  'details' => ' Subtopic',
                  'price' => 1000,
                  'description' =>'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

              ])->categories()->attach(5);
              Product::create([
                      'name' => 'pant',
                      'slug' => 'pant-pant',
                      'details' => ' Subtopic',
                      'price' => 3000,
                      'description' =>'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                  ])->categories()->attach(2);
                  Product::create([
                          'name' => 'shirt',
                          'slug' => 'shirt-shirt',
                           'details' => ' Subtopic',
                          'price' => 5000,
                          'description' =>'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                      ])->categories()->attach(1);
                  Product::create([
                          'name' => 'teshirt',
                          'slug' => 'teshirt-shirt',
                          'details' => ' Subtopic',
                          'price' => 5000,
                          'description' =>'Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                      ])->categories()->attach(1);
      
    }
}
