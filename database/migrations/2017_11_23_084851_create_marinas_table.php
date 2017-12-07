<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marinas', function (Blueprint $table) {
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

            // Details
            $table->increments('id');
            $table->string('region');
            $table->string('marinaname');

            // Hafen
            $table->string('h_kurz_charakteristik')->nullable();
            $table->string('h_aktuelle_belegung')->nullable();
            $table->string('h_ausstattung')->nullable();
            $table->string('h_av_wasser')->nullable();
            $table->string('h_av_transitgaeste')->nullable();
            $table->string('h_av_dauerliegeplaetze')->nullable();
            $table->string('h_av_bemerkung')->nullable();
            $table->integer('h_bewertung')->nullable();

            // Lage
            $table->string('l_e_auto')->nullable();
            $table->string('l_e_flughafen')->nullable();
            $table->string('l_e_yacht')->nullable();
            $table->string('l_a_stadtzentrum')->nullable();
            $table->integer('l_bewertung')->nullable();
            $table->integer('l_e_boot_wertung')->nullable();
            $table->string('l_wt_zufahrt')->nullable();
            $table->string('l_wt_marina')->nullable();
            $table->integer('l_sicherheit_wertung')->nullable();

            // Land und Services
            $table->string('ls_yachtservices')->nullable();
            $table->string('ls_eigenarbeit')->nullable();
            $table->string('ls_externe_firma')->nullable();
            $table->string('ls_externe_firma_eigner')->nullable();
            $table->string('ls_tankstelle')->nullable();
            $table->integer('ls_wertung')->nullable();

            // Preise
            $table->string('p_ps_tagesliegeplatz')->nullable();
            $table->string('p_ps_jahresliegeplatz')->nullable();
            $table->string('p_ps_landliegeplatz')->nullable();
            $table->string('p_pp_anzahl')->nullable();
            $table->string('p_pp_woche')->nullable();
            $table->string('p_pp_trailer_woche')->nullable();
            $table->string('p_slipbahn')->nullable();

            // Anschrift
            $table->string('a_website')->nullable();

            // Fazit
            $table->string('f_zusammenfassung')->nullable();

            // Rest
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
        Schema::dropIfExists('marinas');
    }
}
