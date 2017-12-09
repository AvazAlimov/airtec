@extends('layouts.app')

@section('style')
    <style>
        .control-label {
            margin-top: 8px;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="margin-top: 70px;">
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                                   value="{{ $product->name }}" required autofocus>
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
                                   value="{{ $product->price }}" required autofocus>
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
                            <textarea id="product_info" class="form-control" name="info">{{ $product->info }}</textarea>
                        </div>
                    </div>
                    <div>
                        @if($product->images != null)
                            @foreach($product->images as $file)
                                <img style="width: 256px;" src="{{ asset($file->path.$file->file) }}">
                            @endforeach
                        @endif
                        <div>

                            <div class="col-md-12 form-group">
                                <label for="product_image" class="col-md-2 control-label">New images:</label>
                                <div class="col-md-10">
                                    <input type="file" id="product_image" name="files[]" accept="image/*" multiple>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="product_tag" class="col-md-2 control-label">Tags:</label>
                                <div class="col-md-10">
                                    <select class="form-control" multiple data-role="tagsinput" id="product_tag"
                                            name="tags[]">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                    {{ $points->contains($tag) ? "selected" : " " }}
                                                    @foreach($points as $point)
                                                    @if($point->tag_id == $tag->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                            >{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="hidden" class="form-control" name="oldImages">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection