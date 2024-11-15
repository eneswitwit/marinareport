<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" CONTENT="noindex,nofollow">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Marina Report') }}</title>
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.rateyo.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
        body, html {
        font-family: helvetica;
        }
        .container{
        margin-top:20px;
        }
        .image-preview-input {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
        }
        .image-preview-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        }

        .image-preview-input2 {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
        }
        .image-preview-input2 input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        }

        .image-preview-input3 {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
        }
        .image-preview-input3 input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        }

        .image-preview-input-title {
        margin-left:2px;
        }
        .navbar-default .navbar-brand {
        color: white;
        }
        .navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
        color: white;
        font-size: 16px;
        }
        .navbar-default:hover .navbar-nav>li>a:hover, .navbar-default:hover .navbar-text:hover {
        color: white;
        background-color: #000080 ;
        }
        
        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
        background-color: #000080;
        }
        @media (max-width: 767px){
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: white;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                color: white;
            }
            .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus
            {
                color: white;
            }
        }
        .panel-default {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        }
        .panel-default>.panel-heading {
        text-align: center;
        font-size: 24px;
        text-decoration: none;
        border-color: white;
        }
        .btn-primary {
        background-color: #000080;
        }
        span.stars, span.stars span {
        display: block;
        background: url(stars.png) 0 -16px repeat-x;
        width: 80px;
        height: 16px;
        }
        span.stars span {
        background-position: 0 0;
        }
        .btn-primary:hover {
        background-color: grey;
        text-decoration: none;
        }
        a:hover, a:focus {
        text-decoration: none;
        }
        #imaginary_container{
        margin-top:20%; /* Don't copy this */
        }
        .stylish-input-group .input-group-addon{
        background: white !important;
        }
        .stylish-input-group .form-control{
        border-right:0;
        box-shadow:0 0 0;
        border-color:#ccc;
        }
        .stylish-input-group button{
        border:0;
        background:transparent;
        }
        </style>
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/rateyo.js') }}"></script>
        <script>
        $(function () {
        $("#rateYo1").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo2").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo3").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo4").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo5").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo6").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo7").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo8").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo9").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo10").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo11").rateYo({
        starWidth: "20px",
        });
        });
        $(function () {
        $("#rateYo12").rateYo({
        starWidth: "20px",
        });
        });
        $(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
        function () {
        $('.image-preview').popover('show');
        },
        function () {
        $('.image-preview').popover('hide');
        }
        );
        });
        $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Vorschau</strong>"+$(closebtn)[0].outerHTML,
        content: "Kein Bild.",
        placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Hochladen");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
        id: 'dynamic',
        width:250,
        height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
        $(".image-preview-input-title").text("Ändern");
        $(".image-preview-clear").show();
        $(".image-preview-filename").val(file.name);
        img.attr('src', e.target.result);
        //$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
        });
        });


        $(document).on('click', '#close-preview2', function(){
        $('.image-preview2').popover('hide');
        // Hover befor close the preview
        $('.image-preview2').hover(
        function () {
        $('.image-preview2').popover('show');
        },
        function () {
        $('.image-preview2').popover('hide');
        }
        );
        });
        $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview2',
        style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Vorschau</strong>"+$(closebtn)[0].outerHTML,
        content: "Kein Bild.",
        placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear2').click(function(){
        $('.image-preview2').attr("data-content","").popover('hide');
        $('.image-preview-filename2').val("");
        $('.image-preview-clear2').hide();
        $('.image-preview-input2 input:file').val("");
        $(".image-preview-input-title2").text("Hochladen");
        });
        // Create the preview image
        $(".image-preview-input2 input:file").change(function (){
        var img = $('<img/>', {
        id: 'dynamic',
        width:250,
        height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
        $(".image-preview-input-title2").text("Ändern");
        $(".image-preview-clear2").show();
        $(".image-preview-filename2").val(file.name);
        img.attr('src', e.target.result);
        //$(".image-preview2").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
        });
        });

        $(document).on('click', '#close-preview3', function(){
        $('.image-preview3').popover('hide');
        // Hover befor close the preview
        $('.image-preview3').hover(
        function () {
        $('.image-preview3').popover('show');
        },
        function () {
        $('.image-preview3').popover('hide');
        }
        );
        });
        $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview3',
        style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview3').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Vorschau</strong>"+$(closebtn)[0].outerHTML,
        content: "Kein Bild.",
        placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear3').click(function(){
        $('.image-preview3').attr("data-content","").popover('hide');
        $('.image-preview-filename3').val("");
        $('.image-preview-clear3').hide();
        $('.image-preview-input3 input:file').val("");
        $(".image-preview-input-title3").text("Hochladen");
        });
        // Create the preview image
        $(".image-preview-input3 input:file").change(function (){
        var img = $('<img/>', {
        id: 'dynamic',
        width:250,
        height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
        $(".image-preview-input-title3").text("Ändern");
        $(".image-preview-clear3").show();
        $(".image-preview-filename3").val(file.name);
        img.attr('src', e.target.result);
        //$(".image-preview3").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
        });
        });
        </script>
    </head>
    <body style="background-color: white;">
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top" style="background-color: #000080;">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Marina Report
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                            <li><a href="{{ route('welcome') }}">Login</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Abmelden
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </body>
</html>