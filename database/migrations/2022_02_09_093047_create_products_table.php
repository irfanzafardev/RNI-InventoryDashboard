<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
      $table->string('product_name');
      $table->string('class');
      $table->foreignId('user_id');
      $table->string('company');
      $table->foreignId('subcategory_id');
      $table->string('category');
      $table->foreignId('unit_id');
      $table->boolean('active')->default(1);
      $table->bigInteger('quantity')->Nullable();
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
