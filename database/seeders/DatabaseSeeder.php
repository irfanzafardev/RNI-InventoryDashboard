<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Company;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Category;
use App\Models\StockOut;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\StockInSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\StockOutSeeder;
use Database\Seeders\SubcategorySeeder;
use Database\Seeders\UnitSeeder;

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

    $this->call([
      UserSeeder::class,
      CompanySeeder::class,
      GroupSeeder::class,
      // ProductSeeder::class,
      CategorySeeder::class,
      SubcategorySeeder::class,
      // StockInSeeder::class,
      // StockOutSeeder::class,
      UnitSeeder::class
    ]);

    Product::create([
      'product_code' => 'PR-321001',
      'product_name' => 'GULA - PG RA',
      'user_id' => 3,
      'subcategory_id' => 1,
      'unit_id' => 1,
      'quantity' => 0,
      'unit_price' => 10850
    ]);

    Product::create([
      'product_code' => 'PR-321002',
      'product_name' => 'GULA BULK (PG SHS)',
      'user_id' => 3,
      'subcategory_id' => 2,
      'unit_id' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-261003',
      'product_name' => 'ASSP 2,5 ML RD',
      'user_id' => 5,
      'subcategory_id' => 7,
      'unit_id' => 2,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-541004',
      'product_name' => 'GULA SHS (PG SHS)',
      'user_id' => 5,
      'subcategory_id' => 2,
      'unit_id' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-3211005',
      'product_name' => 'Teh Spesial',
      'user_id' => 3,
      'subcategory_id' => 2,
      'unit_id' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-6811006',
      'product_name' => 'INNER WALINI - 0.035x58x105',
      'user_id' => 3,
      'subcategory_id' => 2,
      'unit_id' => 3,
      'quantity' => 0,
      'unit_price' => 10885
    ]);
  }
}
