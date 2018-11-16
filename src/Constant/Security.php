<?php
namespace App\Constant;
class Security {
	const VALID_PARAM			= 0;
	const USER_INVALID	 		= 1;
	const USER_ALREADY_EXISTS 	= 2;
	const MAIL_INVALID			= 4;
	const MAIL_ALREADY_EXISTS 	= 8;
	const PASSWORD_INVALID		= 16;
}
