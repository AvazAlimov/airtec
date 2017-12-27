@extends('layouts.app')
@section('script')
    <!--suppress CssUnusedSymbol -->
    <style>
        #nav1, #nav2, #nav3, #nav4, #nav5 {
            display: none;
        }

        .card {
            margin-bottom: 16px;
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

        .my-group .form-control{
            width:50%;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid text-center" style="margin: 100px 0 0 0;">
        <div class="container">
            <form action="{{route('search')}}" class="col-md-8 col-md-offset-2" method="get">
                <div class="input-group my-group">
                    <input type="text" name="search" class="form-control" placeholder="Найти" value="{{Request::get('search')}}">
                    <select id="tag" class="form-control" name="tag">
                        <option selected value="">Категория</option>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}" {{Request::get('tag') == $tag->id ? "selected" : ""}}>{{$tag->name}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
                <div class="input-group col-md-8 col-md-offset-2">
                    <label for="tag"></label>

                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="container">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="col-md-10 col-md-offset-1 card">
                        @if(count($product->images) != 0)
                            <div class="image col-md-12"
                                 style="background-image: url('{{asset($product->getFirstImage())}}');">
                            </div>
                        @else
                            <div class="image col-md-12"
                                 style="background-image: url({{ asset('resources/product.svg') }});">
                            </div>
                        @endif
                        <h4><strong>Цена:</strong> {{ $product->price }} сум</h4>
                        <p style="height: 132px; overflow: hidden; text-align: justify; padding: 16px;"> {{ $product->info }} </p>
                        <a class="btn" style="margin-bottom: 16px;" href="{{route('product.page', $product->id)}}">Показать</a>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $products->links() !!}
    </div>
@endsection