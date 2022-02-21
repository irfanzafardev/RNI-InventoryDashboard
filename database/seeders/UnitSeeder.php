<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('units')->insert([
      [
        'unit_name' => 'Kilogram',
        'unit_symbol' => 'Kg'
      ],
      [
        'unit_name' => 'Pieces',
        'unit_symbol' => 'Pcs'
      ],
      [
        'unit_name' => 'Lembar',
        'unit_symbol' => 'Lbr'
      ],
      [
        'unit_name' => 'Box',
        'unit_symbol' => 'Box'
      ],
      [
        'unit_name' => 'Set',
        'unit_symbol' => 'Set'
      ],
      [
        'unit_name' => 'Bottle',
        'unit_symbol' => 'Btl'
      ],
      [
        'unit_name' => 'Tub',
        'unit_symbol' => 'Tub'
      ],
      [
        'unit_name' => 'Kit',
        'unit_symbol' => 'Kit'
      ],
      [
        'unit_name' => 'Density of states',
        'unit_symbol' => 'Dos'
      ],
    ]);
  }
}
