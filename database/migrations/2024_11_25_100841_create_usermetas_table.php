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
        Schema::create('usermetas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unique(); // Ensure each user has one profile
            $table->text('user_role');
            
            $table->enum('title', ['Mr', 'Ms', 'Mrs', 'NA'])->nullable();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('phone', 15)->nullable();
            $table->date('dob')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('currency', 10)->nullable();
            $table->text('address')->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('introduction')->nullable();
            $table->json('languages')->nullable(); // To store multiple languages as JSON
            $table->text('address_detailed')->nullable();
            $table->string('post_code', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country_detailed', 255)->nullable();
            $table->string('tax_identification_number', 50)->nullable();
            $table->string('driving_license_upload')->nullable();
            $table->string('passport_id_upload')->nullable();
            $table->string('proof_of_address_upload')->nullable();

            $table->boolean('approved')->default(false);
            
            $table->string('company_registration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usermetas');
    }
};
