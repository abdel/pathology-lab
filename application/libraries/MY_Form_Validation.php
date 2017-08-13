<?php

class MY_Form_validation extends CI_Form_validation
{    
   	function __construct($config = array())
   	{
    	parent::__construct($config);
    }

   	function valid_date($date)
	{
		$format = 'Y-m-d';
		$d = DateTime::createFromFormat($format, $date);
    	return $d && $d->format($format) == $date;
	}

	function valid_datetime($datetime)
	{
		$format = 'Y-m-d H:i:s';
		$d = DateTime::createFromFormat($format, $datetime);
    	return $d && $d->format($format) == $datetime;
	}

	function valid_phone($phone)
	{
		return (substr($phone, 0, 1) == '+');
	}
}