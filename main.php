<?php
require_once 'table_div.php';

echo <<<_END
<html> <head> 
<link rel="stylesheet" type="text/css" href="../css/table.css">
<script src="ajax.js"> </script> 
</head> <body> 
 <form name='ajax' onsubmit='return false;'>
 Search Title: <input name='ptitle' id='ptitle' type='text' onkeyup='searchtitle();'>
 </form> 
_END;

?>