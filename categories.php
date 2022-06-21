<?php require('top.php');

$cat_id = mysqli_real_escape_string($connection,$_GET['id']);

?>


<header class="head-img img-fluid" style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(./images/baner2.jpg);">
    <div class="container">
        <h2 class="text-white display-4 mt-5 text-uppercase pt-5">luxury watches</h2>
        <p class="text-white h3 text-uppercase pt-1">the time is now</p>
    </div>
</header>

<!-- Product section -->
<section id="products" class="products py-5">
        <div class="container">
            <!-- section title -->
            <div class="row">
                <div class="col-10 mx-auto col-sm-6 text-center">
                    <h1 class="text-capitalize product-title">Featured Products</h1>
                </div>
            </div>
            <div class="row product-items" id="product-items">
            <?php
                 $get_product = getdata('',$cat_id,'');
                 foreach($get_product as $list){
             ?>
            <div class='col-10 col-sm-6 col-lg-4 mx-auto my-3'>
        <div class='card single-item'>
        <div class='img-container'>
            <a href="product.php?id=<?php echo $list['id']?>">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['product_img'] ?>" class='img-fluid card-img-top product-img' alt=''>
            </a>
        </div>
        <div class='card-body'>
            <div class='card-text d-flex justify-content-between text-capitalize'>
            <h5 id='item-name'> <?php echo $list['product_name']; ?></h5>
            <span><i class='fas fa-dollar-sign'></i><?php echo $list['product_price']; ?></span>
            </div>
            <a href="javascript:void(0)" onclick="manage_cart(<?php echo $list['id'] ?>,'add')"  class='btn btn-warning my-3 cart-btn'>Add <i class="fa fa-shopping-bag"></i></a>
        </div>
        </div>
    </div>
        <?php } ?>
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