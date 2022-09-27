<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('status');
            $table->boolean('is_like')->default(false);
            $table->integer('view_count')->default(0);
//            $table->foreign('user_id')->on('users')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
//            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
