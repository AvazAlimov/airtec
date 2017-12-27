@extends('layouts.app')

@section('style')
    <style>
        #nav3, #nav4, #nav5 {
            display: none;
        }

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
                            @foreach($product->images as $image)
                            <div class="item {{$loop->first ? "active" : ""}}"
                                 style="background-image: url('{{ asset($image->path.$image->file) }}')">
                            </div>
                            @endforeach
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
                    <form action="{{route('product.order', $product->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" placeholder="name" class="form-control" name="name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="+998 (9X) XXX-XX-XX" name="phone" class="form-control phone" required/>
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="number" min="0" name="number" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="MAKE ORDER"/>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <h3><label for="info">Information</label></h3>
                <textarea id="info" readonly>{{ $product->info }}</textarea>
            </div>
            <div class="row">
                <hr>
                <h2>Same Products</h2>
                @foreach($offersa as $offer)
                    <div class="col-md-4">
                        <div class="col-md-10 col-md-offset-1 card">
                            @if(count($offer->images) != 0)
                                <div class="image col-md-12"
                                     style="background-image: url('{{asset($product->getFirstImage())}}');">
                                </div>
                            @else
                                <div class="image col-md-12"
                                     style="background-image: url({{ asset('resources/product.svg') }});">
                                </div>
                            @endif
                            <h4><strong>Цена:</strong> {{ $offer->price }} сум</h4>
                            <p style="height: 132px; overflow: hidden; text-align: justify; padding: 16px;"> {{ $offer->info }} </p>
                            <a class="btn" style="margin-bottom: 16px;" href="{{route('product.page', $offer->id)}}">Показать</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.phone').mask('+AAB (00) 000-00-00', {
                'translation': {
                    A: {pattern: /[9]/},
                    B: {pattern: /[8]/}
                }
            });
        });
    </script>
@endsection