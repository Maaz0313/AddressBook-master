<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$best_seller='';

$msg='';
// $image_required='required';
if (isset($_GET['id']) && $_GET['id']!='') {
    $image_required='';
    $id = get_safe_value($conn,$_GET['id']);
    $res = mysqli_query($conn,"SELECT * FROM product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        $row = mysqli_fetch_assoc($res);
        $categories_id=$row['categories_id'];
        $name=$row['name'];
        $mrp=$row['mrp'];
        $price=$row['price'];
        $qty=$row['qty'];
        $img=$row['image'];
        $short_desc=$row['short_desc'];
        $description=$row['description'];
        $meta_title=$row['meta_title'];
        $meta_desc=$row['meta_desc'];
        $meta_keyword=$row['meta_keyword'];
        $best_seller=$row['best_seller'];
    }
    else
    {
        header('location:product.php');
        die();
    }
    
}
if (isset($_POST['submit'])) {
    $categories_id = get_safe_value($conn,$_POST['categories_id']);
    $name = get_safe_value($conn,$_POST['name']);
    $mrp = get_safe_value($conn,$_POST['mrp']);
    $price = get_safe_value($conn,$_POST['price']); //1:36:26
    $qty = get_safe_value($conn,$_POST['qty']);
    $short_desc = get_safe_value($conn,$_POST['short_desc']);
    $description = get_safe_value($conn,$_POST['description']);
    $meta_title = get_safe_value($conn,$_POST['meta_title']);
    $meta_desc = get_safe_value($conn,$_POST['meta_desc']);
    $meta_keyword = get_safe_value($conn,$_POST['meta_keyword']);
    $best_seller=get_safe_value($conn,$_POST['best_seller']);
    


    $res = mysqli_query($conn,"SELECT * FROM product where name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        if (isset($_GET['id']) && $_GET['id']!='') {
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id'])
            {

            }
            else
            {
                $msg='Product already exists';
            }
        }
        else
        {
            $msg='Product already exists';
        }
    }

    if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formats";
    }

    if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
                
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller' where id='$id'";
			}else{
                
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller' where id='$id'";
			}
			mysqli_query($conn,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($conn,"INSERT into product(categories_id,name,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status,best_seller) values('$categories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$best_seller')");
            echo $categories_id, $name, $mrp,$price,$qty,$image,$short_desc,$description,$meta_title,$meta_desc,$meta_keyword;
		}
        ?>
		<script>
            window.location.href="product.php";
        </script>
		<?php
	}
}

?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Product</strong><small> Form</small></div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="categories" class="form-control-label">Categories</label>
                            <select class="form-control" name="categories_id">
                                <option>Select Category</option>
                                <?php
                                $res=mysqli_query($conn,"SELECT id,categories FROM categories ORDER BY categories ASC");
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    if($row['id']==$categories_id)
                                    {
                                    echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                    else
                                    {
                                    echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="form-control-label">Product Name</label>
                            <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name ?>">
                        </div>
                        <div class="form-group">
                            <label for="best_seller" class="form-control-label">Best Seller</label>
                            <select class="form-control" name="best_seller" required>
                                <option value="">Select</option>
                                <?php
                                if ($best_seller==1) {
                                    echo '<option value="1" selected>Yes</option>
                                          <option value="0">No</option>';
                                }elseif($best_seller==0){
                                    echo '<option value="1">Yes</option>
                                          <option value="0" selected>No</option>';
                                }else{
                                    echo '<option value="1">Yes</option>
                                          <option value="0">No</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mrp" class="form-control-label">MRP</label>
                            <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price ?>">
                        </div>
                        <div class="form-group">
                            <label for="qty" class="form-control-label">Qty </label>
                            <input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty ?>">
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-control-label">Image </label>
                            <input type="file" name="image" class="form-control" value="<?php echo $img?>" <?php echo $image_required ?>>
                        </div>
                        <div class="form-group">
                            <label for="short_desc" class="form-control-label">Short Description </label>
                            <textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description </label>
                            <textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_title" class="form-control-label">Meta Title </label>
                            <textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_desc" class="form-control-label">Meta Description </label>
                            <textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword" class="form-control-label">Meta Keyword</label>
                            <textarea name="meta_keyword" placeholder="Enter meta keyword" class="form-control" ><?php echo $meta_keyword ?></textarea>
                        </div>
                        <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
                        </button>
                    <div class="field_error"><?php echo $msg?></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('footer.inc.php') ?>
