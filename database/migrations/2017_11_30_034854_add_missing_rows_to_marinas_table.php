<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingRowsToMarinasTable extends Migration
{

            // h  = Hafen
            // av = Anzahl und Verfügbarkeit Liegeplätze
            // l  = Lage
            // e  = Erreichbarkeit
            // a  = Attraktivitaet
            // wt = Wassertiefe
            // ls = Land und Services
            // p  = Preise
            // pp = Parkplätze
            // ps = Preise 37 Fuß
            // an = Anschrift
            // f  = Fazit
            // sdl = Schutz des Liegeplatzes


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marinas', function (Blueprint $table) {
            $table->string('e_sdl_wind')->nullable();
            $table->string('e_sdl_sicherheit')->nullable();
            $table->string('e_sdl_marinero')->nullable();
            $table->string('an_telefon')->nullable();
            $table->string('an_gsm')->nullable();
            $table->string('an_email')->nullable();
            $table->string('an_anschrift')->nullable();
            $table->string('f_gefiel')->nullable();
            $table->string('f_nicht_gefiel')->nullable();
            $table->string('bild')->nullable();
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
