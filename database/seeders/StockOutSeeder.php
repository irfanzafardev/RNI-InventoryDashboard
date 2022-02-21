<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockOutSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('stock_outs')->insert([
      [
        'transact_code' => 'STCO-321001',
        'product_id' => 2,
        'date' => "2022-2-22",
        'quantity' => 30,
      ],
      [
        'transact_code' => 'STCO-321002',
        'product_id' => 1,
        'date' => "2022-2-22",
        'quantity' => 220,
      ],
      [
        'transact_code' => 'STCO-321003',
        'product_id' => 2,
        'date' => "2022-2-22",
        'quantity' => 39,
      ],
    ]);
  }
}
