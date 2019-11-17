<?php
function quitarAcentos($text)
	{
		
		//$text = htmlentities($text, ENT_QUOTES, 'UTF-8'); //esto no va, por esto no salía bien y debe estar la db como Al crear la base de datos MySQL, asegúrate que los campos string y demás esten en utf8_spanish_ci y el cotejamiento de las tablas en utf_unicode_ci (más tarde en Operations > Collation de phpMyAdmin se puede cambiar)

		$text = strtolower($text);
		$patron = array (
			// Espacios, puntos y comas por guion
			//'/[\., ]+/' => '-',
 
			// Vocales
			'/&agrave;/' => 'A',
			'/&egrave;/' => 'E',
			'/&igrave;/' => 'I',
			'/&ograve;/' => 'O',
			'/&ugrave;/' => 'U',
 
			'/á/' => 'A',
			'/é/' => 'E',
			'/í/' => 'I',
			'/ó/' => 'O',
			'/ú/' => 'U',
			
			'/&Aacute;/' => 'A',
			'/&Eacute;/' => 'E',
			'/&Iacute;/' => 'I',
			'/&Oacute;/' => 'O',
			'/&Uacute;/' => 'U',
 
			'/&acirc;/' => 'A',
			'/&ecirc;/' => 'E',
			'/&icirc;/' => 'I',
			'/&ocirc;/' => 'O',
			'/&ucirc;/' => 'U',
 
			'/&atilde;/' => 'A',
			'/&etilde;/' => 'E',
			'/&itilde;/' => 'I',
			'/&otilde;/' => 'O',
			'/&utilde;/' => 'U',
 
			'/&auml;/' => 'A',
			'/&euml;/' => 'E',
			'/&iuml;/' => 'I',
			'/&ouml;/' => 'O',
			'/&uuml;/' => 'U',
 
			'/&auml;/' => 'A',
			'/&euml;/' => 'E',
			'/&iuml;/' => 'I',
			'/&ouml;/' => 'O',
			'/&uuml;/' => 'U',
 
			// Otras letras y caracteres especiales
			'/&aring;/' => 'A',
			'/&ntilde;/' => 'ñ',
			'/&Ntilde;/' => 'Ñ',
			'/ñ/' => 'Ñ',
 
			// Agregar aqui mas caracteres si es necesario
 
		);
 
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
		return $text;
}
?>