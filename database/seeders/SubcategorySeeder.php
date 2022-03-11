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
        'category_id' => 1,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Gula Bulk',
        'category_id' => 1,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Teh Hijau',
        'category_id' => 2,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Teh Hitam',
        'category_id' => 2,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Teh Spesial',
        'category_id' => 2,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Tetes Tebu',
        'category_id' => 3,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'CPO',
        'category_id' => 5,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'PK',
        'category_id' => 5,
        'class' => 'Agroindustri',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Inner Bag',
        'category_id' => 6,
        'class' => 'Manufaktur',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Woven Bag',
        'category_id' => 6,
        'class' => 'Manufaktur',
        'active' => 1
      ],
      [
        'subcategory_name' => 'WB+IB',
        'category_id' => 6,
        'class' => 'Manufaktur',
        'active' => 1
      ],
      [
        'subcategory_name' => 'ASSP',
        'category_id' => 7,
        'class' => 'Manufaktur',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Mask',
        'category_id' => 9,
        'class' => 'Manufaktur',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Halus Karungan',
        'category_id' => 10,
        'class' => 'Garam',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Halus Kemasan',
        'category_id' => 11,
        'class' => 'Garam',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Kasar Kemasan',
        'category_id' => 12,
        'class' => 'Garam',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Import Farmasi',
        'category_id' => 13,
        'class' => 'Garam',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Rakyat PMN',
        'category_id' => 14,
        'class' => 'Garam',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Produksi Sendiri',
        'category_id' => 15,
        'class' => 'Garam',
        'active' => 1
      ],
      [
        'subcategory_name' => 'Garam Top Grande Maduro',
        'category_id' => 16,
        'class' => 'Garam',
        'active' => 1
      ],
    ]);
  }
}
