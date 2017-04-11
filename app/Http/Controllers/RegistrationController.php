<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Filters;
use Validator;
use Auth;
use App\Http\Requests\StepOneRequest;
use App\Http\Requests\StepTwoRequest;
use App\Http\Requests\StepThreeRequest;

class RegistrationController extends Controller
{
    /**
     * Rgistration Complete Step 1
     *
     * @return view of step 2
     * @author Ayush Singh
     **/
    function step_one(StepOneRequest $request)
    {
         //dd(!strcmp('other',$request->get('mothertongue')));
        $mother = (strcmp('other',$request->get('mothertongue'))) ? $request->get('mothertongue') : $request->get('othertongue');
        $religion = (strcmp('other',$request->get('religion'))) ? $request->get('religion') : $request->get('otherreligion');
    		//dd($mother);
            $user = Auth::user();
            try{
            $user->update([
                'mothertongue' => $mother,
                'religion' => $religion,
                'caste' => $request->get('caste'),
                'subcaste' => $request->get('subcaste'),
                'manglik' => $request->get('manglik'),
                'feet' => $request->get('feet'),
                'inches' => $request->get('inches'),
                'country' => $request->get('country'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'marital_status' => $request->get('marital_status'),
                'reg_step' => 2,
                ]);
            //dd($user);
    			return redirect('/home');
            }
            catch(Exception $e){
                var_dump($e->getMessage());
            }
    }

    /**
     * Step 2 of registration
     *
     * @return view of step 3 (optional step)
     * @author Ayush Singh
     **/
    public function step_two(StepTwoRequest $request)
    {
        $degree = (strcmp('other',$request->get('degree'))) ? $request->get('degree') : $request->get('otherdegree');
        	$user = Auth::user();
            $user->update([
                'income' => $request->get('income'),
                'occupation' => $request->get('occupation'),
                'occupation_type' => $request->get('occupation_type'),
                'degree' => $degree,
                'reg_step' => 3, 
                ]);
            $filters = new Filters();
            $filters->user_id = Auth::user()->id;
            $filters->name = 1;
            $filters->age = 1;
            $filters->mobile = 1;
            $filters->degree = 1;
            $filters->occupation_type = 1;
            $filters->marital_status = 1;
            $filters->income = 1;
            $filters->marital_status = 1;
            $filters->occupation = 1;
            $filters->save();
    	return redirect('/complete_profile_3');
    }

    /**
     * Optional step
     *
     * @return view of homepage
     * @author Ayush Singh
     **/
    public function step_three(StepThreeRequest $request)
    {
    	$user = Auth::user();
        $familytype = $request->has('familytype') ? $request->get('familytype') : null;
        $occfather = $request->has('occfather') ? $request->get('occfather') : null;
        $occmother = $request->has('occmother') ? $request->get('occmother') : null;
        $sisters = $request->has('sisters') ? $request->get('sisters') : 0;
        $brothers = $request->get('brothers') ? $request->get('brothers') : 0;
        $address = $request->get('address') ? $request->get('address') : null;
        $aboutfamily = $request->has('aboutfamily') ? $request->has('aboutfamily') : null;
        $aboutself = $request->has('aboutself') ? $request->get('aboutself') : null;
        $reg_step = 4;
        $user->update([
            'familytype' => $familytype,
            'occmother' => $occmother,
            'occfather' => $occfather,
            'sisters' => $sisters,
            'brothers' => $brothers,
            'address' => $address,
            'aboutself' => $aboutself,
            'aboutfamily' => $aboutfamily,
            'reg_step' => $reg_step,
            ]);
        //dd($user);
        return redirect('/home');
    }
}
