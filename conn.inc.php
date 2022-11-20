<?php
session_start();
$conn = mysqli_connect("localhost","root","","addressbook");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/AddressBook-master');
define('SITE_PATH','http://localhost/AddressBook-master/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/product/');

?>
