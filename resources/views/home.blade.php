@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    MARINA ÜBERSICHT
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" method="GET" action="{{ route('search') }}">
                    {{ csrf_field() }}
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control"  placeholder="Suche" name="suche" id="suche">
                <span class="input-group-addon">
                    <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @foreach ($marinas as $marina)
        <div class="panel-body" style="border: 1px solid #d3e0e9; border-radius:4px 4px 4px 4px;">
            <div class="col-md-6">
                <img src={{ '/bilder/' . $marina->bild }} style="width:100%;margin-bottom: 30px;" >
            </div>
            <div class="col-md-6">
                <h3 style="margin-top: 0px;"> {{ $marina->marinaname }} </h3>
                
                <p> <b> Land </b> {{ $marina->land }} </p>
                <p> <b> Region </b> {{ $marina->region }} </p>
                <p> <b> Modernität, Attraktivität der Marina  </b>
                    <?php for($x=$marina->h_bewertung;$x>0;$x--){
                    echo '<span style="color:#f4e842;"> ★ </span>';
                    }
                ?> </span></p>
                <p> <b> Wertung Sicherheit und Schutz </b> <?php for($x=$marina->l_sicherheit_wertung;$x>0;$x--){
                    echo '<span style="color:#f4e842;"> ★ </span>';
                }?></p>
                <p> <b> Wertung Lage/Erreichbarkeit </b> <?php for($x=$marina->ls_wertung;$x>0;$x--){
                    echo '<span style="color:#f4e842;"> ★ </span>';
                }?> </p>
                <div class="row" style="margin-top:50px;">
                    <div class="col-md-4">
                        <a href={{ 'marina/' . $marina->id }}>
                            <button class="btn btn-primary btn-block">
                            Details
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href={{'/marina/' . $marina->id . '/edit'}}>
                            <button class="btn btn-primary btn-block">
                            Bearbeiten
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        {{ Form::open(array('url'=>'marina/' . $marina->id )) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Löschen', array('class' => 'btn btn-primary btn-block','onclick'=>"return confirm('Sind Sie sicher, dass sie diesen Eintrag löschen wollen?');")) }}
                        {{ Form::close() }}
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <a href="/marina/create">
                    <button class="btn btn-primary btn-block" style="height:50px; font-size: 15px;">
                    Eintrag erstellen
                    </button>
                </a>
            </div>
            <div class="col-md-6">
                <script src="{{ asset('js/cloudformatter.js') }}"></script>
                <script>
                </script>
                <a href="http://api.pdflayer.com/api/convert?access_key=a888898b574792bdc1687ed1440c8085&document_url=http://marina.eneswitwit.com/pdf& page_size=A4&margin_top=10&margin_bottom=10&margin_left=10&margin_right=10&ttl=300">
                    <button class="btn btn-primary btn-block" style="height:50px; font-size: 15px;">
                    Exportieren
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<div id="Content" style="display:none;">
@foreach ($marinas as $marina)
<div class="container" style="display:none;">
    <style>
    .row {
    margin-bottom: 30px;
    }
    </style>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $marina->marinaname }}
                </div>
            </div>
            <div class="panel-body" style="border: 1px solid #d3e0e9; border-radius:4px 4px 4px 4px;">
                <img src={{ '/bilder/' . $marina->bild }} style="width: 100%";>
                <hr>
                <h2 style="text-align: center;"> Region </h2>
                @foreach ($region as $i => $input)
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $region_label[$i] }}</label>
                    <div class="col-md-9">
                        {{ $marina->$input }}
                    </div>
                </div>
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Hafen </h2>
                @foreach ($hafen as $i => $input)
                @if (!str_contains($input,'av'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
                    
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                <h4 style=""> Anzahl und Verfügbarkeit Liegeplätze</h4>
                @foreach ($hafen as $i => $input)
                @if (str_contains($input,'av'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
                    
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                        
                    </div>
                </div>
                @endif
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Erreichbarkeit </h2>
                <h4> Erreichbarkeit </h4>
                @foreach ($erreichbarkeit as $i => $input)
                @if (str_contains($input,'_e_'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                <h4> Attraktive Lage </h4>
                @foreach ($erreichbarkeit as $i => $input)
                @if (str_contains($input,'_a_'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                @foreach ($erreichbarkeit as $i => $input)
                @if (str_contains($input,'wertung') && !str_contains($input,'sicherheit'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                <h4> Wassertiefe </h4>
                @foreach ($erreichbarkeit as $i => $input)
                @if (str_contains($input,'wt'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Schutz des Liegeplatzes </h2>
                @foreach ($schutz as $i => $input)
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $schutz_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endforeach
                @foreach ($erreichbarkeit as $i => $input)
                @if (str_contains($input,'wertung') && str_contains($input,'sicherheit'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Lage und Services </h2>
                @foreach ($lageservices as $i => $input)
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $lageservices_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Preise </h2>
                <h4> Preise 37 Fuß </h4>
                @foreach ($preise as $i => $input)
                @if (str_contains($input,'p_ps'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                
                <h4> Parkplätze </h4>
                @foreach ($preise as $i => $input)
                @if (str_contains($input,'p_pp'))
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Kontakt </h2>
                @foreach ($kontakt as $i => $input)
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $kontakt_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endforeach
                <hr>
                <h2 style="text-align: center;"> Fazit </h2>
                @foreach ($fazit as $i => $input)
                <div class="row">
                    <label for="name" class="col-md-2 control-label">{{ $fazit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        {{ $marina->$input }}
                        @else
                        {{ $marina->$input }}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection