<?php

include_once ('../_functions/functions.php');
include_once ('../_config/config.php');
include_once ('../_config/db.php');

class AutoloaderClassOFApi
{
   static  function register(){
       spl_autoload_register(function ($class){

           include_once('../_classes/'.$class.'.php');
       });
   }
}
