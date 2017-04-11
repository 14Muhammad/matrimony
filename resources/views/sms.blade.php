@extends('layouts.master')

@section('content')
<form action="{{url('/sms')}}" method="post">
{{ csrf_field() }}
<input type="text" name="mobile">
<input type="submit" value="Submit">
</form>
@endsection