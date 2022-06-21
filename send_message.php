<?php
require('./php/component.php');
require('./php/db.php');

$name=get_safe_value($connection,$_POST['name']);
$email=get_safe_value($connection,$_POST['email']);
$mobile=get_safe_value($connection,$_POST['mobile']);
$comment=get_safe_value($connection,$_POST['message']);
$added_on=date('Y-m-d h:i:s');
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
exit();
}
}
if ($mobile === ''){
print json_encode(array('message' => 'Subject cannot be empty', 'code' => 0));
exit();
}
if ($comment === ''){
print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
exit();
}



mysqli_query($connection,"INSERT into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
echo "Thank you";
?>

