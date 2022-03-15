<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Company;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\Category;
use App\Models\StockOut;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Database\Seeders\UnitSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\StockSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\StockInSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\StockOutSeeder;
use Database\Seeders\SubcategorySeeder;

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
      RoleSeeder::class,
      UserSeeder::class,
      CompanySeeder::class,
      GroupSeeder::class,
      CategorySeeder::class,
      SubcategorySeeder::class,
      UnitSeeder::class,
      StockSeeder::class,
    ]);

    Product::create([
      'product_code' => 'PR-321001',
      'product_name' => 'GULA - PG RA',
      'class' => 'Agroindustri',
      'user_id' => 3,
      'company' => 'PT PG Rajawali I',
      'subcategory_id' => 1,
      'category' => 'Gula',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10850
    ]);

    Product::create([
      'product_code' => 'PR-321002',
      'product_name' => 'GULA BULK (PG SHS)',
      'class' => 'Agroindustri',
      'user_id' => 3,
      'company' => 'PT PG Rajawali I',
      'subcategory_id' => 2,
      'category' => 'Gula',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-321003',
      'product_name' => 'GULA SHS (PG SHS)',
      'class' => 'Agroindustri',
      'user_id' => 3,
      'company' => 'PT PG Rajawali I',
      'subcategory_id' => 1,
      'category' => 'Gula',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-3211004',
      'product_name' => 'Teh Spesial',
      'class' => 'Agroindustri',
      'user_id' => 6,
      'company' => 'PT Mitra Kerinci',
      'subcategory_id' => 5,
      'category' => 'Teh',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-461005',
      'product_name' => 'ASSP 2,5 ML RD',
      'class' => 'Manufaktur',
      'user_id' => 7,
      'company' => 'PT Rajawali TE',
      'subcategory_id' => 12,
      'category' => 'ASSP',
      'unit_id' => 2,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-6811006',
      'product_name' => 'INNER WALINI - 0.035x58x105',
      'class' => 'Manufaktur',
      'user_id' => 8,
      'company' => 'PT Mitra RB',
      'subcategory_id' => 9,
      'category' => 'WB/IB',
      'unit_id' => 3,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-6811007',
      'product_name' => 'INNER BAG HD 0.015.62.100',
      'class' => 'Manufaktur',
      'user_id' => 8,
      'company' => 'PT Mitra RB',
      'subcategory_id' => 9,
      'category' => 'WB/IB',
      'unit_id' => 3,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-6811008',
      'product_name' => 'WB POLOS 0900.11.11.55.055',
      'class' => 'Manufaktur',
      'user_id' => 8,
      'company' => 'PT Mitra RB',
      'subcategory_id' => 10,
      'category' => 'WB/IB',
      'unit_id' => 3,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-6811009',
      'product_name' => 'WB+IB POLOS HOSANA 0900.12.12.50.080 - 0.030.52.085',
      'class' => 'Manufaktur',
      'user_id' => 7,
      'company' => 'PT Rajawali TE',
      'subcategory_id' => 11,
      'category' => 'WB/IB',
      'unit_id' => 3,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-71111010',
      'product_name' => 'Garam Pro Pure Salt Sodium Chloride ACS @ 1KG',
      'class' => 'Garam',
      'user_id' => 10,
      'company' => 'PT Garam',
      'subcategory_id' => 19,
      'category' => 'Garam Produksi Sendiri',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-71111011',
      'product_name' => 'GARAM KELUARGA SEHAT 200 - 8 KG',
      'class' => 'Garam',
      'user_id' => 10,
      'company' => 'PT Garam',
      'subcategory_id' => 19,
      'category' => 'Garam Produksi Sendiri',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);

    Product::create([
      'product_code' => 'PR-71111012',
      'product_name' => 'GARAM KASAR KEMASAN 200 GR @ 2KG	',
      'class' => 'Garam',
      'user_id' => 10,
      'company' => 'PT Garam',
      'subcategory_id' => 19,
      'category' => 'Garam Produksi Sendiri',
      'unit_id' => 1,
      'active' => 1,
      'quantity' => 0,
      'unit_price' => 10885
    ]);
  }
}
