@extends('layouts.app')

@section('style')
    <style>
        .navs {
            padding: 0 10px 0 10px;
        }

        .control-label {
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
        <div id="section1" class="section" style="display: none;">
        </div>

        <div id="section2" class="section" style="display: none;">
            <br>
            <form action="{{ route('tag.create.submit') }}" method="POST">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ADD TAG
                    </div>
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
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </div>
            </form>

            <div class="modal fade" id="updateModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('tag.update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-content">
                            <div class="modal-header">
                                UPDATE TAG
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

            <h3 class="page-header">ALL TAGS</h3>
            @foreach($tags as $tag)
                <div class="row">
                    <div class="col-md-10 col-xs-7">
                        <h4>{{ $tag->name }}</h4>
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#updateModal"
                                onclick="editTag('{!! $tag->id !!}', '{!! $tag->name !!}')">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <form action="{{ route('tag.delete', $tag->id) }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

        <div id="section3" class="section" style="display: none;">
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

        function editTag(id, name) {
            document.getElementById('updated_id').value = id;
            document.getElementById('updated_name').value = name;
        }

        window.onload = function () {
            switchSection(getCookie("adminPage"));
            var navs = document.getElementsByClassName("navs");
            navs[getCookie("adminPage").replace("section", "") - 1].className = "navs active";
        }
    </script>
@endsection
