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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            // user_id is a foreign key that references the id column on the users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date_permission');
            $table->text('reason');
            $table->string('image')->nullabel();
            $table->boolean('is_approved')->default(false); // true for granted, false for denied
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
