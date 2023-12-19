<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('tip');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
            $table->boolean('is_approved')->default(0)->after('slug');
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->boolean('is_approved')->default(0)->after('slug');
        });
        $card = \App\Models\Card::all();
        foreach ( $card as $car ){
            $card->update([
                'slug' => Str::slug($car->tip)
            ]);
        }
        $categories = \App\Models\Category::all();
        foreach ( $categories as $category ){
            $card->update([
                'slug' => Str::slug($category->name)
            ]);
        }
        $tags = \App\Models\Tag::all();
        foreach ( $tags as $tag ){
            $card->update([
                'slug' => Str::slug($tag->name)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
