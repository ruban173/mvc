<?php
set_include_path(get_include_path().
                  PATH_SEPARATOR.'application/controllers'.
                  PATH_SEPARATOR.'application/models'.				  
                  PATH_SEPARATOR.'application/views'.	
				          PATH_SEPARATOR.'application/core'.
                  PATH_SEPARATOR.'application/lib'
                  );
				  
function __autoload($class_name) {
require_once $class_name.'.php';
                                  };
route::start();

ini_set('display_errors', 1);

?>

