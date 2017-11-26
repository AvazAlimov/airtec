@extends('layouts.app')

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }

        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
            color: #00B0FF; /*Sets the text hover color on navbar*/
            /*background-color: white;*/
        }

        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active >
        a:hover, .navbar-default .navbar-nav > .active > a:focus {
            color: #00B0FF; /*BACKGROUND color for active*/
            /*background-color: #00B0FF;*/
        }

        .navbar-default .navbar-nav > li > a {
            color: black;
        }

        .navbar-default {
            background-color: white;
            border: none;
            box-shadow: 0 0 5px #888888;
        }

        .jumbotron {
            margin: 50px 0 0 0;
            background-color: #00B0FF;
            color: white;
        }

        .pulse {
            background-color: #2196F3;
            color: white;
            border-radius: 0;
            min-width: 150px;
            font-size: 20px;
        }

        #catalogues {
            background-image: linear-gradient(top, #00B0FF, #00B0FF 50%, transparent 50%, transparent 100%);
            background-image: -webkit-linear-gradient(top, #00B0FF, #00B0FF 50%, transparent 50%, transparent 100%)
        }

        .card {
            box-shadow: 0 0 5px #AAA;
            background-color: white;
            border-radius: 2px;
            padding: 24px;
            margin-top: 16px;
            margin-bottom: 16px;
        }

        .card:hover {
            box-shadow: 0 0 10px #AAA;
        }

        #services {
            background-color: #f8f8f8;
        }

        #map {
            margin: 0 auto;
            height: 500px;
        }

        #services {
            background: rgba(0, 0, 0, 0) url("https://www.toptal.com/designers/subtlepatterns/patterns/cream_pixels.png") repeat scroll 0 0;
        }

        .hr {
            width: 200px;
            height: 3px;
            background-color: #2196F3;
        }

        #contact {
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="jumbotron text-center">
        <h1>AIRTEC <i class="fa fa-skyatlas"></i> UZ</h1>
        <br>
        <h2>Ремонт и Сервисное Обслуживание Воздушно Винтовых Компрессоров и Осушителей</h2>
        <br>
        <a class="btn pulse">Заказать</a>
    </div>

    <div id="catalogues" class="container-fluid text-center">
        <br>
        <div class="container">
            <div class="col-md-4">
                <div class="col-md-10 col-md-offset-1 card">
                    {{--<img src="{{ asset('resources/picture.png') }}" alt="PICTURE 1">--}}
                    <i class="fa fa-skyatlas" style="font-size: 128px;"></i>
                    <br>
                    <br>
                    <h4>Воздушные Фильтры</h4>
                    <hr>
                    <p>
                        Воздушный фильтр является важнейшим элементом не только в компрессорном оборудовании, но и в
                        других видах оборудования эксплуатируемого в различных отраслях.
                        <br>
                        <br>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" col-md-10 col-md-offset-1 card">
                    {{--<img src="{{ asset('resources/picture.png') }}" alt="PICTURE 1">--}}
                    <i class="fa fa-skyatlas" style="font-size: 128px;"></i>
                    <br>
                    <br>
                    <h4>Масляные Фильтры</h4>
                    <hr>
                    <p>
                        Сложно себе представить оборудование, которое работало бы без масляного и без воздушного
                        фильтров. Масляные, как и воздушные, фильтры выпускаются в больших объемах и для разного
                        оборудования.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" col-md-10 col-md-offset-1 card">
                    {{--<img src="{{ asset('resources/picture.png') }}" alt="PICTURE 1">--}}
                    <i class="fa fa-skyatlas" style="font-size: 128px;"></i>
                    <br>
                    <br>
                    <h4>Сепараторы</h4>
                    <hr>
                    <p>
                        Использование циклонных сепараторов преимущественно заметно на винтовых компрессорах.
                        Наша компания может предложить сепараторы на любые компрессоры, любых производителей.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <a class="btn pulse">ПОКАЗАТЬ КАТАЛОГ</a>
        <br>
        <br>
        <br>
    </div>

    <div id="services" class="container-fluid text-center">
        <br>
        <h2>СЕРВИСЫ</h2>
        <hr class="hr">
        <br>
        <div class="container">
            <div class="col-md-4">
                <div class=" col-md-10 col-md-offset-1">
                    <img src="{{ asset('resources/service_1.svg') }}" alt="PICTURE 1" style=" width: 128px;">
                    <br>
                    <br>
                    <h4>ПРЕДПРОЕКТНОЕ ОБСЛЕДОВАНИЕ</h4>
                    <p>
                        Для квалифицированного подбора и монтажа оборудования, в некоторых ситуациях, требуется выезд
                        специалиста
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" col-md-10 col-md-offset-1">
                    <img src="{{ asset('resources/service_2.svg') }}" alt="PICTURE 1" style=" width: 128px;">
                    <br>
                    <br>
                    <h4>ПУСКОНАЛАДОЧНЫЕ РАБОТЫ</h4>
                    <p>
                        Монтаж и запуск оборудования, обучение персонала
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" col-md-10 col-md-offset-1">
                    <img src="{{ asset('resources/service_3.svg') }}" alt="PICTURE 1" style=" width: 128px;">
                    <br>
                    <br>
                    <h4>ГАРАНТИЙНОЕ И ПОСЛЕ ГАРАНТИЙНОЕ ОБСЛУЖИВАНИЕ</h4>
                    <p>
                        Диагностика, технический акт осмотра
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>

    <div id="about" class="container-fluid text-center" style="padding: 0">
        <br>
        <h2>О НАС</h2>
        <hr class="hr">
        <div class="container" style="text-align: center">
            <div class="row">
                <div class="col-md-4">
                    <div class=" col-md-10 col-md-offset-1">
                        <img src="{{ asset('resources/about_1.svg') }}" alt="PICTURE 1" style=" width: 96px;">
                        <h4>Качественная продукция</h4>
                        <p style="text-align: justify;">
                            Мы предоставляем нашим заказчикам только проверенные и испытанные на практике комплектующие
                            и
                            расходные материалы.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=" col-md-10 col-md-offset-1">
                        <img src="{{ asset('resources/about_2.svg') }}" alt="PICTURE 1" style=" width: 96px;">
                        <h4>Большой Ассортимент</h4>
                        <p style="text-align: justify;">
                            Ассортимент продукции "AirTechnic" позволяет предложить всевозможные дополнительные запчасти
                            и
                            комплектующие.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=" col-md-10 col-md-offset-1">
                        <img src="{{ asset('resources/about_3.svg') }}" alt="PICTURE 1" style=" width: 96px;">
                        <h4>Сервисная Служба</h4>
                        <p style="text-align: justify">
                            Собственная сервисная служба сопровождает клиента на всём протяжении использования
                            оборудования
                            и действует на всей территории Республики Узбекистан.
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row col-md-9 col-md-offset-1">
                <div class="col-md-6">
                    <div class=" col-md-10 col-md-offset-1">
                        <img src="{{ asset('resources/about_4.svg') }}" alt="PICTURE 1" style=" width: 96px;">
                        <h4>Низкие Цены</h4>
                        <p style="text-align: justify">
                            Работая напрямую с заводами изготовителями и странах Европы н Азии, наша компания может
                            предложить для своих заказчиков самые низкие цены.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" col-md-10 col-md-offset-1">
                        <img src="{{ asset('resources/about_5.svg') }}" alt="PICTURE 1" style=" width: 96px;">
                        <h4>Работа с регионами </h4>
                        <p style="text-align: justify">
                            Наша компания работаем во многих областях Республики Узбекистан и имеет хорошую репутацию
                            среди
                            заказчиков и клиентов.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>

    <div id="contact" class="container-fluid text-center">
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
            <div class="col-md-6" style="background-color: white; height: 300px;">
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
@endsection

@section('script')
    <script src="https://api-maps.yandex.ru/2.1/?lang=en_US" type="text/javascript"></script>
    <script>
        function myMap() {
            let myCenter = new google.maps.LatLng(41.353389, 69.256734);
            let mapCanvas = document.getElementById("map");
            let mapOptions = {center: myCenter, zoom: 15};
            let map = new google.maps.Map(mapCanvas, mapOptions);
            let marker = new google.maps.Marker({position: myCenter});
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
@endsection