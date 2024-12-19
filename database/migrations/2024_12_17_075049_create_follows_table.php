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
        Schema::create('follows', function (Blueprint $table) {
            if (config('likesocial.use_uuids')) {
                $table->uuid('id')->primary();
            } else {
                $table->id();
            }
            $userTable = config('likesocial.user_table');

            // This should be the ID of the user who is following
            $table->foreignId('follower_id')->constrained($userTable)->onDelete('cascade');

            // These columns are for the followable model
            $table->morphs('followable'); // This creates followable_id and followable_type

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
