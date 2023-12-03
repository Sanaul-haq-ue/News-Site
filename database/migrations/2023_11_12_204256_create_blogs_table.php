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
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();

//            $table->foreignIdFor(\App\Models\User::class);
            $table->string('image')->nullable();

            $table->string('title');
            $table->text('slug')->unique();
            $table->text('description');

            $table->foreignId('category_id')->constrained();
            $table->date('date');
            $table->tinyInteger('addSlider')->default(1)->comment('1: Active', '0: Unactive');
            $table->string('blog_type');

            $table->string('status')->default(1)->comment('1: Published, 0: Unpublished');

            $table->longText('count')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
