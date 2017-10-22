@extends('layouts.app')

@section('style')
    <style>
        .navs{
            padding: 0 10px 0 10px;
        }
    </style>
@endsection

@section('content')
    <nav class="navbar navbar-default" style="margin-top: 50px;">
        <ul class="nav navbar-nav">
            <li data-toggle="tab" class="navs">
                <a href="">PRODUCTS</a>
            </li>
            <li data-toggle="tab" class="navs">
                <a href="">TAGS</a>
            </li>
            <li data-toggle="tab" class="navs">
                <a href="">STATISTICS</a>
            </li>
        </ul>
    </nav>
@endsection

@section('script')
    <script>

    </script>
@endsection
