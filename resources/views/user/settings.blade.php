@extends('layouts.master')
<style>
    h6{
        color:#000;
    }
    .alert ul li{
        color: red;
    }
</style>

@section('content')
<div class="container">
    <div class="col l6 m6 offset-m3 offset-l3 s12" style="font-weight: bold;">
    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header red white-text"><font size="5"><i class="fa fa-user"></i>Account Details</font></div>

            <div class="collapsible-body row col s12">
                <div class="container">
                    <ul>
                        <li> <h6 class="left-align">Name : {{Auth::user()->name }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Email : {{Auth::user()->email }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Age : {{Auth::user()->age }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Date of Birth : {{Auth::user()->dob }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Gender : {{ ucfirst(Auth::user()->gender) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Contact Number : {{Auth::user()->mobile }}</h6>  </li>
                        <li class="divider"></li>
                    </ul>
                    <a href="#modal1" class="col s2 offset-s4 btn red waves-effect waves-light btn modal-trigger" style="margin-top: 12px; margin-bottom: 12px;">Edit <i class="fa fa-edit"></i> </a>
                    <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                    <form class="col s12" method="post" action="{{url('/update')}}">
                    {{ csrf_field() }}
                        <div class="modal-content">
                            <h4>Edit your Account Details</h4>
                            <div class="row">
                                    <div class="row">
                                    @if($errors->has('name')||$errors->has('email')||$errors->has('dob')||$errors->has('gender')||$errors->has('mobile'))    
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                        <div class="input-field col s12">
                                            <input type="text" disabled name="name" class="validate" value="{{Auth::user()->name }}">
                                            <label><i class="fa fa-user"></i> Name</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" name="email" class="validate" value="{{Auth::user()->email }}">
                                            <label><i class="fa fa-envelope"></i> Email</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="date" name="dob" class="validate" value="{{Auth::user()->dob }}">
                                            <label></label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select name="gender">
                                            @if(Auth::user()->gender=="male")
                                                <option selected value="male">Male</option>
                                                <option value="female">Female</option>
                                            @else
                                                <option selected value="female">Female</option>
                                                <option value="male">Male</option>
                                            @endif
                                            </select>
                                            <label><i class="fa fa-female"></i> Gender</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" name="mobile" class="validate" value="{{Auth::user()->mobile }}">
                                            <label><i class="fa fa-mobile"></i> Contact Number</label>
                                        </div>

                                    </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" value="Update Account Details" class="btn purple">
                        </div>
                    </form>

                    </div>

                </div>
            </div>
        </li>
        <br>

        <li>
            <div class="collapsible-header red white-text"><font size="5"><i class="fa fa-users"></i> Personal Details</font></div>
            <div class="collapsible-body row col s12">
                <div class="container">
                    <ul>
                        <li> <h6 class="left-align">Mother Tongue : {{ ucfirst(Auth::user()->mothertongue) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Religion : {{ucfirst(Auth::user()->religion) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Caste : {{ucfirst(Auth::user()->caste) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Sub Caste : @if(Auth::user()->subcaste!=null) {{ ucfirst(Auth::user()->subcaste) }}
                        @endif
                        </h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Manglik : {{ ucfirst(Auth::user()->manglik) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Marital Status : {{ ucfirst(Auth::user()->marital_status) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Height : {{ Auth::user()->feet }}' {{ Auth::user()->inches }}"</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Country : {{ ucfirst(Auth::user()->country) }}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">City : {{ ucfirst(Auth::user()->city) }}</h6>  </li>
                        <li class="divider"></li>
                    </ul>
                    <a href="#modal2" class="col s2 offset-s4 btn red waves-effect waves-light btn modal-trigger" style="margin-top: 12px; margin-bottom: 12px;">Edit <i class="fa fa-edit"></i> </a>
                    <!-- Modal Structure -->
                    <div id="modal2" class="modal modal-fixed-footer">
                        <form class="col s12" method="post" action="{{url('/update')}}">
                                {{ csrf_field() }}
                        <div class="modal-content">
                            <h4>Edit your Personal Details</h4>
                            <div class="row">
                                    <div class="row">
                                    @if($errors->has('mothertongue')||$errors->has('religion')||$errors->has('caste')||$errors->has('subcaste')||$errors->has('manglik')||$errors->has('marital_status')||$errors->has('country')||$errors->has('country')||$errors->has('city'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                        <div class="input-field col s12">
                                            <select name="mothertongue">
                                            @if(Auth::user()->mothertongue=="hindi")
                                                <option value="hindi" selected>Hindi</option>
                                                <option value="english">English</option>
                                                <option value="other">Other</option>
                                            @elseif(Auth::user()->mothertongue=="english")
                                                <option value="hindi">Hindi</option>
                                                <option value="english" selected>English</option>
                                                <option value="other">Other</option>
                                            @elseif(Auth::user()->mothertongue=="other")
                                                <option value="hindi" >Hindi</option>
                                                <option value="english">English</option>
                                                <option value="other" selected>Other</option>
                                            @endif
                                            </select>
                                            <label><i class="fa fa-female"></i> Mother Tongue</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select name="religion">
                                            @if(Auth::user()->religion=="hindu")
                                                <option selected value="hindu">Hindu</option>
                                                <option value="other">Other</option>
                                            @elseif(Auth::user()->religion=="other")
                                                <option value="hindu">Hindu</option>
                                                <option selected value="other">Other</option>
                                            @endif
                                            </select>
                                            <label><i class="fa fa-globe"></i> Religion</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" name="caste" class="validate" value="{{Auth::user()->caste}}">
                                            <label><i class="fa fa-globe"></i> Caste</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" name="subcaste" value="{{Auth::user()->subcaste}}">
                                            <label><i class="fa fa-globe"></i> Sub Caste</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select name="manglik">
                                            @if(Auth::user()->manglik=="manglik")
                                                <option selected value="manglik">Manglik</option>
                                                <option value="nonmanglik">Non-Manglik</option>
                                                <option value="angshikmanglik">Angshik Manglik</option>
                                            @elseif(Auth::user()->manglik=="nonmanglik")
                                                <option value="manglik">Manglik</option>
                                                <option selected value="nonmanglik">Non-Manglik</option>
                                                <option value="angshikmanglik">Angshik Manglik</option>
                                            @elseif(Auth::user()->manglik=="angshikmanglik")
                                                <option value="manglik">Manglik</option>
                                                <option value="nonmanglik">Non-Manglik</option>
                                                <option selected value="angshikmanglik">Angshik Manglik</option>
                                            @endif
                                            </select>
                                            <label><i class="fa fa-female"></i> Are you Manglik?</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select name="marital_status">
                                            @if(Auth::user()->marital_status=="unmarried")
                                                <option selected value="unmarried">Unmarried</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="awaitingdivorce">Awaiting Divorce</option>
                                            @elseif(Auth::user()->marital_status=="divorced")
                                                <option value="unmarried">Unmarried</option>
                                                <option selected value="divorced">Divorced</option>
                                                <option value="awaitingdivorce">Awaiting Divorce</option>
                                            @elseif(Auth::user()->marital_status=="awaitingdivorce")
                                                <option value="nevermarried">Unmarried</option>
                                                <option value="divorced">Divorced</option>
                                                <option selected value="awaitingdivorce">Awaiting Divorce</option>
                                            @endif    
                                            </select>
                                            <label><i class="fa fa-female"></i> Marital Status</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input type="number" min="4"  name="feet" class="validate" value="{{Auth::user()->feet}}">
                                            <label><i class="fa fa-child"></i> Height (Feet)</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input type="number" min="0" name="inches" value="{{Auth::user()->inches}}" class="validate">
                                            <label><i class="fa fa-child"></i> Height (Inches)</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" name="country" value="{{Auth::user()->country}}">
                                            <label><i class="fa fa-anchor"></i> Country</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" name="city" value="{{Auth::user()->city}}">
                                            <label><i class="fa fa-heart-o"></i> City</label>
                                        </div>

                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Update Personal Details" class="btn purple">
                        </div>
                         </form>

                    </div>
                </div>
            </div>
        </li>
        <br>

        <li>
            <div class="collapsible-header red white-text"><font size="5"><i class="fa fa-laptop"></i>Qualifications or Occupation</font></div>
            <div class="collapsible-body row col s12">
                <div class="container">
                    <ul>
                        <li> <h6 class="left-align">Degree : {{Auth::user()->degree}}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Occupation : {{Auth::user()->occupation}}</h6>  </li>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Income : {{Auth::user()->income}}</h6>  </li>
                        <li class="divider"></li>
                    </ul>
                    <a href="#modal3" class="col s2 offset-s4 btn red waves-effect waves-light btn modal-trigger" style="margin-top: 12px; margin-bottom: 12px;">Edit <i class="fa fa-edit"></i> </a>
                    <!-- Modal Structure -->
                    <div id="modal3" class="modal modal-fixed-footer">
                    <form class="col s12" method="post" action="{{url('/update')}}">
                                {{ csrf_field() }}
                        <div class="modal-content">
                            <h4>Edit your Account Details</h4>
                            <div class="row">
                                    <div class="row">
                                    @if($errors->has('degree')||$errors->has('occupation')||$errors->has('inclome'))
                                     <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                        <div class="input-field col s12">
                                            <select name="degree">
                                                <option value="" disabled selected>Choose</option>
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
                                                <option value="Other">Other</option>
                                            </select>
                                            <label><i class="fa fa-graduation-cap"></i> Highest Degree</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="text" class="validate" name="occupation" value="{{Auth::user()->occupation}}">
                                            <label><i class="fa fa-industry"></i> Occupation</label>
                                        </div>

                                        <div class="input-field col s12">
                                            <select name="{{Auth::user()->income}}">
                                                <option value="" disabled selected>Choose</option>
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
                                            <label><i class="fa fa-female"></i> Annual Income</label>
                                        </div>

                                    </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn purple" value="Update Qualifications and Occupations">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </li>

<br>
        <li>
            <div class="collapsible-header red white-text"><font size="5"><i class="fa fa-shield"></i>Privacy Settings</font></div>
            <div class="collapsible-body row col s12">
                <div class="container">
                    <ul>
                        {{--<li> <br><a class="red btn" href=""><font size="4" class="left-align">Change Password</font>  </a></li><br>--}}
                            <form>  {{-- change password --}}
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                <div class="collapsible-header purple white-text"><font size="3"><i class="fa fa-shield"></i> Change Password</font></div>
                                <div class="collapsible-body row col s12">
                                    <p>
                                    <div class="input-field col s12">
                                        <input type="password" class="validate">
                                        <label><i class="fa fa-bolt"></i> Current Pasword</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="password" class="validate">
                                        <label><i class="fa fa-bolt"></i> New Password</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="password" class="validate">
                                        <label><i class="fa fa-bolt"></i> Confirm Password</label>
                                    </div>
                                    <br>
                                    <a href="#!" class="btn red">Change Password</a>

                                    </p>
                                </div>
                                </li>
                            </ul>
                            </form>

                        <li class="divider"></li>
                        <li> <h5 class="center-align" style="font-weight: bold;">Apply Filters</h5> </li>

                        <form name="f1">

                        <li class="divider"></li>
                        <li> <h6 class="left-align">Name</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="name_{{Auth::user()->slug}}" {{ Auth::user()->filters->name ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Age</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="age_{{Auth::user()->slug}}" {{ Auth::user()->filters->age ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Contact Number</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="mobile_{{Auth::user()->slug}}" {{ Auth::user()->filters->mobile ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>


                        <li class="divider"></li>
                        <li> <h6 class="left-align">Degree</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="degree_{{Auth::user()->slug}}" {{ Auth::user()->filters->degree ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>


                        <li class="divider"></li>
                        <li> <h6 class="left-align">Occupation Type</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="occupationtype_{{Auth::user()->slug}}" {{ Auth::user()->filters->occupation_type ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>


                        <li class="divider"></li>
                        <li> <h6 class="left-align">Marital Status</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="marital_{{Auth::user()->slug}}" {{ Auth::user()->filters->marital_status ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>


                        <li class="divider"></li>
                        <li> <h6 class="left-align">Occupation</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="occupation_{{Auth::user()->slug}}" {{ Auth::user()->filters->occupation ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        <li class="divider"></li>
                        <li> <h6 class="left-align">Income</h6>
                            <div style="float: right;" class="switch">
                                <label>
                                    Filter Off
                                    <input type="checkbox" class="checkfilter" id="income_{{Auth::user()->slug}}" {{ Auth::user()->filters->income ? 'checked' : '' }}>
                                    <span class="lever"></span>
                                    Filter On
                                </label>
                            </div>
                        </li><br><br>
                        </form>
                        <li class="divider"></li>
                    </ul>
                </div>
            </div>
        </li>

    </ul>
    </div>
    </div>

    <script type="text/javascript">
    
        </script>


    <script>$(document).ready(function(){
        
            $('.collapsible').collapsible({
                accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style

            });
            $('.modal-trigger').leanModal();
                        $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });
            $(document).ready(function() {
                $('select').material_select();
            });
        });
    function f(){
        var val;
        if($("#isAgeSelected").is(':checked'))
            {

                alert("Checked");
    }
        else
            {alert("Not Checked");}
        
    }
    </script>

    @if($errors->has('mothertongue')||$errors->has('religion')||$errors->has('caste')||$errors->has('subcaste')||$errors->has('manglik')||$errors->has('marital_status')||$errors->has('country')||$errors->has('country')||$errors->has('city'))
                <script>$(document).ready(function()
                {
                        $('#modal2').openModal();
                        
                });
                </script> 
    @endif  

    @if($errors->has('name')||$errors->has('email')||$errors->has('dob')||$errors->has('gender')||$errors->has('mobile'))
                <script>$(document).ready(function()
                {
                        $('#modal1').openModal();

                });
                </script> 
    @endif  

 


@stop