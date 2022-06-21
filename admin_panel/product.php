<?php require('../php/db.php'); ?>
<?php include "../php/component.php"; ?>

<?php

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($connection,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($connection,$_GET['operation']);
		$id=get_safe_value($connection,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($connection,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($connection,$_GET['id']);
		$delete_sql="delete from producttb where id='$id'";
		mysqli_query($connection,$delete_sql);
	}
}

$sql="select producttb.*,categories.cat_name from producttb,categories where producttb.categories_id=categories.id order by producttb.id desc";
$res=mysqli_query($connection,$sql);
?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" > Categories</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="product.php" > Product</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" > contact us</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="User.php" > users</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="index.html"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="../php/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a class="btn btn-success btn-sm" href="manage_product.php">Add Product</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>NAME</th>
							   <th>CATEGORIE</th>
							   <th>Image</th>
							   <th>PRICE</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['product_name']?></td>
							   <td><?php echo $row['cat_name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['product_img']?>"/></td>
							   <td><?php echo $row['product_price']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a class='btn btn-warning btn-sm' href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a class='btn btn-danger btn-sm' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>