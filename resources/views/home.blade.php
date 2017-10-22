@extends('layouts.app')

@section('style')
    <style>
        .navs {
            padding: 0 10px 0 10px;
        }

        .control-label{
            margin-top: 8px;
        }
    </style>
@endsection

@section('content')
    <nav class="navbar navbar-default" style="margin-top: 50px;">
        <ul class="nav navbar-nav">
            <li data-toggle="tab" class="navs">
                <a onclick="switchSection('section1')">PRODUCTS</a>
            </li>
            <li data-toggle="tab" class="navs">
                <a onclick="switchSection('section2')">TAGS</a>
            </li>
            <li data-toggle="tab" class="navs">
                <a onclick="switchSection('section3')">STATISTICS</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div id="section1" class="section" style="display: block;">
        </div>
        <div id="section2" class="section" style="display: block;">
            <h3 class="page-header">ADD TAG</h3>
            <form action="{{ route('tag.create.submit') }}" method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Полное имя:</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-success" value="Добавить">
                    </div>
                </div>
            </form>
            <h3 class="page-header">ALL TAGS</h3>
            @foreach($tags as $tag)
                <div class="row">
                    <div class="col-md-10">
                        <p>{{ $tag->name }}</p>
                    </div>
                    <div class="col-md-1">
                        <input type="submit" class="btn btn-success" value="Добавить">
                    </div>
                    <div class="col-md-1 col-s">
                        <input type="submit" class="btn btn-success" value="Добавить">
                    </div>
                </div>
            @endforeach
        </div>
        <div id="section3" class="section" style="display: block;">
        </div>
    </div>
@endsection

@section('script')
    <script>
        function switchSection(id) {
            document.cookie = "adminPage=" + id + ";";
            var section = document.getElementsByClassName('section');
            for (var i = 0; i < section.length; i++)
                section[i].style.display = "none";
            document.getElementById(id).style.display = "block";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "section1";
        }

        window.onload = function () {
            switchSection(getCookie("adminPage"));
            var navs = document.getElementsByClassName("navs");
            navs[getCookie("adminPage").replace("section", "") - 1].className = "navs active";
        }
    </script>
@endsection
