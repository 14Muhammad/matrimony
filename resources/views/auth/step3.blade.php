@extends('layouts.master')

@section('content')
<style type="text/css">
    textarea{
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid 1px #888;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col m8 offset-m2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Complete Profie Step 3</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/complete_profile_3') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('familytype') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <select name="familytype" value="{{ old('familytype') }}">
                                {{-- <option value="" disabled selected>Family Type</option> --}}
                                <option value="nuclear" selected>Nuclear</option>                        
                                <option value="joint">Joint</option>
                                </select>
                                <label for="familytype">Family Type</label>
                                @if ($errors->has('familytype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('familytype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('occfather') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="occfather" value="{{ old('occfather') }}">
                                <label for="city">Father's Occupation</label> 

                                @if ($errors->has('occfather'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occfather') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('occmother') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="occmother" value="{{ old('occmother') }}">
                                <label for="city">Mothers's Occupation</label> 

                                @if ($errors->has('occmother'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occmother') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sisters') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="number" min="0" max="20" class="form-control validate" name="sisters" value="{{ old('sisters') }}">
                                <label for="city">Sisters</label> 

                                @if ($errors->has('occmother'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occmother') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('brothers') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="number" min="0" max="20" class="form-control validate" name="brothers" value="{{ old('brothers') }}">
                                <label for="city">Brothers</label> 

                                @if ($errors->has('brothers'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brothers') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input id="input_text" type="text" name="address" value="{{ old('address') }}" class="validate" length="255">
                                <label for="input_text">Address</label>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aboutfamily') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input id="input_text" type="text" name="aboutfamily" value="{{ old('aboutfamily') }}" class="validate" length="500">
                                <label for="input_text">About Family</label>

                                @if ($errors->has('aboutfamily'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutfamily') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('aboutself') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input id="input_text" type="text" name="aboutself" value="{{ old('aboutself') }}" class="validate" length="500">
                                <label for="input_text">About You</label>

                                @if ($errors->has('aboutself'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutself') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn red">
                                    <i class="fa fa-btn fa-user"></i> Next
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
                $('select').material_select();
            });
</script>
@endsection