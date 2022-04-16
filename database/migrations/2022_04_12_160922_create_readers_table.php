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
        Schema::create('readers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dateOfBirth');
            $table->string('mobilNumber');
            $table->string('email');
            $table->string('townID');
            $table->string('town');
            $table->string('street');
            $table->string('houseNumber');
            $table->string('motherName');
            $table->boolean('student');
            $table->string('personID');

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
        Schema::dropIfExists('readers');
    }
};
