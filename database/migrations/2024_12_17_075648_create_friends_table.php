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
        Schema::create('friends', function (Blueprint $table) {
            if (config('likesocial.use_uuids')) { // Use 'likesocial' instead of 'mypackage'
                $table->uuid('id')->primary();
            } else {
                $table->id();
            }
            $userTable = config('likesocial.user_table');
            $table->foreignId('friend_id')->constrained($userTable)->onDelete('cascade');
            $table->morphs('friendable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
