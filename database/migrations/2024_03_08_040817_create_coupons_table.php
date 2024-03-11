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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('promocode');
            $table->enum('discount_type', ['fixed', 'percentage']);
            $table->decimal('value');
            $table->dateTime('end_date');
            $table->boolean('is_except_discounted_products')->default(false);
            $table->integer('less_products_number')->nullable();
            $table->integer('max_usage_times')->nullable();
            $table->integer('max_usage_per_customer')->nullable();
            $table->foreignId('status_id')->constrained()->default(Status::ACTIVE);
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
