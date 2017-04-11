@extends('layouts.master')
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
 <script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '-',
    dateSigns: '-',
    patterns: {
        d: "yy-mm-dd"
    }
}
};
</script> 
@section('content')
    <div class="row">
        <div class="col m8 offset-m2">
            <h3>Basic Details</h3>
            <div class="card-panel" style="height:100%;">
                <!-- <div class="card-content"> -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="input-field col s12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col s12">
                                <input id="name" type="text" class="form-control validate" name="name" value="{{ old('name') }}">
                                <label for="name"><i class="fa fa-user"></i> Name</label>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field col s12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col s12">
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
                            <div class="col s12">
                                <input id="password" type="password" class="form-control validate" name="password">
                                <label for="password"><i class="fa fa-lock"></i> Password</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field col s12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <div class="col s12">
                                <input id="password-confirm" type="password" class="form-control validate" name="password_confirmation">
                                <label for="password-confirm" ><i class="fa fa-lock"></i> Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="input-field col s12 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                            <div class="col s12">
                            <select class="form-control" name="gender">
                                <option value="" disabled selected>Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                            <label for="gender"></label>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="input-field col s12 form-group{{ $errors->has('dob') ? ' has-error' : '' }}">

                            <div class="col s12">
                                <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" max="{{ Carbon\Carbon::now()->subYears(18)->format('Y-m-d')}}">
                                <label for="dob" class="control-label">{{-- <i class="fa fa-building"></i> Date of Birth --}}</label>
                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field col s12 form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">

                            <div class="col s12">
                                <input type="text" class="form-control validate" name="mobile" value="{{ old('mobile') }}">
                                <label for="dob" ><i class="fa fa-mobile"></i> Contact No.</label>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field col s12 input-field s12 form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn red">
                                    <i class="fa fa-check"></i> Generate OTP
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                                                <br><br>
            <!-- </div> -->
        </div>
    </div>
{{-- <script type="text/javascript">
    $(document).ready(function() {
                $('select').material_select();
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                        selectYears: 15, format:'yyyy-mm-dd', // Creates a dropdown of 15 years to control year
                });

            });
</script> --}}
@endsection
