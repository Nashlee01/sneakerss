<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('verkopers', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('email')->unique();
            $table->string('bedrijfsnaam');
            $table->string('telefoon')->nullable();
            $table->text('opmerkingen')->nullable();
            $table->boolean('actief')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('verkopers');
    }
};
