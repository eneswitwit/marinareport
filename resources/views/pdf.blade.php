<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marina Report</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
        html, body {
        background-color: #000080;
        color: black;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        margin: 0;
        }
        .full-height {
        }
        .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
        }
        .position-ref {
        position: relative;
        }
        .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        }
        .content {
        text-align: center;
        }
        .title {
        font-size: 84px;
        color:white;
        text-shadow: 1px 2px;
        }
        .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        }
        .m-b-md {
        margin-bottom: 30px;
        }
        </style>
    </head>
    <body>
        <div style="height:1188px;width: 803px;">
            <div class="content">
                <div class="title m-b-md">
                    Marina Report
                </div>
            </div>
         </div>

@foreach ($marinas as $marina)
<div style="height:1188px;width: 803px;">
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
</div>
</div>
@endforeach




</body>
</html>


