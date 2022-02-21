<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('subcategories')->insert([
      [
        'subcategory_name' => 'Gula SHS',
        'category_id' => 1
      ],
      [
        'subcategory_name' => 'Gula Bulk',
        'category_id' => 1
      ],
      [
        'subcategory_name' => 'Teh Hijau',
        'category_id' => 2
      ],
      [
        'subcategory_name' => 'Teh Hitam',
        'category_id' => 2
      ],
      [
        'subcategory_name' => 'Teh Spesial',
        'category_id' => 2
      ],
      [
        'subcategory_name' => 'Tetes Tebu',
        'category_id' => 3
      ],
      [
        'subcategory_name' => 'CPO',
        'category_id' => 4
      ],
      [
        'subcategory_name' => 'PK',
        'category_id' => 4
      ],
      [
        'subcategory_name' => 'Inner Bag',
        'category_id' => 5
      ],
      [
        'subcategory_name' => 'Woven Bag',
        'category_id' => 5
      ],
      [
        'subcategory_name' => 'WB+IB',
        'category_id' => 5
      ],
      [
        'subcategory_name' => 'ASSP',
        'category_id' => 6
      ],
      [
        'subcategory_name' => 'Mask',
        'category_id' => 8
      ],
    ]);
  }
}
