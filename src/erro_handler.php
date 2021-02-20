<?php

//function setInternalServerError() {}

function setInternalServerError($errno, $errstr, $errfile, $errline) {


  echo '<h1>ERROR</h>';

  if (!DEBUG) {
      exit;
  }
 
  
  echo '<span style="font-weigth: bold; color:red">';
  switch ($errno) {
      case E_USER_ERROR:
          echo '<strong>ERRO</strong> [' . $errno .'] '. $errstr . "<br>\n";
          echo 'Fatal erro on line' .$errline . 'in file' . $errfile;
          break;

      case E_USER_WARNING:
          echo '<strong>WARNING</strong> [' . $errno .'] '. $errstr . "<br>\n";
          break;
      
      case E_USER_NOTICE:
          echo '<strong>NOTICE</strong> [' . $errno .'] '. $errstr . "<br>\n";
          break;
          

      default:
      echo '<strong>UNKNOW ERRO TYPE</strong> [' . $errno .'] '. $errstr . "<br>\n";
      break;    
  }
  echo '</span>';
  
  echo '<ul>';
  foreach (debug_backtrace() as $error) {
      if (!empty($error['file'])) {
          echo '<li>';
          echo $error['file'] . ':';
          echo $error['line'];
          echo '</li>';
      }
  }
  echo '</ul>';

  exit;
}


set_error_handler('setInternalServerError');
set_exception_handler('setInternalServerError');