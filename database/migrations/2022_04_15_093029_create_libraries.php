<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id");
            $table->foreignId("user_id");
            $table->string("title", 50);
            $table->string("image")->nullable();
            $table->string("slug", 50);
            $table->text("description");
            $table->boolean("is_adopt")->default(false);
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
        Schema::dropIfExists('libraries');
    }
}

// Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores iste laudantium cum eum dignissimos? Provident ad, enim unde ducimus laudantium voluptates deserunt incidunt sint aspernatur, odit eum! Exercitationem, aliquid sed.