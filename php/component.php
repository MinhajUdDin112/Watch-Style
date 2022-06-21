<?php include "db.php" ?>

<?php 

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}


    function getdata($limit='',$cat_id='',$productid=''){
        global $connection;
        $query = "SELECT * FROM producttb ";

        if($cat_id !=''){
            $query.="WHERE categories_id = $cat_id ";
        }

        if($productid !=''){
            $query.="where id = $productid ";
        }

        if($limit !=''){
            $query.=" limit $limit";
        }

        $result = mysqli_query($connection, $query);
    
        $data =array();
        while($row=mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function get_safe_value($connection,$str){
        if($str!=''){
            return mysqli_real_escape_string($connection,$str);
        }
    }

  

?>

