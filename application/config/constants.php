<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
/*
|--------------------------------------------------------------------------
|Sort table models 
|--------------------------------------------------------------------------
*/
define('SORT_BY_MODEL', 1);
define('SORT_BY_BRAND', 3);
define('SORT_BY_STYLE', 5);
define('SORT_BY_FRAME', 7);
define('SORT_BY_LENSE', 9);
/*
|--------------------------------------------------------------------------
|Image manipulation 
|--------------------------------------------------------------------------
*/
define('IMAGE_CAT_MODEL_SET', 'image_model_set');
define('IMAGE_CAT_BRAND', 'image_band');
define('IMAGE_SIZE_TINY', 'tiny');
define('IMAGE_SIZE_SMALL', 'small');
define('IMAGE_SIZE_MEDIUM', 'medium');
define('IMAGE_SIZE_LARGE', 'large');
/*
|--------------------------------------------------------------------------
|Coupon 
|--------------------------------------------------------------------------
*/
define('COUPON_TYPE_ABSOLUTE_TOKEN','$');
define('COUPON_TYPE_PERCENT_TOKEN','%');
/* End of file constants.php */
/* Location: ./system/application/config/constants.php */