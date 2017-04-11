<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>KFA Matrimonial.com</title>

	<script src="{{asset('/js/jquery.min.js')}}"></script>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('/materialize/css/materialize.min.css')}}"  media="screen,projection"/>
    <script type="text/javascript" src="{{asset('/materialize/js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/sendrequest.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/acceptrequest.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/filter.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Overlock"> 
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC"> 
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="{{asset('css/fontawesome/font-awesome.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
    strong{
        color: red;
    }
    .li .a{
        width:220px;
        text-align: center;
    }
    nav div ul li a{
        font-size: 21px;
        font-weight: bold;
    }
    nav{
        font-family: "Alegreya Sans SC";
    }

    .name-font{
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Profile Picture, Profile Page*/
    .dp-holder{
/*        height:250px;
*/    }
    .profile-dp{
        max-width: 100%;
        max-height: 100%;
    }
</style>

</head>
<body style="font-family: 'Raleway'; margin: 0;">

<div class="col s12" style="width: 100%">
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{url('/home')}}"><i class="fa fa-fw fa-user"></i> <font size="3"> My Profile</font></a></li>
        <li><a href="{{url('/settings')}}"><i class="fa fa-fw fa-cog"></i> <font size="3"> Settings</font></a></li>
        <li class="divider"></li>
        <li><a href="{{url('/logout')}}"><i class="fa fa-fw fa-sign-out"></i> <font size="3"> Logout</font></a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="{{url('/home')}}"><i class="fa fa-fw fa-user"></i> <font size="3"> My Profile</font></a></li>
        <li><a href="{{url('/settings')}}"><i class="fa fa-fw fa-cog"></i> <font size="3"> Settings</font></a></li>
        <li class="divider"></li>
        <li><a href="{{url('/logout')}}"><i class="fa fa-fw fa-sign-out"></i> <font size="3"> Logout</font></a></li>
    </ul>
    <ul id="dropdown3" class="dropdown-content">
        <li><a href="{{url('/matchesverified')}}"><i class="fa fa-fw fa-bell-o"></i> <font size="3"> Match Alerts</font></a></li>
        <li><a href="{{url('/acceptances')}}"><i class="fa fa-fw fa-thumbs-o-up"></i> <font size="3"> Acceptances</font></a></li>
        <li><a href="{{url('/receivedrequests')}}"><i class="fa fa-fw fa-exchange"></i> <font size="3"> Requests</font></a></li>
        <li class="divider"></li>
        <li><a href="{{url('/rejected')}}"><i class="fa fa-fw fa-thumbs-o-down"></i> <font size="3"> Rejected </font></a></li>
    </ul>
    <ul id="dropdown4" class="dropdown-content">
        <li><a href="{{url('/matchesverified')}}"><i class="fa fa-fw fa-bell-o"></i> <font size="3"> Match Alerts</font></a></li>
        <li><a href="{{url('/acceptances')}}"><i class="fa fa-fw fa-thumbs-o-up"></i> <font size="3"> Acceptances</font></a></li>
        <li><a href="{{url('/receivedrequests')}}"><i class="fa fa-fw fa-exchange"></i> <font size="3"> Requests</font></a></li>
        <li class="divider"></li>
        <li><a href="{{url('/rejected')}}"><i class="fa fa-fw fa-thumbs-o-down"></i> <font size="3"> Rejected </font></a></li>
    </ul>
    <ul id="dropdown10" class="dropdown-content">
        <li><a href="{{url('/')}}"><i class="fa fa-fw fa-search"></i> <font size="3"> Search </font></a></li>
        <li><a href="{{url('/searchbyid')}}"><i class="fa fa-fw fa-search-plus"></i> <font size="3"> Search By Id</font></a></li>
        <li class="divider"></li>
    </ul>
    <ul id="dropdown11" class="dropdown-content">
        <li><a href="{{url('/')}}"><i class="fa fa-fw fa-search"></i> <font size="3"> Search </font></a></li>
        <li><a href="{{url('/searchbyid')}}"><i class="fa fa-fw fa-search-plus"></i> <font size="3"> Search By Id</font></a></li>
        <li class="divider"></li>
    </ul>


    <nav>
        <div align="left" class="nav-wrapper black">
            <a href="{{url('/')}}" class="brand-logo white-text text-darken-2"> &nbsp;&nbsp;&nbsp;KFA<font class="red-text">Matrimonial</font></a>


            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-navicon"></i> </a>            
            
            <ul class="right hide-on-med-and-down">
                @if(Auth::check())
                <li class="li name-font"><a class="dropdown-button a" data-activates="dropdown2"><font size="4"><i class="fa fa-fw fa-user"></i>Hi, {{Auth::user()->name}}</font></a>
                </li>
                @else
                <li><a class="waves-effect waves-light modal-trigger" href="#modal25"><i class="fa fa-sign-in"></i> Login</a></li>
                <li><a class="waves-effect waves-light" href="{{url('/register')}}"><i class="fa fa-user"></i> Register</a></li>
                @endif
            </ul>
            <ul class="right hide-on-med-and-down">

                @if(Auth::check())
                <li class="li name-font"><a class="dropdown-button a" data-activates="dropdown11"><font size="4"><i class="fa fa-fw fa-search"></i> Search</font></a>
                </li>
                @endif
            </ul>
    	    <ul class="right hide-on-med-and-down">
                    <li><a class="waves-effect waves-light" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                    @if(Auth::check())
                    <li class="li name-font"><a class="dropdown-button a waves-effect waves-light" data-activates="dropdown3"><font size="4"><i class="fa fa-fw fa-envelope"></i> Inbox</font></a>
                    </li>
                    @endif
            </ul>




        <ul class="side-nav" id="mobile-demo">
                @if(Auth::check())
                <li><a class="waves-effect waves-light" href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li class="li"><a class="dropdown-button a waves-effect waves-light" data-activates="dropdown2"><font size="4">  <i class="fa fa-user"> Hi, {{Auth::user()->name}}</font></i></a>
                </li>
                <li class="li name-font "><a class="dropdown-button a waves-effect waves-light" data-activates="dropdown4"><font size="4"><i class="fa fa-fw fa-envelope"></i> Inbox</font></a>
                </li>
                <li class="li name-font"><a class="dropdown-button a" data-activates="dropdown10"><font size="4"><i class="fa fa-fw fa-search"></i> Search</font></a>
                </li>
                @else
                <li><a class="waves-effect waves-light" href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li><a class="waves-effect waves-light" href="{{url('/login')}}"><i class="fa fa-fw fa-sign-in"></i> Login</a></li>
                <li><a class="waves-effect waves-light" href="{{url('/register')}}"><i class="fa fa-fw fa-user"></i> Register</a></li>
                @endif
            </ul>


        </div>
    </nav>


  <!-- Modal Structure -->
  <div id="modal25" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col s12">
                <div class="panel-heading"><h5>Login</h5></div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

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
                        <!-- -->
                        <div class="form-group">
                            <div class="col s12">
                            <br><a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
            </div>
    </div>
    </div>
    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col s12">
                            <br>
                            <a class="btn-flat" href="{{ url('/register') }}">New User? Register Here!</a>

                                <button type="submit" class="btn red hoverable">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                  <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                            </div>
                        </div> 
                        
    </form>
    </div>
  </div>

    <script>

        $(document).ready(function(){
            $('.modal-trigger').leanModal();
            $(".button-collapse").sideNav();
            $(".dropdown-button").dropdown();
        });

    </script>
        <script>
        $(document).ready(function(){
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
            // $(document).on('load',function() { 
            //     $("#modal1").openModal();
            // }); 
            // $("#modal1").openModal();
            // $("#modal1").closeModal();
        });
    </script>

