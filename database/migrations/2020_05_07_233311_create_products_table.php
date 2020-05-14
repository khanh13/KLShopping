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
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id');
            $table->string('product_name');

            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('code');
            $table->string('quantity');
            $table->text('description');
            $table->text('detail');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('main_slider')->nullable();
            $table->integer('now_trending')->nullable();
            $table->integer('new_releases')->nullable();
            $table->integer('best_rated')->nullable();
            $table->integer('mid_slider')->nullable();
            $table->integer('coming_soon')->nullable();
            $table->integer('hot_deal')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();
            $table->integer('status')->nullable();
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
