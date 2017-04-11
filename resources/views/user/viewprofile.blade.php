@extends('layouts.master')
<style type="text/css">
.img{
    border: 1px solid lightblue;
    margin-right: 20px;
    }
</style>
@section('content')
<div class="container">
    <br>
    <div class="row col l3 m4 s12" style="font-size: 20px; font-weight: bold;">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="" src="{{ asset('img/banner01.jpg') }}">
            </div>
        </div>
    </div>

    <div class="row" style="font-size: 18px; font-weight: bold;">
    @if($user->profile_pic!=null)
        <img class="materialboxed col s12 l3 m4 img" data-caption="{{ ucwords($user->name) }}" src="{{asset('/uploads/images/'.$user->profile_pic->first()->name.'.'.$user->profile_pic->first()->extension) }}">
    @else
    @if($user->gender=="male")
        <img class="materialboxed col s12 l3 m4 img" data-caption="{{ ucwords($user->name) }}" src="{{asset('/uploads/images/male.jpg') }}">
    @else
        <img class="materialboxed col s12 l3 m4 img" data-caption="{{ ucwords($user->name) }}" src="{{asset('/uploads/images/female.jpg') }}">
    @endif
    @endif
        <font size="5"><i class="fa fa-user"></i> {{ ucwords($user->name) }}</font>
        <br>
<!--         <a href=""><span style="float: right;"><i class="fa fa-heart"></i> Show Interest </span></a>
 -->        <i class="fa fa-envelope"></i> {{ $user->email }}
                <br>
        <i class="fa fa-mobile"></i> {{ $user->mobile }}
        <br>
        <i class="fa fa-building"></i> {{ $user->dob }}
        <br>
        <i class="fa fa-child"></i> {{ ucfirst($user->gender) }}
        <br>
        <i class="fa fa-globe"></i> {{ ucfirst($user->religion) }}
        <br>
        <i class="fa fa-globe"></i> {{ $user->caste }}
        <br>
        <i class="fa fa-heart-o"></i> {{ $user->country }}
    </div>
    </div>
@stop