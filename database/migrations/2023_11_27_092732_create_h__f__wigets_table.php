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
        Schema::create('h__f__wigets', function (Blueprint $table) {
            $table->id();

            $table->string('topbarStatus')->default(1)->comment('1: published', '0: unpublished');

            $table->string('facebookUrl')->nullable();
            $table->string('twitterUrl')->nullable();
            $table->string('linkedinUrl')->nullable();
            $table->string('instagramUrl')->nullable();
            $table->string('youtubeUrl')->nullable();

            $table->string('logoStatus');
            $table->string('logoImage')->nullable();
            $table->string('logoFirstHeading')->nullable();
            $table->string('logoLastHeading')->nullable();

            $table->string('advertisementwoImage')->nullable();
            $table->string('advertisementwoLink')->nullable();
            $table->string('advertisementtwoStatus')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h__f__wigets');
    }
};
