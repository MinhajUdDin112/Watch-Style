<?php 
    
    if(!isset($_SESSION))
    {
        session_start();
    }
   
    $connection = mysqli_connect('localhost', 'root', '', 'watch_keeper');   
    
   if(!defined('SERVER_PATH')) define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/watch_style/');
   if(!defined('SITE_PATH')) define('SITE_PATH','http://localhost/php/Watch_style/');

    if(!defined('PRODUCT_IMAGE_SERVER_PATH')) define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'images/img/');
    if(!defined('PRODUCT_IMAGE_SITE_PATH')) define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'images/img/');
   
?>