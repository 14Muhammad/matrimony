@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m8 offset-m2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Complete Profie Step 1</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/complete_profile_1') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mothertongue') ? ' has-error' : '' }}">

                            <div class="input-field col s12" >
                                <select name="mothertongue" id="mothertongue" value="{{ old('mothertongue') }}" onchange="opentongue()">
                                    <option value="" disabled selected>Select Mothertongue</option>
                                    <option value="english">English</option>
                                    <option value="hindi">Hindi</option>
                                    <option value="other">Other</option>
                                </select>
                                @if ($errors->has('mothertongue'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mothertongue') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col s12 input-field" id="othertongue">
                                <input type="text" class="form-control validate" name="othertongue" value="{{ old('othertongue') }}">
                                <label for="othertongue">Your Mother Tongue</label>
                                
                                <label for="othertongue"></label>
                                @if ($errors->has('othertongue'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('othertongue') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <select class="form-control" name="religion" id="religion" value="{{ old('religion') }}">
                                    <option value="" disabled selected>Select Religion</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="religion"></label>  
                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col s12 input-field" id="otherreligion">
                                <input type="text" class="form-control validate" name="otherreligion" value="{{ old('otherreligion') }}">
                                <label for="religion">Your Religion</label>
                                
                                <label for="otherreligion"></label>
                                @if ($errors->has('otherreligion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('otherreligion') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        {{-- </div> --}}

                        <div class="form-group{{ $errors->has('caste') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                            <input type="text" class="form-control validate" name="caste" value="{{ old('caste') }}">
                            <label for="caste">Caste</label>
                                @if ($errors->has('caste'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('caste') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('subcaste') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="subcaste" value="{{ old('subcaste') }}">
                                <label for="subcaste">Gotra</label>

                                @if ($errors->has('subcaste'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcaste') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('manglik') ? ' has-error' : '' }}">
                             <label for="manglik" class="col-md-4 control-label"></label> 

                            <div class="input-field col s12">
                                <p>
                                <input type="radio" name="manglik" value="manglik" id="manglik">
  								<label for="manglik">Manglik</label>
                                <input type="radio" name="manglik" value="nonmanglik" id="nonmanglik">
                                <label for="nonmanglik">Non-Manglik</label>
                                <input type="radio" name="manglik" value="angshikmanglik" id="angshikmanglik">
                                <label for="angshikmanglik">Angshik-Manglik</label>
                                </p>
                                @if ($errors->has('manglik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manglik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <select class="form-control" name="marital_status">
                                <option value="" disabled selected>Marital Status</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="awaitingdivorce">Awaiting Divorce</option>
                                    <option value="unmarried">Unmarried</option>
                                </select>
                                <label for="marital_status"></label>

                                @if ($errors->has('marital_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="input-field col s12 form-group{{ $errors->has('feet') ? ' has-error' : '' }}">

                            <div class="input-field col s6">
                                <input type="number" class="form-control validate col s12" min="4" max="12" name="feet" value="{{ old('feet') }}">
                                <label for="feet">Height (feet)</label> 
                            </div>
                            <div class="input-field col s6">        
                                <input type="number" name="inches" min="0" max="11"  class="form-control validate col s12" value="{{ old('inches') }}">
                                <label for="inches">Height (inches)</label> 
                            </div>

                                @if ($errors->has('feet'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feet') }}</strong>
                                    </span>
                                @endif
                        </div>

						<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="country" value="{{ old('height') }}">
                                <label for="country">Country</label> 

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="city" value="{{ old('city') }}">
                                <label for="city">City</label> 

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <input type="text" class="form-control validate" name="state" value="{{ old('state') }}">
                                <label for="city">State</label> 

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
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
                
                $('#othertongue').css("display","none");
                $('#mothertongue').change(function() {
                    //alert("message");
                    var item = $(this).val();
                    if(item === "other"){
                        document.getElementById("othertongue").style.display='block';
                    }
                    else{
                        document.getElementById("othertongue").style.display='none';
                    }
                });

                $('#otherreligion').css("display","none");
                $('#religion').change(function() {
                    var item = $(this).val();
                    if(item === "other"){
                        document.getElementById("otherreligion").style.display='block';
                    }
                    else{
                        document.getElementById("otherreligion").style.display='none';
                    }
                });
            });

    
</script>
@endsection