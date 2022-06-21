<?php 
require('./php/component.php');
require('./php/db.php');
require('add_to_cart.php');

$row='';
$pid=get_safe_value($connection,$_POST['pid']);
$type=get_safe_value($connection,$_POST['type']);

$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($pid);
}

if($type=='remove'){
	$obj->removeProduct($pid);
}

if($type=='update'){
	$obj->updateProduct($pid);
}

echo $obj->totalProduct();

?>