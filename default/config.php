<?php



$siteName = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['SERVER_NAME'];
$siteName .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);




    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].HOST.'ws_cache');
?>
