<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockInSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('stock_ins')->insert([
      [
        'transact_code' => 'STCI-32022217100001',
        'product_id' => 1,
        'date' => "2022-2-11",
        'quantity' => 23,
      ],
      [
        'transact_code' => 'STCI-32022217100002',
        'product_id' => 2,
        'date' => "2022-2-11",
        'quantity' => 49,
      ],
      [
        'transact_code' => 'STCI-32022217100003',
        'product_id' => 2,
        'date' => "2022-2-11",
        'quantity' => 10,
      ]
    ]);
  }
}
