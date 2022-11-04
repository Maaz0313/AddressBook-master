<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}

function get_product()
{
    $conn = mysqli_connect("localhost","root","","addressbook");
    $sql="select * from product";
    $res=mysqli_query($conn,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res))
    {
        $data[]=$row;
    }
    return $data;
}
?>