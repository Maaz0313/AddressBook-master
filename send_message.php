<?php
require('conn.inc.php');
require('functions.inc.php');

$name=get_safe_value($conn,$POST['name']);
$email=get_safe_value($conn,$POST['email']);
$mobile=get_safe_value($conn,$POST['mobile']);
$comment=get_safe_value($conn,$POST['message']);
$added_on=date('y-m-d h:i:s');
mysqli_query($conn,"insert into contact_us(name,email,mobile,comment,add_on) value('$name','$email','$mobile','$comment','$added_on')" );
echo "Thank you";
?>