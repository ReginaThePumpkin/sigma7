<?php
//esta función transforma a un formato adecuado los valores de los campos que se van a indertar en la DB, evitando inyección de código maligno
function sqlValue($value, $type) {
  $value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
  $value = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($value) : mysql_escape_string($value);

  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  return $value;
}
?>