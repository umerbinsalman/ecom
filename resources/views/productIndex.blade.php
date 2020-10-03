@extends('layout.app')
@section('title','Product')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    @if(isset($product))
                        <h4 class="m-b-0 text-white">Update Product</h4>
                    @else
                        <h4 class="m-b-0 text-white">Create New Product</h4>
                    @endif
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(isset($product))
                        {{Form::model($product,['url'=>route('product.update',$product->id)])}}
                    @else
                        {{Form::open(['url'=>route('product.store')])}}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('product_name','Product Name')}}
                                {{Form::text('product_name',null,['class'=>'form-control','placeholder'=>'Enter Product Name'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('product_quantity','Product Quantity')}}
                                {{Form::number('product_quantity',null,['class'=>'form-control','placeholder'=>'Enter Product Quantity'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('product_price','Product Price')}}
                                {{Form::number('product_price',null,['class'=>'form-control','placeholder'=>'Enter Product Price'])}}
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('product_description','Product Description')}}
                                    {{Form::textarea('product_description',null,['class'=>'form-control','placeholder'=>'Enter Product Description','rows'=>3])}}
                                </div>
                            </div>
                        </div>
                    <div class="form-actions">
                        @if(isset($product))
                            {{Form::submit('Update',['class'=>'btn btn-success'])}}
                        @else
                            {{Form::submit('Save',['class'=>'btn btn-success'])}}
                        @endif
                        <a href="{{url()->previous()}}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Select Tags</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($tags as $tag)
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::checkbox('tags[]',$tag->id)}}
                                    {{Form::label('tags[]',$tag->tag_name)}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Select Categories</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::checkbox('categories[]',$category->id)}}
                                    {{Form::label('categories[]',$category->category_name)}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="row">--}}
{{--        --}}
{{--    </div>--}}
    {{Form::close()}}
@endsection
