@extends('layouts.master')

@section('content')
    <div class="slider row col l12 m12 s12">
        <ul class="slides">
            <li>
                <img src="{{asset('/img/mat_default.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <!-- <h3>This is our big Tagline!</h3> -->
                    <h5 class="light white-text text-lighten-3"> ॐ भूर्भुवः स्वः तत्सवितुर्वरेण्यम्
               भर्गो देवस्य धीमहि धियो यो नः प्रचोदयात् ॥ ॥ <br><br>OM. I adore the Divine Self who illuminates the three worlds --
            physical, astral and causal; I offer my prayers to that God who
            shines like the Sun. May He enlighten our intellect.</h5>
                </div>
            </li>
             <li>
                <img src="{{asset('/img/lordganesha01.jpg')}}"> <!-- random image -->
                <div class="caption center-align">
                    <!-- <h3>This is our big Tagline!</h3> -->
                    <h5 class="light white-text text-lighten-3"> ॐ भूर्भुवः स्वः तत्सवितुर्वरेण्यम्
               भर्गो देवस्य धीमहि धियो यो नः प्रचोदयात् ॥ ॥ <br><br>OM. I adore the Divine Self who illuminates the three worlds --
            physical, astral and causal; I offer my prayers to that God who
            shines like the Sun. May He enlighten our intellect.</h5>
                </div>
            </li>
            <li>
                <img src="{{asset('/img/radhakrishna01.jpg')}}"> <!-- random image -->
                <div class="caption left-align">
                    <!-- <h3>Left Aligned Caption</h3> -->
                    <h5 class="light grey-text text-lighten-3">ॐ गणानां त्वा गणपतिं हवामहे
			   कविं कवीनामुपमश्रवस्तमम् ।
			   ज्येष्ठराजं ब्रह्मणां ब्रह्मणस्पत
			   आ नः श्रृण्वन्नूतिभिः सीदसादनम् ॥ ॥ <br><br> We call on Thee, Lord of the hosts, the poet of poets, the most famous of
			all; the Supreme king of spiritual knowledge, 0 Lord of spiritual wisdom.
			Listen to us with thy graces and reside in the place (of
			sacrifice)..
		    </h5>
                </div>
            </li>
            <li>
                <img src="{{asset('/img/radhakrishna02.jpg')}}"> <!-- random image -->
                <div class="caption right-align">
                    <!-- <h3>Right Aligned Caption</h3> -->
                    <h5 class="light grey-text text-lighten-3">वक्रतुंड महाकाय कोटिसूर्यसमप्रभ ।
			   निर्विघ्नं कुरु मे देव सर्वकार्येषु सर्वदा ॥ ॥ <br><br> O Lord Ganesha, of huge body with elephant head, shining like
			billions of suns, O God,  remove all obstacles from my endeavors,
			forever.</h5>
                </div>
            </li>
        </ul>
    </div>
<!-- End outer wrapper -->

<script class="secret-source">

   
    $(document).ready(function(){
        $('select').material_select();
        $('.slider').slider({full_width: true});
        $('.slider').slider('pause');
        $('.slider').slider('start');
        $('.slider').slider('next');
        $('.slider').slider('prev');
    });
