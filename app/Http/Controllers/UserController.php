<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\UpdateRequest;
use Auth;
use App\Otp;
use Carbon\Carbon;
use App\Sms\WAY2SMSClient;
use App\User;
use App\Request as Req;
use App\Friends;
use App\ProfilePics;
use App\FamilyPics;
use App\Helper\Age;

class UserController extends Controller
{
    /**
     * function to update account details
     *
     * @return /settings page
     * @author Ayush Singh
     **/
    public function update(UpdateRequest $request)
    {
    	$user = Auth::user();
    	$name = $request->has('name') ? $request->get('name') : Auth::user()->name;
    	$email = $request->has('email') ? $request->get('email') : Auth::user()->email;
    	$mobile = $request->has('mobile') ? $request->get('mobile') : Auth::user()->mobile;
    	$dob = $request->has('dob') ? $request->get('dob') : Auth::user()->dob;
    	$gender = $request->has('gender') ? $request->get('gender') : Auth::user()->gender;
    	$mothertongue = $request->has('mothertongue') ? $request->get('mothertongue') : Auth::user()->mothertongue;
         $religion = $request->has('religion') ? $request->get('religion') : Auth::user()->religion;
         $caste = $request->has('caste') ? $request->get('caste') : Auth::user()->caste;
         $subcaste = $request->has('subcaste') ? $request->get('subcaste') : Auth::user()->subcaste;
         $manglik = $request->has('manglik') ? $request->get('manglik') : Auth::user()->manglik;
         $marital_status = $request->has('marital_status') ? $request->get('marital_status') : Auth::user()->marital_status;
         $feet = $request->has('feet') ? $request->get('feet') : Auth::user()->feet;
         $inches = $request->has('inches') ? $request->get('inches') : Auth::user()->inches;
         $country = $request->has('country') ? $request->get('country') : Auth::user()->country;
         $city = $request->has('city') ? $request->get('city') : Auth::user()->city;
    	 $degree = $request->has('degree') ? $request->get('degree') : Auth::user()->degree;
    	 $occupation = $request->has('occupation') ? $request->get('occupation') : Auth::user()->occupation;
    	 $income = $request->has('income') ? $request->get('income') : Auth::user()->income;
         $age = (new Age($dob))->age();
    	$user->update([
    	'name' => $name,
    	'email' => $email,
    	'mobile' => $mobile,
    	'dob' => $dob,
        'age' => $age,
    	'gender' => $gender,
    	'mothertongue' => $mothertongue,
    	'religion' => $religion,
    	'caste' => $caste,
    	'subcaste' => $subcaste,
    	'manglik' => $manglik,
    	'marital_status' => $marital_status,
    	'feet' => $feet,
    	'inches' => $inches,
    	'country' => $country,
    	'city' => $city,
    	'degree' => $degree,
    	'occupation' => $occupation,
    	'income' => $income,
    	]);

    	return redirect('/settings'); 
    }
    public function pic(){
        $p = Auth::user()->profile_pic->first();
        dd($p->name);
    }
    /**
     * function to upload profile pic
     *
     * @return profile page
     * @author Ayush Singh
     **/
    public function upload_pic()
    {
        try{
        $image = Input::file('image');
        $user = Auth::user();
                $destinationFolder = 'uploads/images';
                $name = $user->slug.'_pic';
                $extension = $image->getClientOriginalExtension();
                $original_name = $image->getClientOriginalName();
                $mime = $image->getClientMimeType();
                $size = $image->getClientSize();
                $image->move($destinationFolder,$name.'.'.$extension);
                $pic = new ProfilePics;
                $pic->user_id = $user->id;
                $pic->name = $name;
                $pic->size = $size;
                $pic->original_name = $original_name;
                $pic->extension = $extension;
                $pic->mime = $mime;
                $pic->user()->associate($user);
                $pic->save();
                return redirect('/home');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * function to upload family pic
     *
     * @return profile page
     * @author Ayush Singh
     **/
    public function upload_family_pic()
    {
        try{
            $image = Input::file('image');
            $user = Auth::user();
                $destinationFolder = 'uploads/images';
                $name = $user->slug.'_pic';
                $extension = $image->getClientOriginalExtension();
                $original_name = $image->getClientOriginalName();
                $mime = $image->getClientMimeType();
                $size = $image->getClientSize();
                $image->move($destinationFolder,$name.'.'.$extension);
                $pic = new FamilyPics;
                $pic->user_id = $user->id;
                $pic->name = $name;
                $pic->size = $size;
                $pic->original_name = $original_name;
                $pic->extension = $extension;
                $pic->mime = $mime;
                $pic->user()->associate($user);
                $pic->save();
                return redirect('/home');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

    }
    /**
     * return profile of user with the given slug
     *
     * @return viewprofile.blade.php
     * @author Ayush Singh
     **/
    public function viewprofile($slug)
    {
        $user = User::WithSlug($slug)->first();
        $f= Friends::AreFriends($user->id,Auth::user()->id)->first();
        if(is_null($f)){
            return redirect('/home');
        }
        $friendsReq = Req::HaveRequest(Auth::user()->id,$user->id)->first();
        $friendsReq->update([
            'status' => 3,
            ]);
        return view('user.viewprofile',compact('user'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
   /* public function notifications()
    {
         $received = Auth::user()->received;

         $sentByUsers = new Collection();
         foreach ($received as $r) {
            if($r->status==0){
             $sentByUsers->push($r->user);
            }
         }
        $sentToUsersAccepted = new Collection();
        $accepted = Auth::user()->sent->where('status',1);
        foreach ($accepted as $req) {
            $sentToUsersAccepted->push($req->recipient);
        }
        $sentToUsersPending = new Collection();
        $pending = Auth::user()->sent->where('status',0);
        foreach ($pending as $p) {
            $sentToUsersPending->push($p->recipient);
        }
        return view('user.notifications',compact('sentToUsersPending','sentToUsersAccepted','sentByUsers'));
    }

*/
    /**
     * send request to another user to view their profile
     *
     * @return void
     * @author Ayush Singh
     **/
    public function sendrequest(Request $request){
        try{
        if(!($request->ajax())){
            return view('errors.503');
        }
        $slug = $request->get('slug');
        $user = User::WithSlug($slug)->get();
        $req = new Req();
        $req->user_id = Auth::user()->id;
        $req->recipient_id = $user[0]->id;
        $req->status = 0;
        $req->save();
        return response()->json(['status' => 200,'message' => 'success']);
    }
    catch(\Exception $e){
        return response()->json(['status' => 400,'message' => 'exists']);   
    }
    }


    /**
     * accept request from user
     *
     * @return void
     * @author Ayush Singh
     **/
    public function acceptrequest(Request $request)
    {
        try{
            if(!($request->ajax())){
                return view('errors.503');
            }
            $slug = $request->get('slug');
            $user = User::WithSlug($slug)->first();
            $friendRequest = Req::where('user_id',$user->id)->where('recipient_id',Auth::user()->id)->first();
            $friendRequest->update(['status' => 1]);
            $friends = new Friends();
            $friends->user_id_1 = Auth::user()->id;
            $friends->user_id_2 = $user[0]->id;
            $friends->save();
            return response()->json(['status' => 200,'message' => 'success']);
        }
        catch(\Exception $e){
            return response()->json(['status' => 400,'message' => 'exists']);
        }
    }

    /**
     * reject request from user
     *
     * @return void
     * @author Ayush Singh
     **/
    public function rejectrequest(Request $request)
    {
        try{
            if(!($request->ajax())){
                return view('errors.503');
            }
            $slug = $request->get('slug');
            $user = User::WithSlug($slug)->first();
            $friendRequest = Req::where('user_id',$user->id)->where('recipient_id',Auth::user()->id)->first();
            $friendRequest->update(['status' => 2]);
            return response()->json(['status' => 200,'message' => 'success']);
        }
        catch(\Exception $e){
            return response()->json(['status' => 400,'message' => 'exists']);
        }
    }

    /**
     * send otp to new user for verification
     *
     * @return view of verify maobile
     * @author Ayush Singh
     **/
    public function otp(){
        $otp = rand(1000,9999);
        $userOtp = new Otp();
        $userOtp->mobile = Auth::user()->mobile;
        $userOtp->otp = $otp;
        //$user->expired_at = Carbon::now('Asia/kolkata')->addMinute(3);
        $userOtp->save();
        $this->sendOtp(Auth::user()->mobile,$otp);
        return view('auth.verify');
    }

    /**
     * check if the entered otp is correct or not
     *
     * @return redirect to complete_profile_1
     * @author Ayush Singh
     **/
    public function verifyMobile(Request $request){
        $rec_otp = $request->get('otp');
        $sentOtp = Otp::where('mobile',Auth::user()->mobile)->orderBy('created_at','desc')->first();
        /*if($sentOtp->expired_at->lt(Carbon::now('Asia/kolkata'))){
        	return redirect('/verify');
        }*/
        if($sentOtp->otp!=$rec_otp){
        	return redirect('/verify');
        }
        $user = Auth::user();
        $slug = str_replace(' ','-',strtolower(Auth::user()->name)).'-'.Auth::user()->id;
        $user->update([
        	'reg_step' => 1,
            'slug' => $slug,
        	]);
        return redirect('/home');
    }

    /**
     * function to send otp to given mobile number
     *
     * @return status of sent message
     * @author Ayush Singh
     **/
    public function sendOtp($mobile,$otp){
        try{
            $client = new WAY2SMSClient();
            $client->login('9654939164', 'superuser');
            $res = $client->send($mobile, 'Your Verification otp is '.$otp);  
            $client->logout();
            return $res;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
    /**
     * test function for sms
     *
     * @return status
     * @author Ayush Singh
     **/
    public function sms(Request $request){
        if(Auth::user()->reg_step!=0){
            return redirect('/');
        }
        $otp = rand(1000,9999);
        $mob = $request->get('mobile');
        return $this->sendOtp($mob,$otp);
    }
    /**
     * matches that have not been visited
     *
     * @return view of user.acceptances
     * @author Ayush Singh
     **/
    public function acceptances()
    {
        $friends = new Collection();
        $accepted = Auth::user()->sent->where('status',1);
        foreach ($accepted as $req) {
            $friends->push($req->recipient);
        }
        $iAccepted = Auth::user()->received->where('status',1);
        foreach ($iAccepted as $acc) {
            $friends->push($acc->user);
        }
        //dd($friends);
        return view('user.acceptances',compact('friends'));
    }
    /**
     * matches that have been visited once in acceptances
     *
     * @return view pf user.matches
     * @author Ayush Singh
     **/
    public function matches(){
        $friends = new Collection();
        $accepted = Auth::user()->sent->where('status',3);
        foreach ($accepted as $req) {
            $friends->push($req->recipient);
        }
        $iAccepted = Auth::user()->received->where('status',3);
        foreach ($iAccepted as $acc) {
            $friends->push($acc->user);
        }
        //dd($friends);
        return view('user.matches',compact('friends'));
    }
    /**
     * received requests
     *
     * @return view user.received
     * @author Ayush Singh
     **/
    public function receivedrequests()
    {
        $received = Auth::user()->received;

         $sentByUsers = new Collection();
         foreach ($received as $r) {
            if($r->status==0){
             $sentByUsers->push($r->user);
            }
         }
         return view('user.receivedrequests',compact('sentByUsers'));
    }
    /**
     * rejected requests
     *
     * @return view user.rejected
     * @author Ayush Singh
     **/
    public function blockedrequest()
    {
        $blocked = new Collection();
        $rejected = Auth::user()->sent->where('status',2);
        foreach ($rejected as $req) {
            $blocked->push($req->recipient);
        }
        $iRejected = Auth::user()->received->where('status',2);
        foreach ($iRejected as $acc) {
            $blocked->push($acc->user);
        }
        //dd($friends);
        return view('user.rejected',compact('blocked'));   
    }

    public function filter(Request $request){
        $val = explode('_',$request->get('val'));
        $filters = User::WithSlug($val[1])->first()->filters;
        if(!strcmp($val[0],'marital')){
            $filters->update([
        'marital_status' => $request->get('checked'),
        ]);
        }
        if(!strcmp($val[0], 'occupationtype')){
            $filters->update([
        'occupation_type' => $request->get('checked'),
        ]);
        }
        else{
              $filters->update([
            $val[0] => $request->get('checked')
            ]);
        }
        return response()->json(['status' => 200,'message' => 'success']); 
    }

}
