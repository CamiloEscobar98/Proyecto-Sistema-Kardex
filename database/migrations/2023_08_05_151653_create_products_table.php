<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('product_category_id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('stock');
            $table->timestamps();

            $table->foreign('product_category_id', 'fk_product_categories_products')
                ->references('id')
                ->on('product_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unique(['product_category_id', 'name'], 'uq_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
