@extends('layouts.app')

@section('style')
    <style>
        #myCarousel {
            height: 400px;
        }

        .carousel-inner {
            width: 100%;
            max-height: 100%;
        }

        .carousel-control.left, .carousel-control.right {
            background-image: none
        }

        .item {
            background: no-repeat center;
            background-size: contain;
            height: 400px;
            margin: 0 auto 16px;
        }

        #info {
            border: 0 none;
            overflow: hidden;
            font-family: sans-serif;
            outline: none;
            min-height: 100px;
            max-height: 350px;
            height: auto;
            resize: none;
            font-size: 18px;
            width: 100%;
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid" style="margin: 100px 0 0 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active"
                                 style="background-image: url('{{ asset('resources/product.svg') }}')">
                            </div>
                            <div class="item" style="background-image: url('{{ asset('resources/product.svg') }}')">
                            </div>
                            <div class="item" style="background-image: url('{{ asset('resources/product.svg') }}')">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1>{{ $product->name }}</h1>
                    <hr>
                    <h3><strong>CATEGORIES: @foreach($product->tags as $tag)</strong>
                        <span class="badge badge-pill badge-defaul">{{ $tag->name}}</span> @endforeach </h3>
                    <h3><strong>PRICE: </strong>{{ $product->price }} sum</h3>
                    <h3><strong>MAKE ORDER</strong></h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="phone" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="number" min="0" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" placeholder="phone" class="btn" value="MAKE ORDER"/>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <h3><label for="info">Information</label></h3>
                <textarea id="info" readonly>{{ $product->info }}</textarea>
            </div>
        </div>
    </div>
@endsection