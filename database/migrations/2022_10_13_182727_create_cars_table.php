<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('city');
            $table->string('volume');
            $table->string('mileage');
            $table->string('transmission');
            $table->text('image');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
