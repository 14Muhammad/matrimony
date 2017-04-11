@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m8 offset-m2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Mobile Verification</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/verify') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="otp" value="{{ old('mobile') }}">
                                <label for="subcaste">Otp</label>

                                @if ($errors->has('otp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('otp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn red">
                                    <i class="fa fa-btn fa-user"></i> Verify
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection