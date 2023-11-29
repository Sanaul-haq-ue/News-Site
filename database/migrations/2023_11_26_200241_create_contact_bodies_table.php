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
        Schema::create('contact_bodies', function (Blueprint $table) {
            $table->id();

            $table->string('contact_heading')->nullable();

            $table->string('contact_info')->nullable();
            $table->Text('contact_info_description')->nullable();

            $table->string('office_address')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone')->nullable();

            $table->string('contact_form_info')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_bodies');
    }
};
