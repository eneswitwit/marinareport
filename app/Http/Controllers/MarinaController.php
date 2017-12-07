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
            $request->file('bild')->move( base_path() . '/public/bilder/', $image);
            $marina->bild = $image;
        }

        $region = Marina::region();
        $hafen = Marina::hafen();
        $erreichbarkeit= Marina::erreichbarkeit();
        $lageservices= Marina::lageservices();
        $preise= Marina::preise(); 
        $kontakt= Marina::kontakt(); 
        $fazit= Marina::fazit();

        $union = array_merge($region,$hafen,$erreichbarkeit,$lageservices,$preise,$kontakt,$fazit);

        foreach ($union as $input)
        {
            $marina->$input = $request[$input];
        }

        $marina->save();

        $marinas = Marina::all();
        return view('home')->with(['marinas'=>$marinas]);
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
            $request->file('bild')->move( base_path() . '/public/bilder/', $image);
            $marina->bild = $image;
        }

        $region = Marina::region();
        $hafen = Marina::hafen();
        $erreichbarkeit= Marina::erreichbarkeit();
        $lageservices= Marina::lageservices();
        $preise= Marina::preise(); 
        $kontakt= Marina::kontakt(); 
        $fazit= Marina::fazit();

        $union = array_merge($region,$hafen,$erreichbarkeit,$lageservices,$preise,$kontakt,$fazit);

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
}
