<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->Integer('category_id');
            $table->string('product_name');
            $table->string('product_size');
            $table->Integer('product_price');
            $table->Integer('product_quantity');
            $table->string('product_color');
            $table->string('product_short_description');
            $table->string('product_long_description');
            $table->Integer('publication_status');
            $table->mediumText('product_image')->nullable();
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
        Schema::dropIfExists('tbl_product');
    }
}
