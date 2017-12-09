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
		color: black;
		font-family: 'Raleway', sans-serif;
		font-weight: 100;
		margin: 0;
		word-break: break-all;
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
	<body style="background-color: white;">
		<div style="height:1100px;width: 803px;background-color: #000080;">
			<div class="content">
				<div class="title m-b-md">
					Marina Report
				</div>
			</div>
		</div>
		@foreach ($marinas as $marina)
		<div style="height:1188px;width: 803px;font-size: 11px; background-color: white;">
			<div style="height:1188px;width: 803px;padding: 0px;margin:0px;">
				<div class="row" style="width: 803px;padding: 0px;margin:0px;margin-top: 10px;">
					<div class="col-md-6">
						@if(!($marina->bild == ''))
						<img src={{ '/bilder/' . $marina->bild }} style="width: 100%;">
						@endif
						@foreach ($kontakt as $i => $input)
						{{ $marina->$input . " | " }}
						@endforeach
					</div>
					<div class="col-md-6" style="border:1px solid grey;">
						<h5 style="text-align: center;border:0px solid grey;"> {{ $marina->marinaname }} </h5>
						@foreach ($region as $i => $input)
						<div class="row">
							<label for="name" class="col-md-2 control-label">{{ $region_label[$i] }}</label>
							<div class="col-md-9">
								{{ $marina->$input }}
							</div>
						</div>
						@endforeach
						<p> <b> Modernität, Attraktivität der Marina  </b>
							<?php for($x=$marina->h_bewertung;$x>0;$x--){
							echo '<span style="color:#f4e842;"> ★ </span>';
							}
						?> </span></p>
						<p> <b> Wertung Sicherheit und Schutz </b> <?php for($x=$marina->l_sicherheit_wertung;$x>0;$x--){
																					echo '<span style="color:#f4e842;"> ★ </span>';
						}?></p>
						<p> <b> Wertung der Lage und Erreichbarkeit </b> <?php for($x=$marina->ls_wertung;$x>0;$x--){
																					echo '<span style="color:#f4e842;"> ★ </span>';
						}?> </p>
					</div>
				</div>
				<div class="row" style="width: 803px;padding: 0px;margin:0px;margin-top: 10px;">
					
					<div class="col-md-6" style="">
						<h5 style="text-align: center;"> <b> Hafen  </b> </h5>
						@foreach ($hafen as $i => $input)
						@if (!str_contains($input,'av') & !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $hafen_label[$i] }}</label>
							
							<div class="col-md-9">
								@if (!str_contains($input,'wertung'))
								{{ $marina->$input }}
								@else
								@endif
							</div>
						</div>
						@endif
						@endforeach
						<h6 style=""> Anzahl und Verfügbarkeit Liegeplätze</h6>
						@foreach ($hafen as $i => $input)
						@if (str_contains($input,'av') & !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $hafen_label[$i] }}</label>
							
							<div class="col-md-9">
								@if (!str_contains($input,'wertung'))
								{{ $marina->$input }}
								@else
								@endif
								
							</div>
						</div>
						@endif
						@endforeach
						<h5 style="text-align: center;"> <b>Preise</b> </h5>
						<h6> Preise 37 Fuß </h6>
						@foreach ($preise as $i => $input)
						@if (str_contains($input,'p_ps') & !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $preise_label[$i] }}</label>
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
						<h6> Parkplätze </h6>
						@foreach ($preise as $i => $input)
						@if (str_contains($input,'p_pp')& !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $preise_label[$i] }}</label>
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
						<div style="border:0.5px solid green; padding: 5px;padding-bottom:50px; ">
							<h5 style="text-align: center;"> Fazit </h5>
							@foreach ($fazit as $i => $input)
							<div class="row">
								<label for="name" class="col-md-3 control-label">{{ $fazit_label[$i] }}</label>
								<div class="col-md-9">
									{{ $marina->$input }}
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-6">
						<h5 style="text-align: center;"> <b> Erreichbarkeit </b> </h5>
						@foreach ($erreichbarkeit as $i => $input)
						@if (str_contains($input,'_e_') & !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $erreichbarkeit_label[$i] }}</label>
							<div class="col-md-9">
								@if (!str_contains($input,'wertung'))
								{{ $marina->$input }}
								@else
								@endif
							</div>
						</div>
						@endif
						@endforeach
						<h6> Attraktive Lage </h6>
						@foreach ($erreichbarkeit as $i => $input)
						@if (str_contains($input,'_a_') & !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-2 control-label">{{ $erreichbarkeit_label[$i] }}</label>
							<div class="col-md-9">
								@if (!str_contains($input,'wertung'))
								{{ $marina->$input }}
								@else
								@endif
							</div>
						</div>
						@endif
						@endforeach
						
						<h6> Wassertiefe </h6>
						@foreach ($erreichbarkeit as $i => $input)
						@if (str_contains($input,'wt') & !str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $erreichbarkeit_label[$i] }}</label>
							<div class="col-md-9">
								@if (!str_contains($input,'wertung'))
								{{ $marina->$input }}
								@else
								@endif
							</div>
						</div>
						@endif
						@endforeach
						<h5 style="text-align: center;"> <b> Schutz des Liegeplatzes </b> </h5>
						@foreach ($schutz as $i => $input)
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $schutz_label[$i] }}</label>
							<div class="col-md-9">
								@if (!str_contains($input,'wertung'))
								{{ $marina->$input }}
								@else
								@endif
							</div>
						</div>
						@endforeach
						<h5 style="text-align: center;"> <b> Lage und Services </b> </h5>
						@foreach ($lageservices as $i => $input)
						@if (!str_contains($input,'wertung'))
						<div class="row">
							<label for="name" class="col-md-3 control-label">{{ $lageservices_label[$i] }}</label>
							<div class="col-md-9">
								{{ $marina->$input }}
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
				<div style="text-align: center; margin-top: 5px; font-style: italic;">
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
</body>
</html>