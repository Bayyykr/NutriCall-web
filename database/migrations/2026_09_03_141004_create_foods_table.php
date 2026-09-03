<?php

declare(strict_types=1);

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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable()->index();
            $table->string('image')->nullable();
            $table->decimal('calories', 8, 2)->default(0);
            $table->decimal('protein', 8, 2)->default(0);
            $table->decimal('carbohydrate', 8, 2)->default(0);
            $table->decimal('fat', 8, 2)->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
