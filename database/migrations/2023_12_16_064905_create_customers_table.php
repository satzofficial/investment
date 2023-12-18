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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('currency');
            $table->text('notes');

            $table->string('profile_image')->nullable();
            $table->string('email');
            $table->string('website');

            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_account_holder');
            $table->string('bank_account_number');
            $table->string('bank_ifsc');

            $table->tinyInteger('status')->default('1')->comment('1- On, 0- Off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
