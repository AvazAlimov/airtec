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
            <br>
            <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ADD PRODUCT
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="product_name" class="col-md-2 control-label">Name:</label>
                            <div class="col-md-10">
                                <input id="product_name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="product_price" class="col-md-2 control-label">Price:</label>
                            <div class="col-md-10">
                                <input id="product_price" type="number" class="form-control" name="price"
                                       value="{{ old('price') }}" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
	                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="product_info" class="col-md-2 control-label">Information:</label>
                            <div class="col-md-10">
                                <textarea id="product_info" class="form-control" name="info"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="product_image" class="col-md-2 control-label">Images:</label>
                            <div class="col-md-10">
                                <input type="file" id="product_image" name="files[]" accept="image/*" multiple>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="product_tag" class="col-md-2 control-label">Tags:</label>
                            <div class="col-md-10">
                                <select class="form-control" multiple data-role="tagsinput" id="product_tag" name="tags[]">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </div>
            </form>

            <h3 class="page-header">ALL TAGS</h3>
            @foreach($products as $product)
                <div class="row">
                    <div class="col-md-10 col-xs-7">
                        <h4>{{ $product->name }}</h4>
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <form action="{{ route('product.show', $product->id) }}" method="get">
                            <button type="submit" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <form action="{{ route('product.delete', $product->id) }}" method="post"
                              onsubmit="return confirm('Delete?');">
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
        <div id="section2" class="section" style="display: none;">
            <br>
            <form action="{{ route('tag.create') }}" method="POST">
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
            <div class="chart-container" style="position: relative; height:30vh; width:60vw">
                <canvas id="topProducts"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/Chart.js')}}"></script>
    <script>
        var products_name = {!! $topprod !!}

        var ctx = document.getElementById("topProducts").getContext("2d");
        var topProducts = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: 'Top Products',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor:'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
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
