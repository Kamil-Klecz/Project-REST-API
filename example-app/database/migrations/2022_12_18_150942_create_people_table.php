<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('NAME');
            $table->string('SURNAME');
            $table->string('TELEPHONE');
            $table->string('STREET');
            $table->string('COUNTRY');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};