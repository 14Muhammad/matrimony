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
                    <div class="col l3 m3 s12"><img src="{{asset('/img/sher.jpg')}}" class="col s12" style="height:100px;"></div>
                    <div class="col l9 m9 s12"><p><a class="red-text" href="">{{$sent->name}} </a>sent you a request to view your details.</p></div>
                </div>
                <br><br>
                <div class="card-action" id="{{$sent->slug.'profile'}}">
                    <a class="white-text btn red reject" data-value="{{$sent->slug}}"><i class="fa fa-times"></i> Reject</a>
                    <a class="white-text btn red accept" style="float: right;" data-value="{{$sent->slug}}"><i class="fa fa-check accept"></i> Accept</a>
                </div>
                <div class="card-action" id="{{$sent->slug}}" style="display:none;">
                    <a class="white-text btn red" data-value="{{$sent->slug}}" href="{{url('/viewprofile/'.$sent->slug)}}"><i class="fa fa-user"></i> View Profile</a>
                </div>
            </div>
        @endforeach
        @else
            <h6>You have no new request.</h6>
        @endif
        </div>
        </div>

        {{--Notification about Request Accepted--}}
        <div class="container">
        <div class="col s12">
        @if($sentToUsersAccepted->count())
        <h5>Accepted Requests</h5>        
        @foreach($sentToUsersAccepted as $accepted)
            <div class="card">
                <div class="card-content purple-text">
                    <span class="card-title">Request Accepted</span>
                    <div class="col l9 m9 s12"><p><a class="red-text" href=""> {{$accepted->name}} </a>accepted your request. Now you can view his/her profile.</p></div>
                    {{--<div class="col l3 m3 s12"><img src="img/nfs.jpg" style="max-height: 200px;" class="col s12"></div>--}}
                </div>
                <br><br>
                <div class="card-action">
                    <a class="white-text btn red" href="{{url('/viewprofile/'.$accepted->slug)}}">View Profile -></a>
                </div>
            </div>
        @endforeach
        @else
            <h6>No accepted requests.</h6>
        @endif
        </div>
        </div>

        <div class="container">
        <div class="col s12 m4">
        @if($sentToUsersPending->count())
        <h5>Pending Requests</h5> 
        @foreach($sentToUsersPending as $pending)
            <div class="card">
                <div class="card-content purple-text">
                    <span class="card-title">Request Accepted</span>
                    <div class="col l9 m9 s12"><p><a class="red-text" href=""> {{$pending->name}} </a>accepted your request. Now you can view his/her profile.</p></div>
                    {{--<div class="col l3 m3 s12"><img src="img/nfs.jpg" style="max-height: 200px;" class="col s12"></div>--}}
                </div>
                <br><br>
                {{-- <div class="card-action">
                    <a class="white-text btn red" href="{{url('viewprofile')}}">View Profile -></a>
                </div> --}}
            </div>
        @endforeach
        @else
            <h6>No pending requests.</h6>
        @endif
        </div>
        </div>


    </div>
    </div>
@stop
