<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('product_code')->unique();
      $table->string('product_name')->unique();
      $table->foreignId('user_id');
      $table->foreignId('subcategory_id');
      $table->foreignId('unit_id');
      $table->bigInteger('quantity');
      $table->bigInteger('unit_price');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products');
  }
}
