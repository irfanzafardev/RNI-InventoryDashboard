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
        'group_id' => 2,
        'active' => 1
      ],
      [
        'category_name' => 'Teh',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'category_name' => 'Tetes',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'category_name' => 'Karet',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'category_name' => 'Sawit',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'category_name' => 'WB/IB',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'category_name' => 'ASSP',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'category_name' => 'Alat Kesehatan',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'category_name' => 'Produk Manufaktur Lain',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Halus Karungan',
        'group_id' => 4,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Halus Kemasan',
        'group_id' => 4,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Kasar Kemasan',
        'group_id' => 4,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Import Farmasi',
        'group_id' => 4,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Rakyat PMN',
        'group_id' => 4,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Produksi Sendiri',
        'group_id' => 4,
        'active' => 1
      ],
      [
        'category_name' => 'Garam Top Grande Maduro',
        'group_id' => 4,
        'active' => 1
      ],
    ]);
  }
}
