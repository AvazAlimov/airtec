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
        .copyright p{
            font-family:"Century Gothic";
            padding:15px 0 10px 0;

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
        </div>
        </div>
        <div id="contact" class="container-fluid text-center" style=" box-shadow: 0 0 5px rgba(0,0,0,0.5); background-color:#F5F5F5;padding-bottom: 130px;padding-top: 50px;">
            <div id="map">
            </div>
            <div class="container text-left">
                <br>
                <div class="col-md-6">
                    <h2>КОНТАКТЫ</h2>
                    <hr>
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <h4><strong>Адрес:</strong></h4>
                            </td>
                            <td>
                                <h4>100174 Уста Ширин ул. 116, Ташкент, Узбекистан</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><strong>Телефон:</strong></h4>
                            </td>
                            <td>
                                <h4>+99890-9188427 (Telegram)</h4>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <h4>+99897-772 84 27</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><strong>Эл. адрес:&emsp;</strong></h4>
                            </td>
                            <td>
                                <h4>sales@airtechnic.uz <br> info@airtechnic.uz</h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h3>СОЦИАЛЬНОЕ</h3>
                    <br>
                    <a href="https://www.facebook.com/">
                        <img src="{{ asset('resources/facebook.svg') }}" style="width: 32px;">
                    </a>
                    <a href="https://plus.google.com/">
                        <img src="{{ asset('resources/google-plus.svg') }}" style="width: 32px;">
                    </a>
                    <a href="https://twitter.com/">
                        <img src="{{ asset('resources/twitter.svg') }}" style="width: 32px;">
                    </a>
                    <a href="https://news.yandex.ru/?redircnt=1511691921.1">
                        <img src="{{ asset('resources/rss.svg') }}" style="width: 32px;">
                    </a>
                </div>
                <div class="col-md-6" style=" height: 300px;">
                    <h2>Связаться с нами</h2>
                    <p>Обязательные для заполнения поля помечены знаком *.</p>

                    <form action="{{ route('comment.create') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">* Ваше имя:</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">* Телефон или E-mail:</label>
                            <input type="text" id="contact" class="form-control" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Заявка:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                        </div>

                        <input type="submit" class="btn btn-info" style="background-color: #389fe8" value="Отправить">
                        <br>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>


        <div class="copyright" >
            <div class="container">

                <div class="text-center">
                    <p>Copyright © 2017 All rights reserved</p>
                </div>

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