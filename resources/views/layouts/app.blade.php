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
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>
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
        $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
        });
        });
        $.fn.stars = function() {
        return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
        });
        }
        $(function() {
        $('span.stars').stars();
        });
        </script>
        <style>
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
        </style>
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
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/xepOnline.jqPlugin.js') }}"></script>
    </body>
</html>