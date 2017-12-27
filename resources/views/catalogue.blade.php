@extends('layouts.app')
@section('script')
    <!--suppress CssUnusedSymbol -->
    <style>
         #nav2, #nav3, #nav4, #nav5 {
            display: none;
        }
        #contact {
            padding: 0;
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


        .copyright p{
            font-family:"Century Gothic";
            padding:15px 0 10px 0;

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
    </div>
@endsection