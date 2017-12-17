<?php

namespace marinareport\Http\Controllers;

use marinareport\Marina;
use Illuminate\Http\Request;
use Image;
use \Input as Input;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Redirect;

class MarinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $restaurants = Marina::restaurants();
        $restaurants_label = Marina::restaurants_label();
    
        return view('marina.create')->with([
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
            'restaurants' => $restaurants,
            'restaurants_label' => $restaurants_label,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $marina = new Marina;

        $marina->land = $request['land'];
        if($request->hasFile('bild')){
            $image = $request->file('bild')->getClientOriginalName();
            $request->file('bild')->move( base_path() . '/public/bilder/', str_slug($image,"-"));
            $marina->bild = str_slug($image,"-");
        }

        if($request->hasFile('bild2')){
            $image = $request->file('bild2')->getClientOriginalName();
            $request->file('bild2')->move( base_path() . '/public/bilder/', str_slug($image,"-"));
            $marina->bild2 = str_slug($image,"-");
        }

        if($request->hasFile('bild3')){
            $image = $request->file('bild3')->getClientOriginalName();
            $request->file('bild3')->move( base_path() . '/public/bilder/', str_slug($image,"-"));
            $marina->bild3 = str_slug($image,"-");
        }

        $region = Marina::region();
        $hafen = Marina::hafen();
        $erreichbarkeit= Marina::erreichbarkeit();
        $lageservices= Marina::lageservices();
        $preise= Marina::preise(); 
        $kontakt= Marina::kontakt(); 
        $schutz = Marina::schutz();
        $fazit= Marina::fazit();
        $restaurants = Marina::restaurants();

        $union = array_merge($region,$hafen,$erreichbarkeit,$lageservices,$preise,$schutz,$restaurants,$kontakt,$fazit);

        foreach ($union as $input)
        {
            $marina->$input = $request[$input];
        }

        $marina->save();

        $marinas = Marina::all();
        return Redirect::action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \marinareport\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function show(Marina $marina)
    {
        $schutz = Marina::schutz();
        $schutz_label = Marina::schutz_label();
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
        $titles = Marina::titles(); 
        $restaurants = Marina::restaurants();
        $restaurants_label = Marina::restaurants_label();
        return view('marina.show')->with([
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
            'marina' => $marina,
            'titles' => $titles,
            'schutz' => $schutz,
            'schutz_label' => $schutz_label,
            'restaurants' => $restaurants,
            'restaurants_label' => $restaurants_label,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \marinareport\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $marina = Marina::find($id);
        $schutz = Marina::schutz();
        $schutz_label = Marina::schutz_label();
        $titles = Marina::titles(); 
        $restaurants = Marina::restaurants();
        $restaurants_label = Marina::restaurants_label();
        return view('marina.edit')->with([
            'id' => $id,
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
            'marina' => $marina,
            'titles' => $titles,
            'schutz' => $schutz,
            'schutz_label' => $schutz_label,
            'restaurants' => $restaurants,
            'restaurants_label' => $restaurants_label,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \marinareport\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marina = Marina::find($id);
        $marina->land = $request['land'];
        if($request->hasFile('bild')){
            $image = $request->file('bild')->getClientOriginalName();
            $request->file('bild')->move( base_path() . '/public/bilder/', str_slug($image,"-"));
            $marina->bild = str_slug($image,"-");
        }

        if($request->hasFile('bild2')){
            $image = $request->file('bild2')->getClientOriginalName();
            $request->file('bild2')->move( base_path() . '/public/bilder/', str_slug($image,"-"));
            $marina->bild2 = str_slug($image,"-");
        }

        if($request->hasFile('bild3')){
            $image = $request->file('bild3')->getClientOriginalName();
            $request->file('bild3')->move( base_path() . '/public/bilder/', str_slug($image,"-"));
            $marina->bild3 = str_slug($image,"-");
        }

        $region = Marina::region();
        $hafen = Marina::hafen();
        $erreichbarkeit= Marina::erreichbarkeit();
        $lageservices= Marina::lageservices();
        $preise= Marina::preise(); 
        $kontakt= Marina::kontakt(); 
        $fazit= Marina::fazit();
        $schutz = Marina::schutz();
        $restaurants = Marina::restaurants();

        $union = array_merge($region,$hafen,$erreichbarkeit,$lageservices,$preise,$kontakt,$fazit,$schutz,$restaurants);

        foreach ($union as $input)
        {
            $marina->$input = $request[$input];
        }

        $marina->save();

        return Redirect::to('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \marinareport\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marina $marina)
    {
        $marina->delete();
        return Redirect::to('home');
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
        $restaurants = Marina::restaurants();
        $restaurants_label = Marina::restaurants_label();

        /*$client = new GuzzleHttp\Client();
        $res = $client->get('http://api.pdflayer.com/api/convert?access_key=a888898b574792bdc1687ed1440c8085&document_url=marina.eneswitwit.com/pdf& page_size=A4&margin_top=10&margin_bottom=10&margin_left=10&margin_right=10');*/

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
            'restaurants' => $restaurants,
            'restaurants_label' => $restaurants_label,

        ]);

    }

    public function search(Request $request)
    {
        $search_string = $request['suche'];

        /*$search_words = [];
        while(strpos($search_string,' ') != false){
            $pos = strpos($search_string,' ');
            $search_words[] = substr($search_string,0,$pos);
            $search_string = substr($search_string, $pos+1);
        }
        $search_words[] = $search_string;

        $search_words_clean = [];*/
        //foreach($search_words as $search)
        //{
            //$search_words_clean[] = preg_replace('/[ \t]+/', '', preg_replace('/\s*$^\s*/', "", $search));
        //}

        /*$marina_by_region = [];
        $marina_by_city = [];
        $marina_by_name = [];


        foreach ($search_words_clean as $i => $search) {
            $marina_by_region[] = Marina::where('region',$search);
        }*/

        $marinas = Marina::where('marinaname','like', '%'.$search_string.'%')->get();

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
        $restaurants = Marina::restaurants();
        $restaurants_label = Marina::restaurants_label();
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
            'marinas' => $marinas,
            'restaurants' => $restaurants,
            'restaurants_label' => $restaurants_label,

        ]);
    }
}
