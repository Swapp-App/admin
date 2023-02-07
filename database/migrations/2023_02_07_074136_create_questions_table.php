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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->string('question');
            $table->boolean('general_cat');
            $table->boolean('tech_cat');
            $table->boolean('usage_cat');
            $table->boolean('cards_cat');
            $table->boolean('others_cat');
            $table->integer('views')->unsigned()->default(0);
            $table->timestamps();
            $table->unique(['question']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
