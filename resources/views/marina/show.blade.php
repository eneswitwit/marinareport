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
				@if(!($marina->bild == ''))
				<img src={{ '/bilder/' . $marina->bild }} style="width: 100%";>
				@endif
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
				<h4 style=""> Anzahl und Verfügbarkeit Liegeplätze</h4>
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
				@if (str_contains($input,'_e_'))
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
				@if (str_contains($input,'_a_'))
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
				@foreach ($erreichbarkeit as $i => $input)
				@if (str_contains($input,'wertung') && !str_contains($input,'sicherheit'))
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
				<hr>
				<h2 style="text-align: center;"> Schutz des Liegeplatzes </h2>
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
				@foreach ($erreichbarkeit as $i => $input)
				@if (str_contains($input,'wertung') && str_contains($input,'sicherheit'))
				<div class="row">
					<label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
					<div class="col-md-9">
						@if (!str_contains($input,'wertung'))
						{{ $marina->$input }}
						@else
						@if($marina->$input!= NULL)
							<div id="rateYo8" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
						@endif
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
						@if($marina->$input!= NULL)
							<div id="rateYo9" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
						@endif
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
						@if($marina->$input!= NULL)
							<div id="rateYo10" data-rateyo-read-only="true" data-rateyo-rating={{ $marina->$input }}></div>
						@endif
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
						@if($marina->$input!= NULL)
							<div id="rateYo11" data-rateyo-rating={{ $marina->$input }}></div>
						@endif
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
