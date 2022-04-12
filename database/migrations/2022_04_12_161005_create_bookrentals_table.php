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
        Schema::create('bookrentals', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('backDate');
            $table->unsignedBigInteger('readerID');
            $table->unsignedBigInteger('bookID');
            $table->unsignedBigInteger('issuedBy');
            $table->timestamps();

            $table->foreign('readerID')->references('id')->on('readers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bookID')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('issuedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookrentals');
    }
};
