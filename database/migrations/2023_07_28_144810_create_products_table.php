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
            $table->string('name')->unique();
            $table->string('slug')->nullable()->unique();
            $table->string(('short_description'))->nullable();
            $table->text('description')->nullable();
            $table->decimal('regular_price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->string('SKU')->nullable();
            $table->enum('stock_status', ['instock', 'outofstock'])->default('instock');
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('quantity')->default(10);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // cascade means if we delete a category, all the products in that category will be deleted

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
