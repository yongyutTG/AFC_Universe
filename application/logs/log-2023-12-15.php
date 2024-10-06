<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2023-12-15 00:28:37 --> Config Class Initialized
INFO - 2023-12-15 00:28:37 --> Hooks Class Initialized
DEBUG - 2023-12-15 00:28:37 --> UTF-8 Support Enabled
INFO - 2023-12-15 00:28:37 --> Utf8 Class Initialized
INFO - 2023-12-15 00:28:37 --> URI Class Initialized
DEBUG - 2023-12-15 00:28:38 --> No URI present. Default controller set.
INFO - 2023-12-15 00:28:38 --> Router Class Initialized
INFO - 2023-12-15 00:28:38 --> Output Class Initialized
INFO - 2023-12-15 00:28:38 --> Security Class Initialized
DEBUG - 2023-12-15 00:28:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2023-12-15 00:28:38 --> Input Class Initialized
INFO - 2023-12-15 00:28:38 --> Language Class Initialized
INFO - 2023-12-15 00:28:38 --> Language Class Initialized
INFO - 2023-12-15 00:28:38 --> Config Class Initialized
INFO - 2023-12-15 00:28:38 --> Loader Class Initialized
INFO - 2023-12-15 00:28:38 --> Helper loaded: url_helper
INFO - 2023-12-15 00:28:38 --> Helper loaded: file_helper
ERROR - 2023-12-15 00:28:38 --> Severity: error --> Exception: syntax error, unexpected '=' D:\xampp\htdocs\AFC_Universe\application\config\database.php 32
ERROR - 2023-12-15 00:28:38 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of ParseError given, called in D:\xampp\htdocs\AFC_Universe\system\core\Common.php on line 658 and defined in D:\xampp\htdocs\AFC_Universe\system\core\Exceptions.php:190
Stack trace:
#0 D:\xampp\htdocs\AFC_Universe\system\core\Common.php(658): CI_Exceptions->show_exception(Object(ParseError))
#1 [internal function]: _exception_handler(Object(ParseError))
#2 {main}
  thrown D:\xampp\htdocs\AFC_Universe\system\core\Exceptions.php 190
