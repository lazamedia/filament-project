<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->foreignId('kategori_produks_id')
                  ->constrained('kategori_produks')
                  ->onDelete('cascade'); 
            $table->decimal('original_price'); 
            $table->decimal('sale_price');
            $table->string('image')->nullable(); 
            $table->string('link_drive')->nullable();
            $table->integer('sold')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
