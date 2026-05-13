<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('category');
            $table->integer('stock')->default(100);
            $table->integer('max_stock')->default(100);
            $table->integer('price');
            $table->string('color');
            $table->string('color2')->nullable();
            $table->string('status');
            $table->integer('rolls');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fabrics');
    }
};
