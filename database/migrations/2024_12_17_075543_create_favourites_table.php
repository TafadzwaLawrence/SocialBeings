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
        Schema::create('favourites', function (Blueprint $table) {
            if (config('socialbeings.use_uuids')) { // Use 'socialbeings' instead of 'mypackage'
                $table->uuid('id')->primary();
            } else {
                $table->id();
            }
            $userTable = config('socialbeings.user_table');
            $table->foreignId('favorable_id')->constrained($userTable)->onDelete('cascade');
            $table->morphs('favorable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourites');
    }
};
