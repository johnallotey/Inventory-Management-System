<?php
include("gen.php");
$cmd=get_datan("cmd");
switch($cmd) {
	case 1:
		add_product();
		break;
	case 2:
		get_products();
		break;
	case 3:
		delete_product();
		break;
	case 4:
		update_product();
		break;
	
	default:
	echo "{\"result\":0,\"message\":\"unknown action\"}";
	break;
}

function add_product(){
	$name = get_data("name");
	$description = get_data("description");
	$quantity = get_datan("quantity");
	$price = get_datan("price");
	$weight = get_data("w");
	$wu = get_data("wu");
	$length = get_data("l");
	$lu = get_data("lu");
	$nature = get_data("n");
	$volume = get_data("v");
	$vu = get_data("vu");
	
	include_once("products.php");
	
	$f = new products();
	
	if (!$f->add_product($name,$description,$quantity,$price,$weight,$wu,$length,$lu,$nature,$volume,$vu)){
		echo "{\"result\":0,\"message\":\"product cannot be added\"}";
		return;
	}
	echo "{\"result\":1,\"message\":\"product successfully added\"}";
	}
	
function get_products(){
	include_once("products.php");
	$f = new products();
	$f->get_all_product();
	$row=$f->fetch();
	if (!$row){
		echo "{\"result\":0,\"message\":\"product cannot be retrieved\"}";
		return;
	}
	echo "{";
		echo jsonn("result",1).",";
	echo '"products":';
	$s=Array();
	do{
		array_push($s,$row);
		$row=$f->fetch();
	}while($row);
	print_r(json_encode($s));
	echo "}";
}

function delete_product(){
	$pid = get_datan("product_id");
	include_once("products.php");
	$f = new products();
	
	if (!$f->delete_product($pid)){
		echo "{\"result\":0,\"message\":\"product cannot be deleted\"}";
		return;
	}
	echo "{\"result\":1,\"message\":\"product successfully deleted\"}";
	}

function update_product(){
	$pid = get_datan("pid");
	$name = get_data("name");
	$desc = get_data("description");
	$qty = get_datan("quantity");
	$price = get_datan("price"); 
	$weight = get_data("w");
	$wu = get_data("wu");
	$length = get_data("l");
	$lu = get_data("lu");
	$nature = get_data("n");
	$volume = get_data("v");
	$vu = get_data("vu");
	
	include_once("products.php");
	$f = new products();
	
	if (!$f->update_product($pid,$name,$desc,$qty,$price,$weight,$wu,$length,$lu,$nature,$volume,$vu)){
		echo "{\"result\":0,\"message\":\"product cannot be updated\"}";
		return;
	}
	echo "{\"result\":1,\"message\":\"product successfully updated\"}";
}
?>