<?php
	
	include_once ("adb.php");
	
	class products extends adb{
		
		function products(){
			adb::adb();
		} 
		
		function add_product($product_name,$product_description,$quantity,$price,$weight,$wu,$length,$lu,$nature,$volume,$vu){
			$query = "INSERT INTO `product`(`product_name`, `product_description`, `product_quantity`, `Weight`,
					`weight_units`, `Length`, `length_units`, `Nature`, `Volume`, `volume_units`, `product_price`)
					VALUES ('$product_name','$product_description','$quantity','$weight','$wu','$length','$lu','$nature','$volume','$vu','$price')";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		
		function get_all_product(){
			$query = "SELECT * FROM `product`";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		function get_single_product($product_id){
			$query = "SELECT * FROM `product` WHERE pid=$product_id"; 
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		
		function delete_product($product_id){
			$query = "DELETE FROM `product` WHERE pid=$product_id";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		
		function update_product($product_id,$name,$description,$quantity,$price,$volume,$vu,$wu,$lu){
			$query = "UPDATE `product` SET `product_name`='$name',`product_description`='$description',`product_quantity`='$quantity',
						`product_price`='$price' `Volume`='$volume',`volume_units`,'$vu',`weight_unts`='$wu',`length_units`='$lu', WHERE pid=$product_id";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
	}

?>