</script>
<div class="row">
        <div class="col m8 offset-m2">
            <div class="panel panel-default">
		<ul class="collapsible" data-collapsible="accordian">
		<li>	                
			<div class="collapsible-header blue center-align white-text lighten-2 hoverable"><font size="5">Search your Soulmate 					Here... <i class="fa fa-search" style="float:right;"></i></font></div>
			<div class="collapsible-body blue-text">
            		<form class="form-horizontal" role="form" method="POST" action="{{ url('/search') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('lookingfor') ? ' has-error' : '' }}">
                            <div class="col s12 ">
                                <p>
                                <input id="bride" type="radio" class="form-control" name="lookingfor" value="female">
                                <label for="bride">Bride</label>
                                <input id="groom" type="radio" class="form-control" name="lookingfor" value="male">
                                <label for="groom">Groom</label>
                                </p>
                                @if ($errors->has('lookingfor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lookingfor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                            <div class="input-field col s12 ">

                            <select name="religion">
                                <option value="" disabled selected>Choose Religion</option>
                                <option value="hindu">Hindu</option>
                                <option value="any">Doesn't Matter</option>
                                <option value="other">Other</option>
                            </select>
                            <label for="religion"></label>
                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('caste') ? ' has-error' : '' }}">
                            <div class="input-field col s12">

                                <input type="text" class="validate" name="caste">
                                <label for="caste" class="control-label">Caste</label>
                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                            <select name="height">
                                <option value="any" selected>Doesn't Matter</option>
                                <option value="4">4 to 4.5ft</option>
                                <option value="40">4.5 to 5ft</option>
                                <option value="5">5 to 5.5ft</option>
                                <option value="50">5.5 to 6ft</option>
                                <option value="6">6 to 6.5ft</option>
                                <option value="60">6.5 to 7ft</option>
                                <option value="7">7 to 7.5ft</option>
                            </select>
                            <label for="height">Height</label>
                                @if ($errors->has('height'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <div class="input-field col s12">

                                <input type="text" class="validate" name="city">
                                <label for="city" class="control-label">City</label>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <div class="input-field col s12">

                                <input type="text" class="validate" name="state">
                                <label for="state" class="control-label">State</label>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <div class="input-field col s12">

                                <input type="text" class="validate" name="country">
                                <label for="city" class="control-label">Country</label>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    @if(Auth::guest())
                    <div class="input-field col s12 form-group{{ $errors->has('min_age') ? ' has-error' : '' }}">
                        <div class="input-field col s6">
                                <input type="number" class="form-control validate col s12" min="18" name="min_age" value="{{ old('min_age') }}">
                                <label for="min_age">Minimum Age</label> 
                        </div>
                        <div class="input-field col s6">        
                                <input type="number" name="inches" class="form-control validate col s12" value="{{ old('max_age') }}" min="18" max="70">
                                <label for="inches">Maximum Age</label> 
                        </div>
                    </div>
                    @endif
                    @if(Auth::check())
                    <div class="input-field col s12 form-group{{ $errors->has('min_age') ? ' has-error' : '' }}">
                        <div class="input-field col s6">
                                <input type="number" class="form-control validate col s12" min="18" name="min_age" value="{{Auth::user()->age-1}}">
                                <label for="min_age">Minimum Age</label> 
                        </div>
                        <div class="input-field col s6">        
                                <input type="number" name="max_age" class="form-control validate col s12" value="{{Auth::user()->age+1}}">
                                <label for="max_age">Maximum Age</label> 
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('income') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <select class="form-control" name="income" value="{{ old('income') }}">
                                <option value="No Income">Doesn't Matter</option>
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

                        <div class="form-group{{ $errors->has('occupation_type') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
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
                    @endif
                    <div class="form-group">
                            <div class="col m6 offset-m4">
                                <button type="submit" class="btn red">
                                    <i class="fa fa-search"></i> Search
                                </button>
<br><br>
                            </div>
                     </div>       
            </form>
</div>
</li>
</ul>
        </div>
</div>
</div>




<!-- <div class="parallax-container">
   <div class="parallax"><img src="{{asset('/img/lordkrishna01.jpg')}}"></div>
</div> -->
  <div class="section white">
    <div class="row container">
      <h4 class="header center-align">KFA Matrimonial.com... The Matrimony Website for Krishna Foundations...</h4>
      <p class="grey-text text-darken-3 lighten-3 center-align">To bind all the followers and believers of “Karma” from across the globe into an oasis of self-sacrifice with the aim of the upliftment of the society from a perceived agrarian existence to a dynamic and fast growing social wealth creators.
.</p>
    </div>
  </div>
<!--   <div class="parallax-container">
    <div class="parallax"><img src="{{asset('/img/lordkrishna02.jpg')}}"></div>
  </div> -->
<script>
$(document).ready(function(){
      $('.parallax').parallax();
    });
</script>
    @stop
