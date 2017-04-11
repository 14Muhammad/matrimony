@extends('layouts.master')

<style type="text/css">
    h6{
        padding-left: -20px;
        color:red;
    }
</style>
@section('content')
<div class="container">
    <font size="7">Rejected Requests</font>
    <div class="row">

        
        {{--Notification about Request Accepted--}}
        <div class="container">
        <div class="col s12">
        @if($blocked->count())       
        @foreach($blocked as $blockedUser)
            <div class="card">
                <div class="card-content purple-text">
                    <span class="card-title">{{$blockedUser->name}}</span>
                </div>
                <br><br>
            </div>
        @endforeach
        @else
            <h6>No rejected requests.</h6>
        @endif
        </div>
        </div>


    </div>
    </div>
@stop