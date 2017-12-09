<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingRows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marinas', function (Blueprint $table) {
            $table->string('bild2')->nullable();
            $table->string('bild3')->nullable();
            $table->string('stadt')->nullable();
            $table->string('eigneryachten')->nullable();
            $table->string('charteryachten')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marinas', function (Blueprint $table) {
            //
        });
    }
}
