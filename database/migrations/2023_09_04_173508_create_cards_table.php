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
        Schema::create('cards', function (Blueprint $table) {
            $table->ulid('id');
            $table->string('tip')->nullable();
            $table->string('slug')->unique();
            $table->text('explanation');
            $table->string('type')->default('note');
            $table->smallInteger('votes_rate')->nullable();
            $table->integer('votes_number')->default(0);
            $table->boolean('is_approved')->default(0);

            $table->foreignUlid('user_id');
            $table->foreignUlid('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
