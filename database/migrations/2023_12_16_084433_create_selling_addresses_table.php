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
        Schema::create('selling_addresses', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained(); // Foreign key referencing users table            
            $table->integer('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('state');
            $table->string('pincode');
            $table->string('city');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selling_addresses');
    }
};
