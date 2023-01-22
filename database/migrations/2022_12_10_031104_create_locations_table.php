<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('coordinates_lat')->nullable();
            $table->string('coordinates_long')->nullable();
            $table->string('tide_house')->nullable();
            $table->json('instruments')->nullable();
            $table->json('enclosure')->nullable();
            $table->json('controller')->nullable();
            $table->string('tgbm')->nullable();
            $table->string('tide_staff')->nullable();
            $table->string('description')->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('locations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
};
