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
        'stock_code' => 'STC-32022217100001',
        'date' => "2022-3-02",
        'product_id' => 1,
        'company' => 'PT PG Rajawali I',
        'class' => 'Agroindustri',
        'category' => 'Gula',
        'quantity' => 223,
        'value' => 2419550
      ],
      [
        'transact_code' => 'STC-32022217100002',
        'date' => "2022-3-02",
        'product_id' => 2,
        'company' => 'PT PG Rajawali I',
        'class' => 'Agroindustri',
        'category' => 'Gula',
        'quantity' => 349,
        'value' => 3786650
      ],
      [
        'transact_code' => 'STC-32022217100003',
        'date' => "2022-3-02",
        'product_id' => 2,
        'company' => 'PT PG Rajawali I',
        'class' => 'Agroindustri',
        'category' => 'Gula',
        'quantity' => 112,
        'value' => 1215200
      ]
    ]);
  }
}
