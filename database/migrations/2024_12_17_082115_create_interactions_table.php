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
        Schema::create('interactions', function (Blueprint $table) {
            if (config('likesocial.use_uuids')) {
                $table->uuid('id')->primary();
            } else {
                $table->id();
            }
            $userTable = config('likesocial.user_table');
            $table->foreignId('sender_id')->constrained($userTable)->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained($userTable)->onDelete('cascade');
            $table->enum('type', ['send_request', 'accept_request', 'reject_request']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};
