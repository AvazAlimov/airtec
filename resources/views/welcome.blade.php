@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center" style="margin: 50px 0 0 0">
        <h1>AIRTEC.UZ</h1>
        <h2>LOREM IPSUM!</h2>
        <a class="btn btn-default">СДЕЛАТЬ ЗАКАЗ</a>
    </div>

    <div class="container-fluid text-center">
        <h2>OUR CATALOGUE!</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('resources/picture.png') }}" class="img-circle" alt="PICTURE 1"
                     style="background-color: white; padding: 16px;">
                <h4>LOREM IPSUM</h4>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('resources/picture.png') }}" class="img-circle" alt="PICTURE 1"
                     style="background-color: white; padding: 16px;">
                <h4>LOREM IPSUM</h4>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('resources/picture.png') }}" class="img-circle" alt="PICTURE 1"
                     style="background-color: white; padding: 16px;">
                <h4>LOREM IPSUM</h4>
            </div>
        </div>
        <a class="btn btn-default">SHOW CATALOGUE</a>
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