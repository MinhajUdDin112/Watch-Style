<?php require('top.php') ?>

    <header id="bg-img" class="sss pt-5" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(./images/bg.jpg);">
        <div class="overlay" style="height: 52vh;">
            <div class="inner">
            <div class="container text-white ">
                <div class="col-lg-6 col-sm-4 col-md-8 pt-5 text-center ">
                    <h1 class="display-5 text-danger">Enter</h1>
                    <h4 class="text-danger display-5">Our World of style</h4>
                    <p class="txt1 py-1 my-4">Discover a galaxy of authentic products from the leading fashion brands</p>
                    <div class="anc">
                        <?php 
                            foreach($cat_arr as $list){
                        ?>
                            <a class="btn-header btn btn-outline-success m-3" href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['cat_name'] ?></a>
                            <?php } ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </header>

    <section class="services py-5 text-center">
          <div class="container">
              <div class="row">
                  <!--Single Service-->
                  <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
                      <span class="service-icon">
                          <i class="fas fa-globe fa-2x"></i>                            
                      </span>
             <h5 class="font-weight-bold text-uppercase">Worldwide Shipping</h5>
             <p class="text-capitalize">Lorem ipsum dolor sit amet consectetur 
                 adipisicing elit. Ducimus, dicta!</p>
                  </div>
                  <!--end of Service=-->
                  <!--Single Service-->
                  <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
                    <span class="service-icon">
                        <i class="fas fa-stamp fa-2x"></i>                            
                    </span>
           <h5 class="font-weight-bold text-uppercase">Certified by Gurus</h5>
           <p class="text-capitalize">Lorem ipsum dolor sit amet consectetur 
               adipisicing elit. Ducimus, dicta!</p>
                </div>
                <!--end of Service=-->
                <!--Single Service-->
                <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
                    <span class="service-icon">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>                            
                    </span>
           <h5 class="font-weight-bold text-uppercase">30 Days Money Back</h5>
           <p class="text-capitalize">Lorem ipsum dolor sit amet consectetur 
               adipisicing elit. Ducimus, dicta!</p>
                </div>
                <!--end of Service=-->
              </div>
          </div>
      </section>

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
                 $get_product = getdata(6);
                 foreach($get_product as $list){
             ?>
            <div class='col-10 col-sm-6 col-lg-4 mx-auto my-3'>
        <div class='card single-item'>
        <div class='img-container'>
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['product_img'] ?>" class='card-img-top product-img' alt=''>
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

    <?php require('footer.php'); ?>