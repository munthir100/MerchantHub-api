<?php

use App\Models\Status;
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
            $table->id();
            $table->string('title');
            $table->decimal('price');
            $table->decimal('cost')->nullable();
            $table->string('sku')->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('is_unlimited')->default(false);
            $table->decimal('weight')->default(0);
            $table->boolean('is_discounted')->nullable()->default(false);
            $table->decimal('price_after_discount')->nullable();
            $table->string('shortcut_description');
            $table->text('description');
            $table->json('options')->nullable();
            $table->json('images')->nullable();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('status_id')->default(Status::ACTIVE)->constrained();
            $table->timestamps();
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
