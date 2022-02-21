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
        'group_name' => 'Holding'
      ],
      [
        'group_name' => 'Agroindustri'
      ],
      [
        'group_name' => 'Manufaktur'
      ],
      [
        'group_name' => 'Garam'
      ]
    ]);
  }
}
