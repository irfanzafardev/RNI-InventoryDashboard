<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      [
        'name' => 'Ismail Yahya',
        'username' => 'ismail',
        'company_id' => 1,
        'phone' => '088888888888',
        'email' => 'ismail@mail.com',
        'password' => bcrypt('11111111'),
        'role' => 'superadmin',
      ],
      [
        'name' => 'Wahyudi',
        'username' => 'wahyu',
        'company_id' => 1,
        'phone' => '088888888888',
        'email' => 'wahyudi@mail.com',
        'password' => bcrypt('11111111'),
        'role' => 'admin',
      ],
      [
        'name' => 'Yovie Putranto',
        'username' => 'yovie',
        'company_id' => 2,
        'phone' => '088888888888',
        'email' => 'yovie@mail.com',
        'password' => bcrypt('qqqqqqqq'),
        'role' => 'user',
      ],
      [
        'name' => 'Ade Windu',
        'username' => 'ade',
        'company_id' => 6,
        'phone' => '088888888888',
        'email' => 'ade@mail.com',
        'password' => bcrypt('qqqqqqqq'),
        'role' => 'user',
      ],
      [
        'name' => 'Reihan Marhand',
        'username' => 'rehan',
        'company_id' => 4,
        'phone' => '088888888888',
        'email' => 'rehan@mail.com',
        'password' => bcrypt('qqqqqqqq'),
        'role' => 'user',
      ],
      [
        'name' => 'Yudha Hendrianto',
        'username' => 'aduy',
        'company_id' => 8,
        'phone' => '088888888888',
        'email' => 'yudha@mail.com',
        'password' => bcrypt('qqqqqqqq'),
        'role' => 'user',
      ],
      [
        'name' => 'Aldo Brahmantio',
        'username' => 'aldo',
        'company_id' => 11,
        'phone' => '088888888888',
        'email' => 'aldo@mail.com',
        'password' => bcrypt('qqqqqqqq'),
        'role' => 'user',
      ]
    ]);
  }
}
