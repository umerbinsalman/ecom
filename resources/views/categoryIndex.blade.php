@extends('layout.app')
@section('title','Category')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    @if(isset($category))
                        <h4 class="m-b-0 text-white">Update Category</h4>
                    @else
                        <h4 class="m-b-0 text-white">Create New Category</h4>
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
                    @if(isset($category))
                        {{Form::model($category,['url'=>route('category.update',$category->id)])}}
                    @else
                        {{Form::open(['url'=>route('category.store')])}}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('category_name','Category Name')}}
                                {{Form::text('category_name',null,['class'=>'form-control','placeholder'=>'Enter Category Name'])}}
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('category_tag_id','Associate Tag')}}
                                    {{Form::select('category_tag_id',$tag,null,['class'=>'form-control','placeholder'=>'Select Tag'])}}
                                </div>
                            </div>
                        </div>

                    <div class="form-actions">
                        @if(isset($category))
                            {{Form::submit('Update',['class'=>'btn btn-success'])}}
                        @else
                            {{Form::submit('Save',['class'=>'btn btn-success'])}}
                        @endif
                        <a href="{{url()->previous()}}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
