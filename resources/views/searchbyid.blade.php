@extends('layouts.master')
<style>
.img{
    border:1px solid lightblue;
    margin-bottom:20px;
}
.divs{
    font-size:16px;
}
</style>

@section('content')
<div class="container">
	<h3>Search By Id</h3>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/searchid') }}">
    {{ csrf_field() }}
<input type="text" name="id" class="col s8 offset-s2">
<button type="submit" class="btn red">
     <i class="fa fa-search"></i> Search
</button>
</form>
</div>
@if(isset($user))
@if($user!=null)
{{$user->name}}

<div class="container col s12">
    <br>
  <div class="col s12 m12 l12 hoverable container" style="border: 1px solid blue; margin-bottom:20px;" >
    <div class="col s4 m4">
            <br>
              @if($user->profile_pic!=null)
                <img class=" col s12 m8 l12 img" data-caption="{{$user->slug}}" src="{{asset('/uploads/images/'.$user->profile_pic->first()->name.'.'.$user->profile_pic->first()->extension) }}">

            @else
            @if($user->gender=="male")
                <img class=" col s12 m8 l12 img" data-caption="{{$user->slug}}" src="{{asset('/uploads/images/male.jpg') }}">
            @else
                <img class=" col s12 m8 l12 img" data-caption="{{$user->slug}}" src="{{asset('/uploads/images/female.jpg') }}">
            @endif
            @endif
    </div>
    
    <div class="col s8 center-align">
    @if(Auth::check())
    @if($user->filters!=null)
        <h5>@if($user->filters->name) {{ ucwords($user->name) }} @else *** @endif</h5>            <hr>
    @else
        <h5>{{ ucwords($user->name) }}</h5>
    @endif
    @else
        <h5>{{$user->rand_name}}</h5>            <hr>
    @endif
    </div>
    <div class="col s4 m4 divs left-align">
        @if($user->filters!=null)
        Age : @if($user->filters->age) {{$user->age}} @else *** @endif<br>
        City : {{ ucwords($user->city) }} <br>
        State : {{ ucwords($user->state) }} <br>
        Country : {{ ucwords($user->country) }} <br>
        @else
        Age : {{$user->age}}<br>
        City : {{ ucwords($user->city) }} <br>
        State : {{ ucwords($user->state) }} <br>
        Country : {{ ucwords($user->country) }} <br>
        @endif
    </div>
    <div class="col s4 m4 divs right-align">
        @if($user->filters!=null)
        Degree : @if($user->filters->degree) {{$user->degree}} @else *** @endif<br>
        Occupation : @if($user->filters->degree) {{$user->occupation}} @else *** @endif<br>
        Income : @if($user->filters->income) {{$user->income}} @else *** @endif<br>
        Marital Status : @if($user->filters->marital_status) {{ ucwords($user->marital_status) }} @else *** @endif<br>
        @else
        Degree : {{$user->degree}}<br>
        Occupation : {{$user->occupation}}<br>
        Income : {{$user->income}} <br>
        Marital Status : {{ ucwords($user->marital_status) }}<br>
        @endif

    </div>
    <div class="col m8 s12 center-align">
        <hr>
        @if($user->aboutself!=null)
        {{$user->aboutself}}
        @else
            No Description.
        @endif
    </div>
    <div class="col m8 s12 center-align">
        <hr>
        @if(Auth::check())
        @if(\App\Friends::AreFriends(Auth::user()->id,$user->id)->first()==null)
        <a class="btn-flat sendrequest" id="{{$user->slug}}" data-value="{{$user->slug}}"><i class="fa fa-sign-out"></i> Send Request</a>
        @else
        <a class="btn-flat" id="{{$user->slug}}" data-value="{{$user->slug}}" href="{{url('/viewprofile/'.$user->slug)}}">View Profile</a>    
        @endif
        @else
        <a class="btn-flat" id="{{$user->slug}}" data-value="{{$user->slug}}" href="{{url('/login')}}"><i class="fa fa-sign-out"></i> Send Request</a>
        @endif
    </div>

  </div>
  <br><br>

</div>
@else
no results found
@endif
@endif
@stop