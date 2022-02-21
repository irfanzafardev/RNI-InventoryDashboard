<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('categories')->insert([
      [
        'category_name' => 'Gula',
        'group_id' => 2
      ],
      [
        'category_name' => 'Teh',
        'group_id' => 2
      ],
      [
        'category_name' => 'Tetes',
        'group_id' => 2
      ],
      [
        'category_name' => 'Sawit',
        'group_id' => 2
      ],
      [
        'category_name' => 'WB/IB',
        'group_id' => 3
      ],
      [
        'category_name' => 'ASSP',
        'group_id' => 3
      ],
      [
        'category_name' => 'Alat Kesehatan',
        'group_id' => 3
      ],
      [
        'category_name' => 'Produk Lain',
        'group_id' => 3
      ],
      [
        'category_name' => 'Garam Kasar Kemasan',
        'group_id' => 4
      ],
      [
        'category_name' => 'Garam Halus Kemasan',
        'group_id' => 4
      ],
      [
        'category_name' => 'Garam Low Sodium Lososa',
        'group_id' => 4
      ],
      [
        'category_name' => 'Garam Top Grade Maduros',
        'group_id' => 4
      ],
    ]);
  }
}
