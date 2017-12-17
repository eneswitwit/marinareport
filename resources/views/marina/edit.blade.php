@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Marina Eintrag bearbeiten
                </div>
            </div>
            <div class="panel-body" style="border: 1px solid #d3e0e9; border-radius:4px 4px 4px 4px;">
                {{ Form::model($marina, array('route' => array('marina.update', $marina->id), 'method' => 'PUT' , 'enctype' =>'multipart/form-data','class' => 'form-horizontal')) }}
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $marina->id }}">
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
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label">Bild 2</label>
                    <div class="col-md-9">
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <div class="input-group image-preview2">
                            <input type="text" class="form-control image-preview-filename2" disabled="disabled">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default image-preview-clear2" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Löschen
                                </button>
                                <div class="btn btn-default image-preview-input2">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title2">Hochladen</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="bild2" id="bild2"/>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label">Bild 3</label>
                    <div class="col-md-9">
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <div class="input-group image-preview3">
                            <input type="text" class="form-control image-preview-filename3" disabled="disabled">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default image-preview-clear3" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Löschen
                                </button>
                                <div class="btn btn-default image-preview-input3">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title3">Hochladen</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="bild3" id="bild3"/>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <h3 style="text-align: center;"> Region </h3>
                @foreach ($region as $i => $input)
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $region_label[$i] }}</label>
                    <div class="col-md-9">
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" required autofocus>
                        @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
                
                <h3 style="text-align: center;"> Hafen </h3>
                @foreach ($hafen as $i => $input)
                @if (!str_contains($input,'av'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
                    
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        @if(str_contains($input,'kurz') || str_contains($input,'beleg'))
                        <textarea rows="3" id={{ $input }} class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>{{ $marina->$input }} </textarea>
                        @else
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @endif
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                <h4 style="text-align: center"> Anzahl und Verfügbarkeit Liegeplätze</h4>
                @foreach ($hafen as $i => $input)
                @if (str_contains($input,'av'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
                    
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                            @if (!str_contains($input,'sonstig'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                            @else 
                                <textarea rows="3" id={{ $input }} class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus> {{ $marina->$input }} </textarea>
                            @endif
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                <h3 style="text-align: center;"> Erreichbarkeit </h3>
                @foreach ($erreichbarkeit as $i => $input)
                @if (str_contains($input,'_e_'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                @if(str_contains($input,'_a_') || str_contains($input,'l_e_yacht') || str_contains($input,'l_bewertung'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                @if (str_contains($input,'l_e_boot_wertung') )
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                <h3 style="text-align: center;"> Sicherheit und Schutz des Liegeplatzes </h3>
                @foreach ($schutz as $i => $input)
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $schutz_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                            @if (!str_contains($input,'sonstig'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                            @else 
                                <textarea rows="3" id={{ $input }} class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus> {{ $marina->$input }} </textarea>
                            @endif
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @endif
                        @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
                <h3 style="text-align: center;"> Services am Land </h3>
                @foreach ($lageservices as $i => $input)
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $lageservices_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                            @if (!str_contains($input,'sonstig'))
                                <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                            @else 
                                <textarea rows="3" id={{ $input }} class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus> {{ $marina->$input }} </textarea>
                            @endif
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @endif
                        @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
                <h3 style="text-align: center;"> Preise (inkl. Mwst.)</h3>
                <h4 style="text-align: center;"> Preise 37 Fuß </h4>
                @foreach ($preise as $i => $input)
                @if (str_contains($input,'p_ps'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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
                
                <h4 style="text-align: center;"> Parkplätze </h4>
                @foreach ($preise as $i => $input)
                @if (str_contains($input,'p_pp'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
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

                @foreach ($preise as $i => $input)
                @if (str_contains($input,'p_s'))
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'sonstiges'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <textarea id={{ $input }} rows="3" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                            {{ $marina->$input }}
                        </textarea>
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
                <h3 style="text-align: center;"> Restaurants </h3>
                @foreach ($restaurants as $i => $input)
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $restaurants_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @endif
                        @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
                <h3 style="text-align: center;"> Kontakt </h3>
                @foreach ($kontakt as $i => $input)
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $kontakt_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @endif
                        @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
                <h3 style="text-align: center;"> Fazit </h3>
                @foreach ($fazit as $i => $input)
                <div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">{{ $fazit_label[$i] }}</label>
                    <div class="col-md-9">
                        @if (!str_contains($input,'wertung'))
                        <input id={{ $input }} type="text" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @else
                        <input id={{ $input }} type="integer" class="form-control" name={{ $input }} value="{{ $marina->$input }}" autofocus>
                        @endif
                        @if ($errors->has($input))
                        <span class="help-block">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
                {{ Form::submit('Bestätigen', array('class' => 'btn btn-primary btn-block', 'style' => 'height:50px; font-size: 15px; margin-top: 40px;')) }}
                {{Form::close()}}
            </div>
            <div>
            </div>
        </div>
        @endsection