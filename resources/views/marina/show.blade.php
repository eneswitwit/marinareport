@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $marina->marinaname }}
				</div>
			</div>
			<div class="panel-body" style="border: 1px solid #d3e0e9; border-radius:4px 4px 4px 4px;">
				<div class="row">
					<div class="col-md-4">
						@if(!($marina->bild == ''))
						<img src={{ '/bilder/' . $marina->bild }} style="width: 100%";>
						@endif
					</div>
					<div class="col-md-4">
						@if(!($marina->bild2 == ''))
						<img src={{ '/bilder/' . $marina->bild2 }} style="width: 100%";>
						@endif
					</div>
					<div class="col-md-4">
						@if(!($marina->bild3 == ''))
						<img src={{ '/bilder/' . $marina->bild3 }} style="width: 100%";>
						@endif
					</div>
				</div>
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
							@if($marina->$input!= NULL)
							<div id="rateYo1" data-rateyo-read-only="true" data-rateyo-rating={{ (int)$marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					<h4 style="text-align: center"> Anzahl und Verfügbarkeit Liegeplätze</h4>
					@foreach ($hafen as $i => $input)
					@if (str_contains($input,'av'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $hafen_label[$i] }}</label>
						
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo2" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
							
						</div>
					</div>
					@endif
					@endforeach
					<hr>
					<h2 style="text-align: center;"> Erreichbarkeit </h2>
					@foreach ($erreichbarkeit as $i => $input)
					@if (str_contains($input,'_e_f') || str_contains($input,'_e_a'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo3" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					<h4> Attraktive Lage </h4>
					@foreach ($erreichbarkeit as $i => $input)
					@if (str_contains($input,'_a_') || str_contains($input,'l_e_yacht') || str_contains($input,'l_bewertung'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo4" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
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
							@if($marina->$input!= NULL)
							<div id="rateYo6" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					@foreach ($erreichbarkeit as $i => $input)
					@if (str_contains($input,'l_e_boot_wertung'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo5" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					<hr>
					<h2 style="text-align: center;"> Sicherheit und Schutz des Liegeplatzes</h2>
					@foreach ($schutz as $i => $input)
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $schutz_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo7" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endforeach
					<hr>
					<h2 style="text-align: center;"> Services am Land </h2>
					@foreach ($lageservices as $i => $input)
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $lageservices_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo9" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endforeach
					<hr>
					<h2 style="text-align: center;"> Preise (inkl. Mwst.) </h2>
					<h4 style="text-align: center;"> Preise 37 Fuß </h4>
					@foreach ($preise as $i => $input)
					@if (str_contains($input,'p_ps'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo10" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					
					<h4 style="text-align: center;"> Parkplätze </h4>
					@foreach ($preise as $i => $input)
					@if (str_contains($input,'p_pp'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo11" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					@foreach ($preise as $i => $input)
					@if (str_contains($input,'p_s'))
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $preise_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							{{ $marina->$input }}
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo11" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endif
					@endforeach
					<hr>
					<h2 style="text-align: center;"> Restaurants </h2>
					@foreach ($restaurants as $i => $input)
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $restaurants_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							@if (str_contains($input,'website'))
							<a href={{$marina->$input}}> {{ $marina->$input }} </a>
							@elseif (str_contains($input,'mail') )
							<a href={{ 'mailto:' .  $marina->$input }}>{{ $marina->$input }}</a>
							@else
							{{ $marina->$input }}
							@endif
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
							@endif
						</div>
					</div>
					@endforeach
					<hr>
					<h2 style="text-align: center;"> Kontakt </h2>
					@foreach ($kontakt as $i => $input)
					<div class="row">
						<label for="name" class="col-md-2 control-label">{{ $kontakt_label[$i] }}</label>
						<div class="col-md-9">
							@if (!str_contains($input,'wertung'))
							@if (str_contains($input,'website'))
							<a href={{$marina->$input}}> {{ $marina->$input }} </a>
							@elseif (str_contains($input,'mail') )
							<a href={{ 'mailto:' .  $marina->$input }}>{{ $marina->$input }}</a>
							@else
							{{ $marina->$input }}
							@endif
							@else
							@if($marina->$input!= NULL)
							<div id="rateYo" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
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
							@if($marina->$input!= NULL)
							<div id="rateYo" data-rateyo-rating={{ $marina->$input }}></div>
							@endif
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
	@endsection