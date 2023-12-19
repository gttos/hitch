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
        $card = \App\Models\Card::all();
        foreach ( $card as $car ){
            $car->update([
                'slug' => Str::slug('papa aqlq')
            ]);
        }
        $categories = \App\Models\Category::all();
        foreach ( $categories as $category ){
            $category->update([
                'slug' => Str::slug($category->name)
            ]);
        }
        $tags = \App\Models\Tag::all();
        foreach ( $tags as $tag ){
            $tag->update([
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
