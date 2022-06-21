<?php 
require_once('./php/component.php');
require('add_to_cart.php');

$cat_res=mysqli_query($connection,"SELECT * from categories where status=1 order by cat_name asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <title>World of style</title>
</head>
<body >
    
<nav class="navbar navbar-expand-sm navbar-dark bg-black mb-5 fixed-top">
        <div class="container">
          <a href="#" class="navbar-brand">Time Value</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="index.php"class="nav-link">Home</a>
              </li>
              <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <?php 
                foreach($cat_arr as $list){
              ?>
              <a class="dropdown-item" href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['cat_name'] ?></a>
              <div class="dropdown-divider"></div>
              <?php } ?>
           </div>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">About</a>
              </li>
              <li class="nav-item">
                <a href="contact.php" class="nav-link">Contact</a>
              </li>
              <li class="nav-item">
              <?php 
                if(isset($_SESSION['USER_LOGIN'])){
                  echo ' <a href="logout.php" class="nav-link">LOGOUT</a>';
                }else{
                  echo ' <a href="login.php" class="nav-link">LOGIN</a>';
                }
              ?>
               
              </li>
              <li class="nav-item">
                <a href="cart.php"  class="nav-link text-warning"><i class="fas fa-shopping-cart fa-2x"></i><span id="cart_count" class="cnt"><?php echo $totalProduct?></span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>