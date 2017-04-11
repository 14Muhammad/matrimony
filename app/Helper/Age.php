<?php

namespace App\Helper;

use App\User;
use Carbon\Carbon;

/**
 * Date of Birth calculator
 *
 * @package default
 * @author Ayush Singh
 **/
class Age
{
	protected $date;

	public function __construct($date){
		$this->date = $date;
	}

	public function age(){
		$dob = explode('-',$this->date);
		$now = explode('-',Carbon::now()->format('Y-m-d'));
		$years = $now[0]-$dob[0];
		return $years;
	}
} // END class 

			