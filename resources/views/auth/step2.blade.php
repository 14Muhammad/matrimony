@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Complete Profie Step 2</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/complete_profile_2') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <select class="form-control" name="degree" id="degree" value="{{ old('degree') }}">
                                <option value="" disabled selected>Select Degree</option>                             
                                <option value="B.E/ B.Tech">B.E/ B.Tech</option>
                                    <option value="B.Arch">B.Arch</option>
                                    <option value="B.Pharma">B.Pharma</option>
                                    <option value="BCA">BCA</option>
                                    <option value="B.Com">B.Com</option>
                                    <option value="BBA">BBA</option>
                                    <option value="BHM">BHM</option>
                                    <option value="BAMS">BAMS</option>
                                    <option value="BHMS">BHMS</option>
                                    <option value="BDS">BDS</option>
                                    <option value="BL/LLB">BL/LLB</option>
                                    <option value="BA">BA</option>
                                    <option value="B.Sc">B.Sc</option>
                                    <option value="B.Ed">B.Ed</option>
                                    <option value="BCA">BCA</option>
                                    <option value="CA">CA</option>
                                    <option value="CS">CS</option>
                                    <option value="M.E./M.Tech">M.E./M.Tech</option>
                                    <option value="M.Pharma">M.Pharma</option>
                                    <option value="M.Arch">M.Arch </option>
                                    <option value="MBA/PGDM">MBA/PGDM</option>
                                    <option value="MBBS">MBBS</option>
                                    <option value="M.Com">M.Com</option>
                                    <option value="MDS">MDS</option>
                                    <option value="M.S.">M.S.</option>
                                    <option value="M.D.">M.D.</option>
                                    <option value="ML/LLM">ML/LLM</option>
                                    <option value="M.Phil">M.Phil</option>
                                    <option value="M.Tech">M.Tech</option>
                                    <option value="M.Pharma">M.Pharma</option>
                                    <option value="PHD">PHD</option>
                                    <option value="High School">High School</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="other">Other</option>                        
                                </select>
                                <label for="degree">Degree</label>
                                @if ($errors->has('degree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12" id="otherdegree">
                                <input type="text" class="form-control validate" name="otherdegree" value="{{ old('') }}">
                                <label for="otherdegree">Give your Highest Degree</label>
                                @if ($errors->has(''))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('occupation_type') ? ' has-error' : '' }}">

                            <div class="input-field col s6">
                            <select name="occupation_type">
                                <option value="" disabled selected>Occupation Type</option>
                                <option value="Government">Government</option>
                                <option value="Corporate">Corporate</option>
                                <option value="Self-Employed">Self-Employed</option>
                            </select>
                                <label for="occupation">Occupation Type</label>
                                @if ($errors->has('occupation_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occupation_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">

                            <div class="input-field col s6">
                                <input type="text" class="form-control validate" name="occupation" value="{{ old('occupation') }}">
                                <label for="occupation">Occupation</label>
                                @if ($errors->has('occupation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('income') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <select class="form-control" name="income" value="{{ old('income') }}">
                                <option value="No Income">No Income</option>
                                <option value="Less than &#8377;1,00,000">Less than &#8377;1,00,000</option>
                                    <option value="&#8377;1,00,000 - &#8377;2,00,000">&#8377;1,00,000 - &#8377;2,00,000</option>
                                    <option value="&#8377;2,00,000 - &#8377;3,00,000">&#8377;2,00,000 - &#8377;3,00,000</option>
                                    <option value="&#8377;3,00,000 - &#8377;4,00,000">&#8377;3,00,000 - &#8377;4,00,000</option>
                                    <option value="&#8377;4,00,000 - &#8377;5,00,000">&#8377;4,00,000 - &#8377;5,00,000</option>
                                    <option value="&#8377;5,00,000 - &#8377;6,00,000">&#8377;5,00,000 - &#8377;6,00,000</option>
                                    <option value="&#8377;6,00,000 - &#8377;7,00,000">&#8377;6,00,000 - &#8377;7,00,000</option>
                                    <option value="&#8377;7,00,000 - &#8377;8,00,000">&#8377;7,00,000 - &#8377;8,00,000</option>
                                    <option value="&#8377;8,00,000 - &#8377;9,00,000">&#8377;8,00,000 - &#8377;9,00,000</option>
                                    <option value="&#8377;9,00,000 - &#8377;10,00,000">&#8377;9,00,000 - &#8377;10,00,000</option>
                                    <option value="&#8377;10,00,000 - &#8377;15,00,000">&#8377;10,00,000 - &#8377;15,00,000</option>
                                    <option value="More than &#8377;15,00,000">More than &#8377;15,00,000</option>
                                </select>
                                <label for="income">Income</label>

                                @if ($errors->has('income'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('income') }}</strong>
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
               
                $('#otherdegree').css("display","none");
                $('#degree').change(function() {
                    var item = $(this).val();
                    if(item === "other"){
                        document.getElementById("otherdegree").style.display='block';
                    }
                    else{
                        document.getElementById("otherdegree").style.display='none';
                    }
                });
            });

    
</script>

@endsection