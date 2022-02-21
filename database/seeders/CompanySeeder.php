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
        'group_id' => 1
      ],
      [
        'company_name' => 'PT PG Rajawali I',
        'group_id' => 2
      ],
      [
        'company_name' => 'PT PG Candi Baru',
        'group_id' => 2
      ],
      [
        'company_name' => 'PT Mitra Kerinci',
        'group_id' => 2
      ],
      [
        'company_name' => 'PG Krebet baru I',
        'group_id' => 2
      ],
      [
        'company_name' => 'PT Rajawali Citramas',
        'group_id' => 3
      ],
      [
        'company_name' => 'PT Mitra Rajawali Banjaran',
        'group_id' => 3
      ],
      [
        'company_name' => 'PT Mitra RB',
        'group_id' => 3
      ],
      [
        'company_name' => 'PT Rajawali TE',
        'group_id' => 3
      ],
      [
        'company_name' => 'PT GIEB',
        'group_id' => 3
      ],
    ]);
  }
}
