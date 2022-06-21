<?php 
require('./php/component.php');
require('./php/db.php');

$name=get_safe_value($connection,$_POST['name']);
$email=get_safe_value($connection,$_POST['email']);
$mobile=get_safe_value($connection,$_POST['mobile']);
$password=get_safe_value($connection,$_POST['password']);
$added_on=date('Y-m-d h:i:s');

$check_user=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM users WHERE email='$email' "));

if($check_user>0){
    echo 'present';
}else{
    mysqli_query($connection,"INSERT into users(name,email,password,mobile,date) VALUES('$name','$email','$password','$mobile','$added_on') ");
    echo "inserted";
}

?>