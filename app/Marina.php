<?php

namespace marinareport;

use Illuminate\Database\Eloquent\Model;

class Marina extends Model
{

	public static function region() 
	{ 
		return array('land','region' ,'stadt','marinaname'); 
	}

	public static function region_label()
	{
		return ['Land','Region' ,'Stadt','Marinaname'];
	}

	public static function hafen()
	{
		return ['h_kurz_charakteristik','h_aktuelle_belegung','h_ausstattung','h_av_wasser','h_av_transitgaeste','h_av_dauerliegeplaetze','h_av_bemerkung','h_av_sonstiges','h_bewertung'];
	}

	public static function hafen_label()
	{
		return ['Kurz-Charakteristik','Aktuelle Belegung','Ausstattung','im Wasser','für Transitgäste','Jahresliegeplätze','Bemerkung','Sonstiges','Modernität und Attraktivität des Marina'];
	}

	public static function erreichbarkeit()
	{
		return ['l_e_auto','l_e_flughafen','l_a_stadtzentrum','l_bewertung','l_e_yacht','l_wt_zufahrt','l_wt_marina','l_e_boot_wertung','e_sdl_wind','e_sdl_sicherheit','e_sdl_marinero','l_sicherheit_wertung'];
	}

	public static function erreichbarkeit_label() 
	{
		return ['per Auto aus München','zum nächsten Flughafen','zum Stadtzentrum','Wertung der Lage und Erreichbarkeit','per Yacht','in der Zufahrt','in der Marina','Wertung Erreichbarkeit per Boot','Vor Wind und Wetter','Sicherheit','Marinero','Wertung Sicherheit und Schutz'];
	}


	public static function lageservices()
	{
		return ['ls_landliegeplaetze','ls_yachtservices','ls_eigenarbeit','ls_externe_firma','ls_externe_firma_eigner','ls_tankstelle','ls_sonstiges','ls_wertung'];
	}

	public static function lageservices_label()
	{
		return ['Anzahl Landliegeplätze','Verfügbarkeit verschiedener Yacht-Services von Kran über Rigg bis Motor','Eigenarbeit am Schiff möglich?','Externe Firmen/Kosten pro Tag','Beauftragung externer Firmen nach Wahl des Eigners?','Tankstelle','Sonstiges','Wertung Services/Niveau'];
	}

	public static function preise() 
	{
		return ['p_ps_tagesliegeplatz','p_ps_jahresliegeplatz','p_ps_landliegeplatz','p_pp_anzahl','p_pp_woche','p_pp_trailer_woche','p_slipbahn','p_sonstiges'];
	}

	public static function preise_label()
	{
		return ['Tagesliegeplatz NS/VS/HS','Jahresliegeplatz Wasser ','Landliegeplatz im Winterhalbjahr?','Anzahl','Preis pro Woche','Kosten für Trailer pro Woche','Slipbahn','Sonstiges'];
	}

	public static function kontakt() 
	{
		return ['a_ansprechpartner','a_website','an_telefon','an_gsm','an_email','an_anschrift'];
	}

	public static function kontakt_label() 
	{
		return ['Ansprechpartner','Website','Telefon','GSM','eMail','Adresse'];
	}

	public static function fazit() 
	{
		return ['f_gefiel','f_nicht_gefiel','f_zusammenfassung','f_gesamtbewertung'];
	}

	public static function fazit_label() 
	{
		return ['Was gefiel','Was nicht gefiel','Zusammenfassung','Gesamtbewertung'];
	}

	public static function schutz()
	{
		return['e_sdl_wind','e_sdl_sicherheit','e_sdl_marinero','e_sdl_sonstiges','l_sicherheit_wertung'];
	}

	public static function schutz_label()
	{
		return['Vor Wind und Wetter','Sicherheit','Marinero','Sonstiges','Wertung Sicherheit und Schutz'];
	}

	public static function titles()
	{
		return [  'h' => 'Hafen'
            , 'av' => 'Anzahl und Verfügbarkeit Liegeplätze'
            , 'l' => 'Lage'
            , 'e' => 'Erreichbarkeit'
            , 'a' => 'Attraktivitaet'
            , 'wt' => 'Wassertiefe'
            , 'ls' => 'Land und Services'
            , 'p' => 'Preise'
            , 'pp' => 'Parkplätze'
            , 'ps' => 'Preise 37 Fuß'
            , 'an' => 'Anschrift'
            , 'f' => 'Fazit'
        ];
	}

 
	protected $fillable = 
	[
        'land','region' ,'marinaname','h_kurz_charakteristik','h_aktuelle_belegung','h_ausstattung','h_av_wasser','h_av_transitgaeste','h_av_dauerliegeplaetze','h_av_bemerkung','h_bewertung','l_e_auto','l_e_flughafen','l_e_yacht','l_a_stadtzentrum','l_bewertung','l_e_boot_wertung','l_wt_zufahrt','l_wt_marina','l_sicherheit_wertung','ls_yachtservices','ls_eigenarbeit','ls_externe_firma','ls_externe_firma_eigner','ls_tankstelle','ls_wertung','p_ps_tagesliegeplatz','p_ps_jahresliegeplatz','p_ps_landliegeplatz','p_pp_anzahl','p_pp_woche','p_pp_trailer_woche','p_slipbahn','a_website','f_zusammenfassung','e_sdl_wind','e_sdl_sicherheit','e_sdl_marinero','l_sicherheit_wertung',
    ];

}
