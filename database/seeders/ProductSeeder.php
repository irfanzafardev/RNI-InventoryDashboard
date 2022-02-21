<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('products')->insert([
      [
        'product_code' => 'PR-111001',
        'product_name' => 'GULA - PG RA',
        'user_id' => 3,
        'subcategory_id' => 1,
        'unit_id' => 1,
        'quantity' => 0,
        'unit_price' => 10850
      ],
      [
        'product_code' => 'PR-111002',
        'product_name' => 'GULA BULK (PG SHS)',
        'user_id' => 3,
        'subcategory_id' => 2,
        'unit_id' => 1,
        'quantity' => 0,
        'unit_price' => 10885
      ],
      [
        'product_code' => 'PR-261003',
        'product_name' => 'ASSP 2,5 ML RD',
        'user_id' => 4,
        'subcategory_id' => 7,
        'unit_id' => 2,
        'quantity' => 0,
        'unit_price' => 10885
      ]
    ]);
  }
}
