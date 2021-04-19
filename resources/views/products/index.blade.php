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
                <h2>Post Details </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('post/create')}}" title="Create a post"> <i class="fas fa-plus-circle"></i>
                    </a>
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
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            
            <th>Actions</th>
        </tr>
		
        @foreach ($posts as $post)
            <tr>
                <td>{{$sno++}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td><img style='width:50px;height:50px' src='{{asset($post->img)}}' title='Img' /></td>
                
                <td>
                    <form action="{{url('post/'.$post->id)}}" method="post">

                        <a href="{{url('post/'.$post->id)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{url('post/'.$post->id.'/edit')}}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $posts->links() !!}

@endsection