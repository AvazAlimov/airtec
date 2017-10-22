@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center" style="margin: 0">
        <h1>AIRTEC.UZ</h1>
        <h2>LOREM IPSUM!</h2>
        <a class="btn btn-default">СДЕЛАТЬ ЗАКАЗ</a>
    </div>

    <div class="container-fluid text-center">
        <h2>OUR CATALOGUE!</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('resources/logo-yellow.png') }}" alt="Hello" style="width: 128px; height: 128px;">
                <h4>LOREM IPSUM</h4>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('resources/logo-yellow.png') }}" alt="Hello" style="width: 128px; height: 128px;">
                <h4>LOREM IPSUM</h4>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('resources/logo-yellow.png') }}" alt="Hello" style="width: 128px; height: 128px;">
                <h4>LOREM IPSUM</h4>
            </div>
            <a class="btn btn-default">SHOW CATALOGUE</a>
        </div>
    </div>


@endsection