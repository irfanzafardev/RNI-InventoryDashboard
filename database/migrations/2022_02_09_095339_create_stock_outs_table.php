<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOutsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stock_outs', function (Blueprint $table) {
      $table->id();
      $table->string('transact_code')->unique();
      $table->date('date')->nullable();
      $table->foreignId('product_id');
      // $table->string('destination')->nullable();
      $table->string('class');
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
    Schema::dropIfExists('stock_outs');
  }
}
