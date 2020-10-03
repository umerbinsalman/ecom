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
            $table->string('product_name');
            $table->longText('product_description');
            $table->decimal('product_price');
            $table->integer('product_quantity');
//            $table->unsignedBigInteger('product_tag_id')->nullable();
//            $table->unsignedBigInteger('product_category_id')->nullable();
//            $table->foreign('product_tag_id')->references('tag_id')->on('tags');
//            $table->foreign('product_category_id')->references('category_id')->on('categories');
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
