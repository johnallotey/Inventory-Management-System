<?php
	
	include_once ("adb.php");
	
	class foreman_request extends adb{
		
		function foreman_request(){
			adb::adb();
		} 
		
		function add_request($p1,$p1_qty,$p2,$p2_qty,$p3,$p3_qty,$p4,$p4_qty,$p5,$p5_qty,$uid,$ul,$st){
			$query = "INSERT INTO `request`( `product1_id`, `product1_qty`, `product2_id`, `product2_qty`, `product3_id`,
						`product3_qty`, `product4_id`, `product4_qty`, `product5_id`, `product5_qty`, `user_id`, `user_location`, `status`)
						VALUES ('$p1','$p1_qty','$p2','$p2_qty','$p3','$p3_qty','$p4','$p4_qty','$p5','$p5_qty','$uid','$ul','$st')";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		
		function get_all_request(){
			$query = "select request_id,a.product_name as p1,product1_qty as q1,b.product_name as p2,product2_qty as q2,
						c.product_name as p3,product3_qty as q3,d.product_name as p4,product4_qty as q4, 
						e.product_name as p5,product5_qty as q5, u.user_name as user_name,user_location,date,status from request r 
						left join product a on r.product1_id= a.pid 
						left join product b on r.product2_id= b.pid  
						left join product c on r.product3_id= c.pid
						left join product d on r.product4_id= d.pid
						left join product e on r.product5_id= e.pid
						left join users u on r.user_id=u.uid
						group by a.pid,b.pid,c.pid,d.pid,e.pid";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		function get_request($uid){
			$query = "SELECT date,user_location,status FROM `request` WHERE user_id=$uid group by date desc"; 
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
		
		
		function update_request_status($rid,$status){
			$query = "UPDATE `request` SET `status`='$status' WHERE request_id=$rid";
			if (!$this->query($query)){
				return false;
			}
			else{
				return true;
			}
		}
	}

?>