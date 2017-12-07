@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Marina Eintrag erstellen
                </div>
            </div>
            <div class="panel-body" style="border: 1px solid #d3e0e9; border-radius:4px 4px 4px 4px;">
                <form class="form-horizontal" method="POST" action="{{ route('marina.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Bild</label>
                            <div class="col-md-9">
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="input-group image-preview">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> 
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Löschen
                                        </button>
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Hochladen</span>
                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="bild" id="bild"/>
                                        </div>
                                    </span> 
                                    </div> 
                                </div>
                            </div>
                        <h2 style="text-align: center;"> Region </h2>
                        @foreach ($region as $i => $input)
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $region_label[$i] }}</label>
                            <div class="col-md-9">
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" required autofocus>
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        
                        <h2 style="text-align: center;"> Hafen </h2>
                        @foreach ($hafen as $i => $input)
                        @if (!str_contains($input,'av'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
                            
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <h4 style=""> Anzahl und Verfügbarkeit Liegeplätze</h4>
                        @foreach ($hafen as $i => $input)
                        @if (str_contains($input,'av'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
                            
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
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
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <h4> Attraktive Lage </h4>
                        @foreach ($erreichbarkeit as $i => $input)
                        @if (str_contains($input,'_a_') && !str_contains($input,'boot'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @foreach ($erreichbarkeit as $i => $input)
                        @if (str_contains($input,'wertung') && !str_contains($input,'sicherheit'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <h4> Wassertiefe </h4>
                        @foreach ($erreichbarkeit as $i => $input)
                        @if (str_contains($input,'wt'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
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
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach

                        @foreach ($erreichbarkeit as $i => $input)
                        @if(str_contains($input,'sicherheit_wertung'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <hr>
                        <h2 style="text-align: center;"> Lage und Services </h2>
                        @foreach ($lageservices as $i => $input)
                        <div clas="row">
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $lageservices_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        @endforeach
                        <hr>
                        <h2 style="text-align: center;"> Preise </h2>
                        <h4> Preise 37 Fuß </h4>
                        @foreach ($preise as $i => $input)
                        @if (str_contains($input,'p_ps'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <h4> Parkplätze </h4>
                        @foreach ($preise as $i => $input)
                        @if (str_contains($input,'p_pp'))
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <hr>
                        <h2 style="text-align: center;"> Kontakt </h2>
                        @foreach ($kontakt as $i => $input)
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $kontakt_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'wertung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <h2 style="text-align: center;"> Fazit </h2>
                        @foreach ($fazit as $i => $input)
                        <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">{{ $fazit_label[$i] }}</label>
                            <div class="col-md-9">
                                @if (!str_contains($input,'zusammenfassung'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus>
                                @else
                                <textarea rows="10" id={{ $input }} class="form-control" name={{ $input }} value="{{ old($input) }}" autofocus> </textarea>
                                @endif
                                @if ($errors->has($input))
                                <span class="help-block">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <input type="submit" value="Bestätigen" class="btn btn-primary btn-block" style="height:50px; font-size: 15px; margin-top: 40px;">
                    </form>
                </div>
                <div>
                </div>
            </div>
            @endsection