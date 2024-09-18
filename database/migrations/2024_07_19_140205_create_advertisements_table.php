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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('feature_image');
            $table->string('first_image');
            $table->string('second_image');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('or_price')->nullable();
            $table->decimal('price',8,2);
            $table->decimal('sale_price',8,2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('price_status');
            $table->string('product_condition');
            $table->string('listing_location')->nullable();
            $table->integer('country_id');
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('published')->default(1);
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
