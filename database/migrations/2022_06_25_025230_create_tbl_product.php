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
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->integer('product_sold');
            $table->string('category_id');
            $table->string('brand_id');
            $table->string('product_desc');
            $table->string('product_content');
            $table->string('product_price');
            $table->string('product_image');
            $table->integer('product_status');
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
