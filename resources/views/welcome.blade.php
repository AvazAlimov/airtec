@extends('layouts.app')

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }

        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
            color: #00B0FF; /*Sets the text hover color on navbar*/
            /*background-color: white;*/
        }

        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active >
        a:hover, .navbar-default .navbar-nav > .active > a:focus {
            color: #00B0FF; /*BACKGROUND color for active*/
            /*background-color: #00B0FF;*/
        }

        .navbar-default .navbar-nav > li > a {
            color: black;
        }

        .navbar-default {
            background-color: white;
            border: none;
            box-shadow: 0 0 5px #888888;
        }

        .jumbotron {
            margin: 50px 0 0 0;
            background-color: #00B0FF;
            color: white;
        }

        .pulse {
            background-color: #FF5722;
            color: white;
            border-radius: 20px;
            width: 150px;
        }

        #catalogues {
            background-image: linear-gradient(top, #00B0FF, #00B0FF 50%, transparent 50%, transparent 100%);
            background-image: -webkit-linear-gradient(top, #00B0FF, #00B0FF 50%, transparent 50%, transparent 100%)
        }

        .card {
            box-shadow: 0 0 5px #AAA;
            background-color: white;
            border-radius: 2px;
            padding: 24px;
            margin-top: 16px;
            margin-bottom: 16px;
        }

        .card:hover {
            box-shadow: 0 0 10px #AAA;
        }
    </style>
@endsection

@section('content')
    <div class="jumbotron text-center">
        <h1>AIRTEC <i class="fa fa-skyatlas"></i> UZ</h1>
        <br>
        <h4>There are some things money can't buy. For everything else, <br> there's MasterCard.</h4>
        <br>
        <a class="btn pulse">Over to you</a>
    </div>

    <div class="container-fluid text-center" id="catalogues">
        <div class="row">
            <div class="col-md-4">
                <div class=" col-md-8 col-md-offset-2 card">
                    {{--<img src="{{ asset('resources/picture.png') }}" alt="PICTURE 1">--}}
                    <i class="fa fa-skyatlas" style="font-size: 128px;"></i>
                    <br>
                    <br>
                    <h4>LOREM IPSUM</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" col-md-8 col-md-offset-2 card">
                    {{--<img src="{{ asset('resources/picture.png') }}" alt="PICTURE 1">--}}
                    <i class="fa fa-skyatlas" style="font-size: 128px;"></i>
                    <br>
                    <br>
                    <h4>LOREM IPSUM</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" col-md-8 col-md-offset-2 card">
                    {{--<img src="{{ asset('resources/picture.png') }}" alt="PICTURE 1">--}}
                    <i class="fa fa-skyatlas" style="font-size: 128px;"></i>
                    <br>
                    <br>
                    <h4>LOREM IPSUM</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
            </div>
        </div>
        <a class="btn pulse">SHOW CATALOGUE</a>
        <br>
        <br>
    </div>

    <div class="container-fluid text-center" style="background-color: #eee">
        <h2>SERVICES</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
                <div class="col-md-3">
                    <div class="img-circle" style="font-size: 4em;">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <h4>LOREM IPSUM</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="media container">
            <div class="media-body">
                <h3 class="media-heading">ABOUT</h3>
                <hr>
                <p>
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                    OOO "Airtechnic" asd asd as das da das das das das da as das dasd as das das dasd as d
                </p>
            </div>
            <div class="media-right">
                <img src="{{ asset('resources/picture.png') }}" class="img-circle" alt="PICTURE 1"
                     style="background-color: white; padding: 16px;">
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" style="background-color: #eee">
        <div class="row text-left">
            <div class="col-md-6">
                <h2>CONTACTS</h2>
                <h3>Address</h3>
                <p>Tashkent, Mirzo-Ulugbek, Ziyolilar, 9</p>
                <h3>Phone</h3>
                <p>+99871 255 55 55</p>
                <h3>Mobile</h3>
                <p>+99897 777 77 77</p>
            </div>
            <div class="col-md-6" style="background-color: white; height: 300px;">
            </div>
        </div>
    </div>

    <div class="footer" style="background-color: #2a2a2a">
        <br>
        <br>
        <br>
    </div>
@endsection