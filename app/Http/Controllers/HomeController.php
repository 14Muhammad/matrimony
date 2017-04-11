<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\User;
use App\Helper\Age;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    /**
     * search function
     *
     * @return Collection of users in view
     * @author Ayush Singh
     **/
    public function search(SearchRequest $request)
    {
        //dd($request);
        $users = User::with('filters')->where('gender',$request->get('lookingfor'));
        //dd($users->get());
        if($request->get('caste')!=null && $request->get('caste')!=""){
            $users = $users->where('caste','LIKE','%'.$request->get('caste').'%');
        }
        //dd($users->get());
        if($request->get('religion')!=null && $request->get('religion')!="" && $request->get('religion')!="any"){
            $users = $users->where('religion','LIKE',$request->get('religion'));
        }
        //dd($users->get());
        if($request->get('city')!=null && $request->get('city')!="" && $request->get('city')!="any"){
            $users = $users->where('city','LIKE',$request->get('city'));
        }
        //dd($users->get());
        if($request->get('state')!=null && $request->get('state')!=""){
            $users = $users->where('state','LIKE',$request->get('state'));
        }
        //dd($users->get());
        if($request->get('country')!=null && $request->get('country')!=""){
            $users = $users->where('country','LIKE',$request->get('country'));
        }
        //dd($users->get());
        if ($request->get('height')!=null && $request->get('height')!="" && $request->get('height')!="any") {
            $h = $request->get('height');
            if($h%10==0){
                $h = $h/10;
                $users = $users->where('feet',$h)->where('inches','>',5);
            }
        }
        //dd($users->get());
        if($request->get('min_age')!=null && $request->get('min_age')!=""){
            $users = $users->where('age','>',$request->get('min_age')-1);
        }
        //dd($users->get());
        if($request->get('max_age')!=null && $request->get('max_age')!=""){
            $users = $users->where('age','<',$request->get('max_age')+1);
        }
        //dd($users->get());
        if(Auth::check()){
        $users = $users->where('id','!=',Auth::user()->id);
        if($request->get('income')!=null && $request->get('income')!="" && $request->get('income')!="No Income"){
            $users = $users->where('income',$request->get('income'));
        }
        //dd($users->get());
        if($request->get('occupation_type')!=null && $request->get('occupation_type')!=""){
            $users = $users->where('occupation_type',$request->get('occupation_type'));
        }
        //dd($users->get());
        }
        $users = $users->get();
        return view('search',compact('users'));
    }

    public function searchById(Request $request){
        $id = $request->get('id');
        $user = User::WithRandomId($id)->first();
        return view('searchbyid',compact('user'));
    }

    
}
