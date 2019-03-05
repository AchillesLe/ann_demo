<?php
  define('ROOT', __DIR__ .DIRECTORY_SEPARATOR);
  define('APP',ROOT.'app'.DIRECTORY_SEPARATOR);
  define('PUBLIC_URL',ROOT.'public'.DIRECTORY_SEPARATOR);
  define('CORE',APP.'core'.DIRECTORY_SEPARATOR);
  define('VIEW',APP.'view'.DIRECTORY_SEPARATOR);
  define('MODEL',APP.'model'.DIRECTORY_SEPARATOR);
  define('CONTROLLER',APP.'controller'.DIRECTORY_SEPARATOR);
  $modules = [ROOT,APP,CORE,CONTROLLER,MODEL,VIEW];
  // var_dump ( $_SERVER );
  set_include_path( get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules) );
  spl_autoload_register('spl_autoload',false);
  session_start();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  new Application();
?>