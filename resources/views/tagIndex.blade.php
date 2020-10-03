@extends('layout.app')
@section('title','Tag')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    @if(isset($tag))
                        <h4 class="m-b-0 text-white">Update Tag</h4>
                    @else
                        <h4 class="m-b-0 text-white">Create New Tag</h4>
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
                    @if(isset($tag))
                        {{Form::model($tag,['url'=>route('tag.update',$tag->id)])}}
                    @else
                        {{Form::open(['url'=>route('tag.store')])}}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('tag_name','Tag Name')}}
                                {{Form::text('tag_name',null,['class'=>'form-control','placeholder'=>'Enter Tag Name'])}}
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        @if(isset($tag))
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
