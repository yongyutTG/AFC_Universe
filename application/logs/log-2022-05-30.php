<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2022-05-30 14:40:54 --> Config Class Initialized
INFO - 2022-05-30 14:40:54 --> Hooks Class Initialized
DEBUG - 2022-05-30 14:40:54 --> UTF-8 Support Enabled
INFO - 2022-05-30 14:40:54 --> Utf8 Class Initialized
INFO - 2022-05-30 14:40:54 --> URI Class Initialized
INFO - 2022-05-30 14:40:54 --> Router Class Initialized
INFO - 2022-05-30 14:40:54 --> Output Class Initialized
INFO - 2022-05-30 14:40:54 --> Security Class Initialized
DEBUG - 2022-05-30 14:40:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-05-30 14:40:54 --> Input Class Initialized
INFO - 2022-05-30 14:40:54 --> Language Class Initialized
INFO - 2022-05-30 14:40:54 --> Language Class Initialized
INFO - 2022-05-30 14:40:54 --> Config Class Initialized
INFO - 2022-05-30 14:40:54 --> Loader Class Initialized
INFO - 2022-05-30 14:40:55 --> Helper loaded: url_helper
INFO - 2022-05-30 14:40:55 --> Helper loaded: file_helper
ERROR - 2022-05-30 14:40:55 --> Severity: error --> Exception: syntax error, unexpected '=' D:\xampp\htdocs\AFC_Universe\application\config\database.php 32
ERROR - 2022-05-30 14:40:55 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of ParseError given, called in D:\xampp\htdocs\AFC_Universe\system\core\Common.php on line 658 and defined in D:\xampp\htdocs\AFC_Universe\system\core\Exceptions.php:190
Stack trace:
#0 D:\xampp\htdocs\AFC_Universe\system\core\Common.php(658): CI_Exceptions->show_exception(Object(ParseError))
#1 [internal function]: _exception_handler(Object(ParseError))
#2 {main}
  thrown D:\xampp\htdocs\AFC_Universe\system\core\Exceptions.php 190
