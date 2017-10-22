@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center" style="margin: 0">
        <h1>AIRTEC.UZ</h1>
        <h2>LOREM IPSUM!</h2>
        <a class="btn btn-default">СДЕЛАТЬ ЗАКАЗ</a>
    </div>

    <div class="container-fluid text-center" style="background-color: #ddd">
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

    <div class="container-fluid">
        <div class="media container">
            <div class="media-body">
                <h3 class="media-heading">About</h3>
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

    <div>

    </div>
@endsection