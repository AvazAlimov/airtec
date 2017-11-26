@extends('layouts.app')
@section('script')
    <style>
        #nav1, #nav2, #nav3, #nav4, #nav5 {
            display: none;
        }

        .card {
            box-shadow: 0 0 5px #AAA;
            background-color: white;
            border-radius: 2px;
        }

        .card:hover {
            box-shadow: 0 0 10px #AAA;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid text-center" style="margin: 100px 0 0 0;">
        <div class="container">
            <form action="" class="col-md-8 col-md-offset-2" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Найти">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <br>
        <br>
        <div class="container">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="col-md-10 col-md-offset-1 card">
                        @if(!empty($product->images))
                            <img src="{{ asset('images/'.$product->images[0]) }}">
                        @endif
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection