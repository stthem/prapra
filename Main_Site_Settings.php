<?php
#
$Path = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//$Path        = $_SERVER["SCRIPT_URL"];
$Arr         = explode("/",$Path);
$Main_Folder = $Arr[1];
#
$Main_Folder = 'SearchDekanat';
$Register    = '3_students';                                  
?>