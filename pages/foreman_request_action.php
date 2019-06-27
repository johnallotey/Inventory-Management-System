<?php
include("gen.php");
$cmd=get_datan("cmd");
switch($cmd) {
	case 1:
		add_request();
		break;
	case 2:
		get_requests();
		break;
	case 3:
		update_request();
		break;
	case 4:
		get_request_by_userid();
		break;
	
	default:
	echo "{\"result\":0,\"message\":\"unknown action\"}";
	break;
}

function add_request(){
	$p1 = get_datan("p1");
	$p1q = get_datan("q1");
	$p2 = get_datan("p2");
	$p2q = get_datan("q2");
	$p3 = get_datan("p3");
	$p3q = get_datan("q3");
	$p4 = get_datan("p4");
	$p4q = get_datan("q4");
	$p5 = get_datan("p5");
	$p5q = get_datan("q5");
	$user_id = get_datan("uid");
	$location = get_data("loc");
	$status = "New Request";
	
	include_once("foreman_request.php");
	
	$f = new foreman_request();
	
	if (!$f->add_request($p1,$p1q,$p2,$p2q,$p3,$p3q,$p4,$p4q,$p5,$p5q,$user_id,$location,$status)){
		echo "{\"result\":0,\"message\":\"request cannot be made\"}";
		return;
	}
	echo "{\"result\":1,\"message\":\"request successfully made\"}";
	}
	
function get_requests(){
	include_once("foreman_request.php");
	$f = new foreman_request();
	$f->get_all_request();
	$row=$f->fetch();
	if (!$row){
		echo "{\"result\":0,\"message\":\"request cannot be retrieved\"}";
		return;
	}
	echo "{";
		echo jsonn("result",1).",";
	echo '"requests":';
	$s=Array();
	do{
		array_push($s,$row);
		$row=$f->fetch();
	}while($row);
	print_r(json_encode($s));
	echo "}";
}


function update_request(){
	$rid = get_datan("rid");
	$status = get_data("st");
	$newStatus;
	if($status == "New Request"){
		$newStatus="Confirmed";
	}
	if($status == "Confirmed"){
		$newStatus="Processed";
	}
	if($status == "Processed"){
		$newStatus="Disbursed";
	}
	if($status == "Disbursed"){
		$newStatus="Delivered";
	}
	if($status == "Delivered"){
		$newStatus="Delivered";
	}
	
	include_once("foreman_request.php");
	$f = new foreman_request();
	
	if (!$f->update_request_status($rid,$newStatus)){
		echo "{\"result\":0,\"message\":\"request status cannot be updated\"}";
		return;
	}
	echo "{\"result\":1,\"message\":\"request status successfully updated\"}";
}

function get_request_by_userid(){
	$uid = get_datan("uid");
	include_once("foreman_request.php");
	$f = new foreman_request();
	$f->get_request($uid);
	$row=$f->fetch();
	if (!$row){
		echo "{\"result\":0,\"message\":\"request cannot be retrieved\"}";
		return;
	}
	echo "{";
		echo jsonn("result",1).",";
	echo '"requests":';
	$s=Array();
	do{
		array_push($s,$row);
		$row=$f->fetch();
	}while($row);
	print_r(json_encode($s));
	echo "}";
}
?>