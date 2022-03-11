<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('companies')->insert([
      [
        'company_name' => 'PT RNI',
        'group_id' => 1,
        'active' => 1
      ],
      [
        'company_name' => 'PT PG Rajawali I',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'company_name' => 'PT PG Candi Baru',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'company_name' => 'PG Krebet baru I',
        'group_id' => 2,
        'active' => 1
      ],
      [
        'company_name' => 'PT Mitra Kerinci',
        'group_id' => 2,
        'active' => 1
      ],

      [
        'company_name' => 'PT Rajawali TE',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'company_name' => 'PT Mitra RB',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'company_name' => 'PT Rajawali Citramas',
        'group_id' => 3,
        'active' => 1
      ],
      [
        'company_name' => 'PT Garam',
        'group_id' => 4,
        'active' => 1
      ],
    ]);
  }
}
