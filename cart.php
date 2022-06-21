<?php
require ('top.php');

$total = 0;
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>

<section class="">
<div class="container-fluid my-5 pt-5">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
                
                <?php
				if(isset($_SESSION['cart'])){
				foreach($_SESSION['cart'] as $key=>$val){
				$productArr=getdata('','',$key);
				$pname=$productArr[0]['product_name'];
				$price=$productArr[0]['product_price'];
				$image=$productArr[0]['product_img'];
                $total = $total + (int)$productArr[0]['product_price'];
				?>
				<div class="border rounded mb-2 container">
                    <div class="row bg-white">
                        <div class="col-md-3 pl-0">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="Image1" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h5 class="pt-2"><?php echo $pname?></h5>
                            <small class="text-secondary">Seller: dailytuition</small>
                            <h5 class="pt-2"><?php echo $price?></h5>
                            <button type="submit" class="btn btn-warning">Save for Later</button>
                            <a class="btn btn-danger btn-sm w-25" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash"></i></a>
                        </div>
                        <div class="col-md-3 py-5">
                            <div>
                                <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                <input type="text" value="1" class="form-control w-25 d-inline">
                                <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
				<?php } } ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>


        <script>
    
    function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href='cart.php';
			}
			jQuery('.cnt').html(result);
		}	
	});	
}

    </script>

<?php require('footer.php') ?>
