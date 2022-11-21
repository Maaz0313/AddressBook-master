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
function get_safe_value($conn,$str)
{
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($conn,$str);
    }
}
function get_product($conn,$limit='',$cat_id='',$product_id='',$search_str='') {
    $sql="SELECT product.*,categories.categories FROM product,categories where product.status=1 ";
    if($cat_id!=''){
        $sql.=" AND product.categories_id=$cat_id ";
    }
    if($product_id!=''){
        $sql.=" AND product.id=$product_id ";
    }
        $sql.=" AND product.categories_id=categories.id ";
    if($search_str!=''){
        $sql.=" AND (product.name LIKE '%$search_str%' OR product.description LIKE '%$search_str%') ";
    }
        $sql.=" ORDER BY product.id DESC";
    
    if($limit!=''){
        $sql.=" limit $limit";
    }
    // echo $sql;
    $res=mysqli_query($conn,$sql,);
    $data=array();
    while($row=mysqli_fetch_assoc($res)){
       $data[]=$row; 
    }
    return $data;
}
?>