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
                        @if(count($product->images) != 0)
                            <div class="image col-md-12"
                                 style="background-image: url('{{asset($product->getFirstImage())}}');">
                             </div>                             
                        @else
                            <div class="image col-md-12" style="background-image: url({{ asset('resources/product.svg') }});">
                            </div>
                        @endif
                        <h4><strong>Цена:</strong> {{ $product->price }} сум</h4>
                        <p style="height: 132px; overflow: hidden; text-align: justify; padding: 16px;"> {{ $product->info }} </p>
                        <a class="btn" style="margin-bottom: 16px;"
                           type="button" data-toggle="modal"
                           data-target="#updateModal">Показать</a>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $products->links() !!}

        <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('tag.update') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header text-left">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="updated_name" class="col-md-2 control-label">Полное имя:</label>
                                    <div class="col-md-10">
                                        <input id="updated_name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <input id="updated_id" type="hidden" name="id">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Update">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection