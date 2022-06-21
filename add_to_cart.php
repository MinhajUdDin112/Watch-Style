<?php 

class add_to_cart{
    function addproduct($pid){
        $_SESSION['cart'][$pid]='yes';
    }

    function updateproduct($pid){
        if(isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid];
        }
    }

    function removeproduct($pid){
        if(isset($_SESSION['cart'][$pid])){
           unset($_SESSION['cart'][$pid]);
        }
    }

    function emptyproduct(){
        unset($_SESSION['cart']);
    }

    function totalProduct(){
		if(isset($_SESSION['cart'])){
			return count($_SESSION['cart']);
		}else{
			return 0;
		}
		
	}

}

?>