@extends('layouts.app')
<!--         $table->increments('id');
            $table->string('region');
            $table->string('marinaname');

            // Hafen
            $table->string('h_kurz_charakteristik')->nullable();
            $table->string('h_aktuelle_belegung')->nullable();
            $table->string('h_ausstattung')->nullable();
            $table->string('h_av_wasser')->nullable();
            $table->string('h_av_transitgaeste')->nullable();
            $table->string('h_av_dauerliegeplaetze')->nullable();
            $table->string('h_av_bemerkung')->nullable();
            $table->integer('h_bewertung')->nullable();

            // Lage
            $table->string('l_e_auto')->nullable();
            $table->string('l_e_flughafen')->nullable();
            $table->string('l_e_yacht')->nullable();
            $table->string('l_a_stadtzentrum')->nullable();
            $table->integer('l_bewertung')->nullable();
            $table->integer('l_e_boot_wertung')->nullable();
            $table->string('l_wt_zufahrt')->nullable();
            $table->string('l_wt_marina')->nullable();
            $table->integer('l_sicherheit_wertung')->nullable();

            // Land und Services
            $table->string('ls_yachtservices')->nullable();
            $table->string('ls_eigenarbeit')->nullable();
            $table->string('ls_externe_firma')->nullable();
            $table->string('ls_externe_firma_eigner')->nullable();
            $table->string('ls_tankstelle')->nullable();
            $table->integer('ls_wertung')->nullable();

            // Preise
            $table->string('p_ps_tagesliegeplatz')->nullable();
            $table->string('p_ps_jahresliegeplatz')->nullable();
            $table->string('p_ps_landliegeplatz')->nullable();
            $table->string('p_pp_anzahl')->nullable();
            $table->string('p_pp_woche')->nullable();
            $table->string('p_pp_trailer_woche')->nullable();
            $table->string('p_slipbahn')->nullable();

            // Anschrift
            $table->string('a_website')->nullable();

            // Fazit
            $table->string('f_zusammenfassung')->nullable();-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
