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

    <div class="row" style="width:78%">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
			<strong style="float:left;width:50%">Department:</strong>
			<div>{{$datas->department}}</div>
			</div>
		</div>
				

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
			<strong style="float:left;width:50%">Year:</strong>
			<div>{{$datas->year}}</div>
			</div>
		</div>
				
    </div>
@endsection