
<?php

function convdate($inp)
{
$inp=explode(" ",$inp)[0];
if($inp!="")
{
if(strrpos($inp,"-")>0) // `-` contain date
$inparr=explode("-",$inp);
else if(strrpos($inp,"/")>0) // `/` contain date	
$inparr=explode("/",$inp);

$res=$inparr[2]."-".$inparr[1]."-".$inparr[0];
}
else
$res="";

return $res;
}
?>
@extends('layouts.app')

@section('content')
    <div style="margin-top:50px" class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
				<h2>Acc Year Details </h2>
			            </div>
            <div class="pull-right">
				<a class="btn btn-success" href="{{url('acc_year/create')}}" title="Create a post"> <i class="fas fa-plus-circle"></i></a>
				            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
				<th>Department</th>
				<th>Year</th>
				
				            <th>Actions</th>
        </tr>
		
        @foreach ($datas as $data)
		
		@if(isset($data->id))
            <tr>
                <td>{{$sno++}}</td>
				<td>
				@if(isset($data->employee_name))
				{{$data->employee_name}}
				@endif
			    </td>
			    
				<td>
				@if(isset($data->marks))
				{{$data->marks}}
				@endif
				</td>
				
				                <td>
				<form action="{{url('/acc_year'.$data->id)}}" method="post">
				<a href="{{url('/acc_year'.$data->id)}}" title="show">
				<i class="fas fa-eye text-success  fa-lg"></i>
				</a>
				
				<a href="{{url('/acc_year'.$data->id.'/edit')}}">
				<i class="fas fa-edit  fa-lg"></i>
				</a>
				
					@csrf
					{!! Form::open([
					'method'=>'DELETE',
					'url' => ['/acc_year', ],
					'style' => 'display:inline'
					]) !!}
					
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete AircraftType',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                    {!! Form::close() !!}
                    <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
			@endif
        @endforeach
    </table>

   

@endsection
