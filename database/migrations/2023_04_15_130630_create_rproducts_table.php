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
        Schema::create('rproducts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('catagory')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('secondhand_price')->nullable();
            $table->string('rent_price')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('genre')->nullable();
            $table->string('author')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rproducts');
    }
};
