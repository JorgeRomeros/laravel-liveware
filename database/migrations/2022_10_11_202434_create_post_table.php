<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->string('date', 255)->default(Carbon::now());
            $table->string('image', 260)->nullable();
            $table->string('text', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->enum('posted', ['yes', 'not'])->default('not');
            $table->enum('type', ['movies', 'series','books','post','article','web page','video game','comic','magazine',])->default('post');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('post');
    }
};
