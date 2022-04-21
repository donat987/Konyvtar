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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN');
            $table->string('name');
            $table->string('author');
            $table->date('appearance');
            $table->integer('stock')->nullable();
            $table->string('publisher');
            $table->text('content');
            $table->string('picture');
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('categoryID');
            $table->unsignedBigInteger('languageID');
            $table->timestamps();

            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
