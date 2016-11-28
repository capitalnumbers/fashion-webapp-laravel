<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->text('product_description');
            $table->float('product_price', 8, 2);
            $table->string('currency_code', 5)->default('INR');
            $table->unsignedInteger('product_seller');
            $table->enum('in_stock', [1, 0])->default(1);
            $table->enum('admin_approved', [1, 0])->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_seller')->references('id')->on('users')->onDelete('cascade');
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
