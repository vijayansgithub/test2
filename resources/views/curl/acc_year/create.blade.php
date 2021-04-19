@extends('layouts.app')

@section('content')
    <div style="margin-top:50px" class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
				<h2>Add New Acc Year</h2>
				            </div>
            <div class="pull-right">
				<a class="btn btn-primary" href="{{url('/acc_year')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
				                
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
   @endif
   
   {!!  Form::open(["url"=>"/acc_year","class"=>"form-horizontal"])  !!}
   @include ('form', ['formMode' => 'create'])
   {!! Form::close()  !!}
@endsection