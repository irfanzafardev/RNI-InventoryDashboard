<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('groups')->insert([
      [
        'group_name' => 'Holding',
        'active' => 1
      ],
      [
        'group_name' => 'Agroindustri',
        'active' => 1
      ],
      [
        'group_name' => 'Manufaktur',
        'active' => 1
      ],
      [
        'group_name' => 'Garam',
        'active' => 1
      ]
    ]);
  }
}
