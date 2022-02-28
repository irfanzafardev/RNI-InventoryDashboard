<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('stocks')->insert([
      [
        'stock_code' => 'STCI-32022217100001',
        'date' => "2022-2-11",
        'product_id' => 1,
        'class' => 'Agroindustri',
        'quantity' => 223,
        'value' => 2419550
      ],
      [
        'transact_code' => 'STCI-32022217100002',
        'date' => "2022-2-12",
        'product_id' => 2,
        'class' => 'Agroindustri',
        'quantity' => 349,
        'value' => 3786650
      ],
      [
        'transact_code' => 'STCI-32022217100003',
        'date' => "2022-2-13",
        'product_id' => 2,
        'class' => 'Agroindustri',
        'quantity' => 112,
        'value' => 1215200
      ]
    ]);
  }
}
