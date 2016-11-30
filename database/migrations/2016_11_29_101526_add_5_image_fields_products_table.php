<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ImageFieldsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('image1')->default(null);
            $table->string('image2')->default(null);
            $table->string('image3')->default(null);
            $table->string('image4')->default(null);
            $table->string('image5')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn('image1');
            $table->dropColumn('image2');
            $table->dropColumn('image3');
            $table->dropColumn('image4');
            $table->dropColumn('image5');
        });
    }
}
