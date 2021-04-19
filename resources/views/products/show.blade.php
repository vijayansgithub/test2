@extends('layouts.app')


@section('content')
    <div style="margin-top:50px" class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('post')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row" style="width:78%">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="float:left;width:50%">Title:</strong>
				<div>{{$post->title}}</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="float:left;width:50%">Description</strong>
				<div>{{$post->description}}</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="float:left;width:50%">Image</strong>
				<img style='width:200px;height:200px' src='{{asset($post->img)}}' title='Img' />
            </div>
        </div>
       
    </div>
@endsection