<!--     @if($errors->has('password') || $errors->has('email') )
                <script>$(document).ready(function()
                {
                        $('#modal25').openModal();

                });
                </script> 
    @endif   -->





    <div>
        @yield('content')
    </div>
    <footer class="page-footer blue">
          <div class="container">
            <div class="row">
              <div class="col l4 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l3 offset-l1 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  @if(Auth::check())
                <li><a class="waves-effect waves-light grey-text text-lighten-3" href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li class="li"><a class="dropdown-button waves-effect waves-light grey-text text-lighten-3" data-activates="dropdown2"><font size="">  <i class="fa fa-user"> Hi, {{Auth::user()->name}}</font></i></a>
                </li>
                <li class="li name-font "><a class="dropdown-button waves-effect grey-text text-lighten-3 waves-light" data-activates="dropdown4"><font size=""><i class="fa fa-fw fa-envelope"></i> Inbox</font></a>
                </li>
                @else
                <li><a class="waves-effect grey-text text-lighten-3 waves-light" href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li><a class="waves-effect waves-light grey-text text-lighten-3" href="{{url('/login')}}"><i class="fa fa-fw fa-sign-in"></i> Login</a></li>
                <li><a class="waves-effect waves-light grey-text text-lighten-3" href="{{url('/register')}}"><i class="fa fa-fw fa-user"></i> Register</a></li>
                @endif
                </ul>
              </div>
                <div class="col l3 offset-l1 s12">
                </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
        Cpoyright &copy; KFA Matrimonial.com, 2016.
            <a class="grey-text text-lighten-4 right" href="http://krishnafoundationforall.com">Krishna Foundation For All</a>
            </div>
          </div>
        </footer>
</div>
</body>
</html>
