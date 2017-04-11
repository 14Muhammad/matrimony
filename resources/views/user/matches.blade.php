@extends('layouts.master')

<style type="text/css">
    h6{
        padding-left: -20px;
        color:red;
    }
</style>
@section('content')
<div class="container">
    <font size="7">Matches Verified by Visit</font>
    <div class="row">

        
        {{--Notification about Request Accepted--}}
        <div class="container">
        <div class="col s12">
        @if($friends->count())       
        @foreach($friends as $friend)
            <div class="card">
                <div class="card-content purple-text">
                    <span class="card-title">{{$friend->name}}</span>
                    <div class="col l9 m9 s12"><p></p></div>
                    @if(Auth::user()->profile_pic!=null)
                    <div class="col l3 m3 s12"><img src="{{asset('/uploads/images/'.Auth::user()->profile_pic->first()->name.'.'.Auth::user()->profile_pic->first()->extension) }}" style="max-height: 200px;" class="col s12"></div>
                    @else
                    @if(Auth::user()->gender=="male")
                    <div class="col l3 m3 s12"><img src="{{asset('/uploads/images/male.jpg') }}" style="max-height: 200px;" class="col s12"></div>
                    @else
                    <div class="col l3 m3 s12"><img src="{{asset('/uploads/images/female.jpg') }}" style="max-height: 200px;" class="col s12"></div>
                    @endif
                    @endif
                </div>
                <br><br>
                <div class="card-action">
                    <a class="white-text btn red" href="{{url('/viewprofile/'.$friend->slug)}}">View Profile -></a>
                </div>
            </div>
        @endforeach
        @else
            <h6>No verified matches currently.</h6>
        @endif
        </div>
        </div>


    </div>
    </div>
@stop