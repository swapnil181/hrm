<?php
/**
 |
 |---------------------------------------------------------------------
 | File to contain constants to be used in this application
 |---------------------------------------------------------------------
 */
return array(

		// Successful 2xx
		"HTTP_OK" => 200,

		// Client Errors 4xx
		"HTTP_BAD_REQUEST" => 400,
		"HTTP_NOT_AUTHORISED" => 401,
		"HTTP_NOT_ACCEPTABLE" => 406,

		"PROFILE_NOT_VERIFIED" => 402,

		// Server error
		"HTTP_INTERNAL_SERVER_ERROR" => 500,


		// Mesages
		"ROLE_ASSIGNED" => "Role assigned successfully",
		"PERMISSION_ASSIGNED" => "Permission assigned successfully",

		"SUCCESS_CREATE" => "Record added successfully",
		"SUCCESS_UPDATE" => "Record updated successfully",
		"SUCCESS_DELETE" => "Record deleted successfully",

		"SERVER_ERROR" => "Something went wrong!",

		"ALL_RECORD" => "Records found!",
		"NO_RECORD" => "No records found!",

		"NOT_AUTHORISED" => "Sorry! You don't have access to this",

		"EMAIL_VERIFICATION_TYPE" => "email",
		"MOBILE_VERIFICATION_TYPE"=>"mobile",


	);
//end of file constants.php