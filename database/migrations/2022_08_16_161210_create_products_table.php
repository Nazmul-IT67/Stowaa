<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('product_title');
            $table->string('slug')->uniqid();
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id');
            $table->foreignId('brand_id');
            $table->foreignId('color_id');
            $table->foreignId('size_id');
            $table->string('summery');
            $table->text('description');
            $table->string('price');
            $table->string('thumbnail')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
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
};
