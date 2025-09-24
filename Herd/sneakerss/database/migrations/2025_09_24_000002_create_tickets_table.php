<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('email');
            $table->string('schoenmaat');
            $table->string('referentie')->unique();
            $table->boolean('bevestigd')->default(false);
            $table->string('bevestigings_token');
            $table->foreignId('drop_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
