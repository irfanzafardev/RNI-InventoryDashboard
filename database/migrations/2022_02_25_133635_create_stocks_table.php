<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stocks', function (Blueprint $table) {
      $table->id();
      $table->string('stock_code')->unique();
      $table->date('date');
      $table->foreignId('product_id');
      $table->string('company');
      $table->string('class');
      $table->integer('quantity');
      $table->integer('value');
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
    Schema::dropIfExists('stocks');
  }
}
