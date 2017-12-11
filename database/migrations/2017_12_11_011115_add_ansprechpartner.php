<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnsprechpartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

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

    public function up()
    {
        Schema::table('marinas', function (Blueprint $table) {
            $table->string('f_gesamtbewertung')->nullable();
            $table->string('p_sonstiges')->nullable();
            $table->string('h_av_sonstiges')->nullable();
            $table->string('e_sdl_sonstiges')->nullable();
            $table->string('ls_sonstiges')->nullable();
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
