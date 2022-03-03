<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('section');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->float('cost', 8, 2);
            $table->float('price', 8, 2);
            $table->float('discount', 8, 2)->nullable();
            $table->integer('inventory')->nullable();
            $table->boolean('available')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('image')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('additional_info')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
}
