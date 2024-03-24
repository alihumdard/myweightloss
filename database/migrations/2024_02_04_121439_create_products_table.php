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
            $table->text('title')->unique();
            $table->text('short_desc');
            $table->text('desc');
            $table->text('main_image');
            $table->string('price')->nullable();
            $table->string('stock')->nullable();
            $table->string('SKU')->nullable();
            $table->string('barcode')->nullable();
            $table->string('ext_tax')->nullable();
            $table->string('status')->default('1');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
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
};
