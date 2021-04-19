
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
@include('header')

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
            <tr>
                <td>{{$sno++}}</td>
				<td>{{$data->department}}</td>
				<td>{{$data->year}}</td>
				
				                <td>
				<form action="{{url('/acc_year/'.$data->id)}}" method="post">
				<a href="{{url('/acc_year/'.$data->id)}}" title="show">
				<i class="fas fa-eye text-success  fa-lg"></i>
				</a>
				
				<a href="{{url('/acc_year/'.$data->id.'/edit')}}">
				<i class="fas fa-edit  fa-lg"></i>
				</a>
				
					@csrf
					{!! Form::open([
					'method'=>'DELETE',
					'url' => ['/acc_year', ],
					'style' => 'display:inline'
					]) !!}
					         
					
                    <a href="#"><i onclick="return confirm('Confirm delete?')?$(this).closest('form').submit():false" class="fas fa-trash fa-lg text-danger"></i></a>
					 {!! Form::close() !!}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $datas->links() !!}

@endsection
