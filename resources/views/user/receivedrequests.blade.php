@extends('layouts.master')

<style type="text/css">
    h6{
        padding-left: -20px;
        color:red;
    }
</style>
@section('content')
<div class="container">
    <font size="7">Notifications</font>
    <div class="row">

        {{--Notification about coming request--}}
        <div class="container">
        <div class="col s12">
        @if($sentByUsers->count())
        <h5>New Requests</h5>
        @foreach($sentByUsers as $sent)
            <div class="card" id="{{$sent->slug.'id'}}">
                <div class="card-content purple-text">
                    <span class="card-title"></span>
                    <div class="col l3 m3 s12"><img src="img/sher.jpg" class="col s12"></div>
                    <div class="col l9 m9 s12"><p><a class="red-text" href="">{{$sent->name}} </a>sent you a request to view your details.</p></div>
                </div>
                <br><br>
                <div class="card-action" id="{{$sent->slug.'profile'}}">
                    <a class="white-text btn red reject" data-value="{{$sent->slug}}"><i class="fa fa-times"></i> Reject</a>
                    <a class="white-text btn red accept" style="float: right;" data-value="{{$sent->slug}}"><i class="fa fa-check accept"></i> Accept</a>
                </div>
                <div class="card-action" id="{{$sent->slug}}" style="display:none;">
                    <a class="white-text btn red reject" data-value="{{$sent->slug}}" href="{{url('/viewprofile/'.$sent->slug)}}"><i class="fa fa-user"></i> View Profile</a>
                </div>
            </div>
        @endforeach
        @else
            <h6>You have no new request.</h6>
        @endif
        </div>
        </div>
    </div>
    </div>
@stop