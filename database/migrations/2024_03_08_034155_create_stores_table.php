<?php

use App\Models\Status;
use App\Models\StoreTheme;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link')->unique();
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->foreignId('theme_id')->default(StoreTheme::DEFAULT)->constrained('store_themes');
            $table->foreignId('language_id')->constrained();
            $table->foreignId('owner_id')->constrained('merchants')->cascadeOnDelete();
            $table->foreignId('status_id')->default(Status::ACTIVE)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
