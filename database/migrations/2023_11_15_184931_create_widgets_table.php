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
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();

            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('advertisementStatus')->default(1);

            $table->string('firstCategory')->nullable();
            $table->string('firstStatus')->default(1);

            $table->string('secondCategory')->nullable();
            $table->string('secondStatus')->default(1);

            $table->string('thirdCategory')->nullable();
            $table->string('thirdStatus')->default(1);

            $table->string('fourCategory')->nullable();
            $table->string('fourStatus')->default(1);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('widgets');
    }
};
