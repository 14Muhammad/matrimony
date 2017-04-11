@extends('layouts.master')

<style type="text/css">
    strong{
        color: red;
    }

</style>
@section('content')
    <div class="row">
        <div class="col m8 offset-m2 blue-text">
                <div class="panel-heading black-text"><h5>Login</h5></div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col m6 s12">
                                <input id="email" type="email" class="form-control validate" name="email" value="{{ old('email') }}">
                                <label for="email"><i class="fa fa-envelope"></i> E-Mail Address</label>


                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field col s12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col m6 s12">
                                <input id="password" type="password" class="form-control validate" name="password">
                                <label for="password" ><i class="fa fa-lock"></i> Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col s12">
                                <div class="checkbox">
                                    <p><input type="checkbox" id="check" name="remember">
                                    <label for="check">Remember Me</label>
                                    </p>    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col s12">
                            <br>
                                <button type="submit" class="btn red">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                &nbsp;&nbsp;&nbsp;<a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col s12">
                            <br><a class="" href="{{ url('/register') }}">New User? Register Here!</a>
                            </div>
                        </div>
                    </form>
            </div>
    </div>
@endsection
