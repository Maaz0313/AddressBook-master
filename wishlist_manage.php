<?php
require('conn.inc.php');
require('functions.inc.php');

$pid=get_safe_value($conn,$_POST['pid']);
$type=get_safe_value($conn,$_POST['type']);

if(isset($_SESSION['USER_LOGIN'])){
    $uid=$_SESSION['USER_ID'];
    if(mysqli_num_rows(mysqli_query($conn,"select * from wishlist where user_id='$uid' and product_id='$pid'"))>0){
        echo "Already added";
    }else{
    date_default_timezone_set("Asia/Karachi");
    $added_on=date('y-m-d h:i:s');
    mysqli_query($conn,"INSERT INTO `wishlist`(`user_id`, `product_id`, `added_on`) VALUES ('$uid','$pid','$added_on')");
    }
}else{
    echo "not_login";
}
?>