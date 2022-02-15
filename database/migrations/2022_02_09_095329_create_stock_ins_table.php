<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stock_ins', function (Blueprint $table) {
      $table->id();
      $table->string('transact_code')->unique();
      $table->date('date')->nullable();
      $table->foreignId('product_id');
      $table->string('supplier');
      $table->integer('quantity');
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
    Schema::dropIfExists('stock_ins');
  }
}
