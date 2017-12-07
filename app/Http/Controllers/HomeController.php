<?php

namespace marinareport\Http\Controllers;

use Illuminate\Http\Request;
use marinareport\Marina;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Marina::region();
        $region_label = Marina::region_label();
        $hafen = Marina::hafen();
        $hafen_label = Marina::hafen_label();
        $erreichbarkeit= Marina::erreichbarkeit();
        $erreichbarkeit_label= Marina::erreichbarkeit_label();  
        $lageservices= Marina::lageservices();
        $lageservices_label= Marina::lageservices_label();
        $preise= Marina::preise(); 
        $preise_label= Marina::preise_label();
        $kontakt= Marina::kontakt(); 
        $kontakt_label= Marina::kontakt_label(); 
        $fazit= Marina::fazit(); 
        $fazit_label= Marina::fazit_label(); 
        $schutz = Marina::schutz();
        $schutz_label = Marina::schutz_label();
        $marinas = Marina::all();
        return view('home')->with(['marinas' => $marinas,
            'region'=> $region, 
            'region_label' => $region_label,
            'hafen' => $hafen,
            'hafen_label' => $hafen_label,
            'erreichbarkeit' => $erreichbarkeit,
            'erreichbarkeit_label' => $erreichbarkeit_label,
            'lageservices' => $lageservices,
            'lageservices_label' => $lageservices_label,
            'preise' => $preise,
            'preise_label' => $preise_label,
            'kontakt' => $kontakt,
            'kontakt_label' => $kontakt_label,
            'fazit' => $fazit,
            'fazit_label' => $fazit_label,
            'schutz' => $schutz,
            'schutz_label' => $schutz_label,

        ]);
    }

    public function printPDF()
    {
        $region = Marina::region();
        $region_label = Marina::region_label();
        $hafen = Marina::hafen();
        $hafen_label = Marina::hafen_label();
        $erreichbarkeit= Marina::erreichbarkeit();
        $erreichbarkeit_label= Marina::erreichbarkeit_label();  
        $lageservices= Marina::lageservices();
        $lageservices_label= Marina::lageservices_label();
        $preise= Marina::preise(); 
        $preise_label= Marina::preise_label();
        $kontakt= Marina::kontakt(); 
        $kontakt_label= Marina::kontakt_label(); 
        $fazit= Marina::fazit(); 
        $fazit_label= Marina::fazit_label(); 
        $schutz = Marina::schutz();
        $schutz_label = Marina::schutz_label();
        $marinas = Marina::all();
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://api.pdflayer.com/api/convert?access_key=a888898b574792bdc1687ed1440c8085&document_url=marina.eneswitwit.com/pdf& page_size=A4&margin_top=10&margin_bottom=10&margin_left=10&margin_right=10');
        return view('pdf')->with(['marinas' => $marinas,
            'region'=> $region, 
            'region_label' => $region_label,
            'hafen' => $hafen,
            'hafen_label' => $hafen_label,
            'erreichbarkeit' => $erreichbarkeit,
            'erreichbarkeit_label' => $erreichbarkeit_label,
            'lageservices' => $lageservices,
            'lageservices_label' => $lageservices_label,
            'preise' => $preise,
            'preise_label' => $preise_label,
            'kontakt' => $kontakt,
            'kontakt_label' => $kontakt_label,
            'fazit' => $fazit,
            'fazit_label' => $fazit_label,
            'schutz' => $schutz,
            'schutz_label' => $schutz_label,
            'res' => $res,

        ]);

    }
}
