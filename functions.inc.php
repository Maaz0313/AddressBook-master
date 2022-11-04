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

function get_product($conn,$type='',$limit='')
{
    
    $sql="select * from product where status=1";
    if($type=='latest')
    {
        $sql.=" order by id desc";
    }
    if($limit!='')
    {
        $sql.=" limit $limit";
    }
    $res=mysqli_query($conn,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res))
    {
        $data[]=$row;
    }
    return $data;
}
?>