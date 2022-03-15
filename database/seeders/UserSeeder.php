<?php

namespace Database\Seeders;

use App\Models\User;
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
    $super = User::create([
      'name' => 'Fariz Putra Dandi',
      'username' => 'fariz',
      'company_id' => 1,
      'phone' => '088888888888',
      'email' => 'fariz@gmail.com',
      'password' => bcrypt('11111111'),
    ]);

    $super->assignRole('superadmin');

    $admin = User::create([
      'name' => 'Wahyudi Putra',
      'username' => 'wahyu',
      'company_id' => 1,
      'phone' => '088888888888',
      'email' => 'wahyudi@gmail.com',
      'password' => bcrypt('11111111'),
    ]);

    $admin->assignRole('admin');

    $user = User::create(
      [
        'name' => 'Andi Wijaya',
        'username' => 'andi',
        'company_id' => 2,
        'phone' => '088888888888',
        'email' => 'andi@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Agung Wiryana',
        'username' => 'agung',
        'company_id' => 3,
        'phone' => '088888888888',
        'email' => 'agung@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Bambang Heryanto',
        'username' => 'bambang',
        'company_id' => 4,
        'phone' => '088888888888',
        'email' => 'bambang@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Zaki Nafhis',
        'username' => 'zaki',
        'company_id' => 5,
        'phone' => '088888888888',
        'email' => 'zaki@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Rudy Herlambang',
        'username' => 'rudy',
        'company_id' => 6,
        'phone' => '088888888888',
        'email' => 'rudy@mail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Hendriawan',
        'username' => 'hendriawan',
        'company_id' => 7,
        'phone' => '088888888888',
        'email' => 'hendriawan@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Kevin Mulyanto',
        'username' => 'kevin',
        'company_id' => 8,
        'phone' => '088888888888',
        'email' => 'kevin@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Budi Kusuma',
        'username' => 'budi',
        'company_id' => 9,
        'phone' => '088888888888',
        'email' => 'budi@gmail.com',
        'password' => bcrypt('qqqqqqqq'),

      ]
    );
    $user->assignRole('staff');

    $user = User::create(
      [
        'name' => 'Aryan Hutauna',
        'username' => 'aryan',
        'company_id' => 10,
        'phone' => '088888888888',
        'email' => 'aryan@gmail.com',
        'password' => bcrypt('qqqqqqqq'),
      ]
    );
    $user->assignRole('staff');
  }
}
