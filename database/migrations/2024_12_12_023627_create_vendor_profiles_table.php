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
        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id');
            $table->string('full_name', 255);
            $table->string('email')->unique();
            $table->string('phone_number', 15);
            $table->text('address');
            $table->string('location_coordinates', 255)->nullable(); // For latitude & longitude
            $table->string('driving_license_upload');
            $table->string('identity_doc_upload');
            $table->string('picture_upload')->nullable();
            $table->string('company_name', 255);
            $table->string('company_email')->unique();
            $table->string('company_phone', 15);
            $table->text('company_address');
            $table->string('company_registration_number', 100)->nullable();
            $table->boolean('account_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_profiles');
    }
};
