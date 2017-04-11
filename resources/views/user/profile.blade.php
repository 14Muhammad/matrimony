@extends('layouts.master')

@section('content')
<div class="container">
    <br>
    <div class="row col s12" style="font-size: 20px; font-weight: bold;">
        <div class="card col s12">
            <div class="card-image waves-effect waves-block waves-light">
                @if(Auth::user()->family_pics->count()!=0)
                    <img class="col m6 offset-m3 s12" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/'.Auth::user()->profile_pic->name.'.'.Auth::user()->family_pics->extension) }}">
                @else
                <img class="" src="{{asset('img/mat_default.jpg')}}">
                @endif
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{Auth::user()->name }}<i class="fa fa-ellipsis-h" style="float:right;"></i></span>
                <p><a href="#family-modal" class="modal-trigger btn-flat waves-effect waves-light"><i class="fa fa-upload">Upload Family Picture/Cover Photo</i></a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{Auth::user()->name }}<i class="fa fa-times" style="float: right;"></i></span>

                <p> {{ Auth::user()->aboutself}}</p>
            </div>
        </div>
    </div>

    <div class="row" style="font-size: 18px; font-weight: bold;">
    @if(Auth::user()->profile_pic!=null)
        <img class="materialboxed col s12 l3 m4" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/'.Auth::user()->profile_pic->name.'.'.Auth::user()->profile_pic->extension) }}">
    @else
    @if(Auth::user()->gender=="male")
        <img class="materialboxed col s12 l3 m4" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/male.jpg') }}">
    @else
        <img class="materialboxed col s12 l3 m4" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/female.jpg') }}">
    @endif
    @endif
        <a href="{{url('/settings')}}"><span style="float: right;"><i class="fa fa-cogs"></i> Go to Settings </span></a>
        <font size="5"><i class="fa fa-user"></i> {{Auth::user()->name }}</font>
        <br>
        <i class="fa fa-envelope"></i> {{Auth::user()->email }}
        <br>
        <i class="fa fa-mobile"></i> {{Auth::user()->mobile }}
        <br>
        <i class="fa fa-building"></i> {{Auth::user()->dob }}
        <br>
        <i class="fa fa-child"></i> {{ ucfirst(Auth::user()->gender) }}
     {{--    <br>
        <i class="fa fa-globe"></i> {{ ucfirst(Auth::user()->religion) }}
        <br>
        <i class="fa fa-globe"></i> {{Auth::user()->caste }}
        <br>
        <i class="fa fa-heart-o"></i> {{Auth::user()->country }} --}}
    </div>

    <a href="#dp-modal" class="modal-trigger btn-flat waves-effect waves-light"><i class="fa fa-upload"> Upload Profile Picture</i></a>
    <div class="modal modal-fixed-footer" id="dp-modal">
        <form action="{{url('upload_pic')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="row col s12" style="border:1px solid lightblue;">
                @if(Auth::user()->profile_pic!=null)
                    <img class="col m6 offset-m3 s12" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/'.Auth::user()->profile_pic->name.'.'.Auth::user()->profile_pic->extension) }}">
                @else
                @if(Auth::user()->gender=="male")
                    <img class="col s12 m6 offset-m3" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/male.jpg') }}">
                @else
                    <img class="col s12 m6 offset-m3" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/female.jpg') }}">
                @endif
                @endif
            </div>
            <div class="row col s12">
                <div class="file-field input-field col s12">
                    <div class="btn blue">
                        <span>Upload Profile Picture</span>
                        <input type="file" accept="image/*" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate">
                    </div>
                </div>
                <label for="image"></label>
            </div>    
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn red">
                <i class="fa fa-btn fa-upload"></i> Upload
            </button>
        </div>
        </form>
    </div>
    <div class="modal modal-fixed-footer" id="family-modal">
        <form action="{{url('upload_family_pic')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="row col s12" style="border:1px solid lightblue;">
                @if(Auth::user()->family_pics->count()!=0)
                     <img class="col m6 offset-m3 s12" data-caption="{{Auth::user()->slug}}" src="{{asset('/uploads/images/'.Auth::user()->family_pics->first()->name.'.'.Auth::user()->family_pics->first()->extension) }}"> 
                @else
                    <img class="col s12" data-caption="{{Auth::user()->slug}}" src="{{asset('/img/mat_default.jpg') }}">
                @endif
            </div>
            <div class="row col s12">
                <div class="file-field input-field col s12">
                    <div class="btn blue">
                        <span>Upload Family Picture/Cover Picture</span>
                        <input type="file" accept="image/*" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate">
                    </div>
                </div>
                <label for="image"></label>
            </div>    
        </div>
        <div class="modal-footer">
            <br><br><button type="submit" class="btn red">
                <i class="fa fa-btn fa-upload"></i> Upload
            </button>
        </div>
        </form>
    </div>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
</div>
@stop
