@extends('layouts.app')
@section('script')
    <!--suppress CssUnusedSymbol -->
    <style>
        #nav1, #nav2, #nav3, #nav4, #nav5 {
            display: none;
        }

        .card {
            padding: 0;
            box-shadow: 0 0 5px #AAA;
            background-color: white;
            border-radius: 2px;
        }

        .card:hover {
            box-shadow: 0 0 10px #AAA;
        }

        .image {
            background: no-repeat center;
            background-size: cover;
            height: 156px;
            margin: 0 auto 16px;
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
                            <div class="image col-md-12"
                                 style="background-image: url({{ asset('images/'.$product->images[0]) }});"></div>
                        @else
                            <div class="image col-md-12"
                                 style="background-image: url({{ asset('resources/product.svg') }});"></div>
                        @endif
                        <h4><strong>Цена:</strong> {{ $product->price }} сум</h4>
                        <p style="height: 132px; overflow: hidden; text-align: justify; padding: 16px;"> {{ $product->info }} </p>
                        <a class="btn" style="margin-bottom: 16px;">Показать</a>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection