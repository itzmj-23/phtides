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
        Schema::create('sunrise_sunsets', function (Blueprint $table) {
            $table->id();
            $table->string('location_id')->nullable();
            $table->string('date')->nullable();
            $table->string('rise')->nullable();
            $table->string('set')->nullable();
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
        Schema::dropIfExists('sunrise_sunsets');
    }
};
