<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Group;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    // Basic::create([
    //   'product_code' => '001',
    //   'product_name' => 'Gula Bulk (PG SHS)',
    //   'company' => 'PT PG Candi Baru',
    //   'group_name' => 'Agroindustri',
    //   'category_name' => 'Gula',
    //   'subcategory_name' => 'Gula Bulk',
    //   'unit_name' => 'Kg',
    //   'quantity' => 1606,
    //   'unit_price' => 10850
    // ]);

    User::create([
      'name' => 'Ismail Yahya',
      'username' => 'ismail',
      'company_id' => 1,
      'phone' => '088888888',
      'email' => 'ismail@mail.com',
      'password' => 'ismail',
      'role' => 'superadmin',
    ]);

    User::create([
      'name' => 'Wahyudi',
      'username' => 'wahyu',
      'company_id' => 1,
      'phone' => '088888888',
      'email' => 'wahyudi@mail.com',
      'password' => 'wahyudi',
      'role' => 'admin',
    ]);

    User::create([
      'name' => 'Agus Widyanto',
      'username' => 'agus',
      'company_id' => 2,
      'phone' => '088888888',
      'email' => 'widyanto@mail.com',
      'password' => 'aguswi',
      'role' => 'user',
    ]);

    Company::create([
      'company_name' => 'PT RNI',
      'group_id' => 4
    ]);

    Company::create([
      'company_name' => 'PT PG Rajawali I',
      'group_id' => 1
    ]);

    Group::create([
      'group_name' => 'Agroindustri'
    ]);

    Group::create([
      'group_name' => 'Manufaktur'
    ]);

    Group::create([
      'group_name' => 'Garam'
    ]);

    Group::create([
      'group_name' => 'Holding'
    ]);

    Category::create([
      'category_name' => 'Gula',
      'group_id' => 1
    ]);

    Category::create([
      'category_name' => 'Teh',
      'group_id' => 1
    ]);

    Category::create([
      'category_name' => 'Sawit',
      'group_id' => 1
    ]);

    Category::create([
      'category_name' => 'WB/IB',
      'group_id' => 2
    ]);

    Category::create([
      'category_name' => 'ASSP',
      'group_id' => 2
    ]);

    Subcategory::create([
      'subcategory_name' => 'Gula SHS',
      'category_id' => 1
    ]);

    Subcategory::create([
      'subcategory_name' => 'Gula Bulk',
      'category_id' => 1
    ]);

    Subcategory::create([
      'subcategory_name' => 'Teh Hijau',
      'category_id' => 2
    ]);

    Subcategory::create([
      'subcategory_name' => 'Teh Hitam',
      'category_id' => 2
    ]);

    Subcategory::create([
      'subcategory_name' => 'CPO',
      'category_id' => 3
    ]);

    Unit::create([
      'unit_name' => 'Kilogram',
      'unit_symbol' => 'Kg'
    ]);

    Unit::create([
      'unit_name' => 'Pieces',
      'unit_symbol' => 'Pcs'
    ]);

    Product::create([
      'product_code' => '001',
      'product_name' => 'GULA - PG RA',
      'user_id' => 1,
      'subcategory_id' => 1,
      'unit_id' => 1,
      'quantity' => 1606,
      'unit_price' => 10850
    ]);

    Product::create([
      'product_code' => '002',
      'product_name' => 'GULA BULK (PG SHS)',
      'user_id' => 1,
      'subcategory_id' => 2,
      'unit_id' => 1,
      'quantity' => 1099342,
      'unit_price' => 10885
    ]);

    StockIn::create([
      'transact_code' => '001',
      'product_id' => 1,
      'date' => "2022-2-22",
      'supplier' => "none",
      'quantity' => 75,
    ]);

    StockIn::create([
      'transact_code' => '002',
      'product_id' => 1,
      'date' => "2022-2-22",
      'supplier' => "none",
      'quantity' => 23,
    ]);

    StockIn::create([
      'transact_code' => '003',
      'product_id' => 2,
      'date' => "2022-2-22",
      'supplier' => "none",
      'quantity' => 100,
    ]);

    StockIn::create([
      'transact_code' => '004',
      'product_id' => 2,
      'date' => "2022-2-22",
      'supplier' => "none",
      'quantity' => 100,
    ]);

    StockOut::create([
      'transact_code' => '001',
      'product_id' => 2,
      'date' => "2022-2-22",
      'destination' => "none",
      'quantity' => 30,
    ]);

    StockOut::create([
      'transact_code' => '002',
      'product_id' => 2,
      'date' => "2022-2-22",
      'destination' => "none",
      'quantity' => 21,
    ]);
  }
}
