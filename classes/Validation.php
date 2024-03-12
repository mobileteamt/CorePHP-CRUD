<?php
class Validation 
{
	/*
	 #Function to validate the entry field's value
	 #Input data that is filled by the user, fields that is avialable in the form
	 #Output message for error if any
	*/
	public function check_empty($data, $fields)
	{
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msg .= "$value field empty <br />";
			}
		} 
		return $msg;
	}
	/*
	 #Function to validate the age entered by the user to number 
	 #Input age value to validate
	 #Output true/false
	*/
	public function is_age_valid($age)
	{
		if (preg_match("/^[0-9]+$/", $age)) {	
			return true;
		} 
		return false;
	}
	/*
	 #Function to validate the correct email entered by the user 
	 #Input email that needs to validate
	 #Output true/false
	*/
	public function is_email_valid($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	
			return true;  
		}
		return false;
	}
}
?>
