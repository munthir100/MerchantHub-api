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
        Schema::create('subscription_plan_features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subscription_plan_id')->constrained();
            $table->foreignId('status_id')->constrained()->default(Status::NOT_ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plan_features');
    }
};
