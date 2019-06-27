//makes a synchronous call to the page u and return the result as object
				function syncAjax(u){
						var obj=$.ajax(
							{url:u,
							 async:false
							 }
						);
						console.log(obj.responseText)
						return $.parseJSON(obj.responseText);	
				}
				
function displayRequests(){
	var u ="foreman_request_action.php?cmd=2";
	var objResult = syncAjax(u);
	
	var requests="<div class='table-responsive'><table class='table table-hover' style='width:100%'><tr><th>Date</th><th>Foreman</th><th>Location</th><th>Item 1</th><th>qty</th><th>Item 2</th><th>qty</th><th>Item 3</th><th>qty</th><th>Item 4</th><th>qty</th><th>Item 5</th><th>qty</th><th>Status</th><th></th></tr>"
	for(var i=0;i<objResult.requests.length;i++){
		var status=objResult.requests[i].status;
		requests +="<tr><td>"+objResult.requests[i].date+"</td><td>"
		+objResult.requests[i].user_name+"<td>"+objResult.requests[i].user_location+"</td><td>"
		+objResult.requests[i].p1+"<td>"+objResult.requests[i].q1+"</td><td>"
		+objResult.requests[i].p2+"<td>"+objResult.requests[i].q2+"</td><td>"
		+objResult.requests[i].p3+"<td>"+objResult.requests[i].q3+"</td><td>"
		+objResult.requests[i].p4+"<td>"+objResult.requests[i].q4+"</td><td>"
		+objResult.requests[i].p5+"<td>"+objResult.requests[i].q5+"</td><td>"
		+status+"</td><td><a class='btn btn-success' role='button' onclick='changeStatus(\"" +objResult.requests[i].request_id+ "\",\"" + status + "\")'>Update Status</a></td></tr>";
	}
	
	requests +="</table></div>";
	document.getElementById("requests").innerHTML=requests;
}

function changeStatus(id,st){
	console.log(st);
	
	var u ="foreman_request_action.php?cmd=3&rid="+id+"&st="+st;
	var objResult = syncAjax(u);
	console.log(objResult);
	if(objResult.result == 1){
		$("#status").val("request status has been successfully updated");
		displayRequests();
		return;
	}
	
}


function displayForm(){
	var u ="product_action.php?cmd=2";
	var objResult = syncAjax(u);
	
	var products="<table class='table' style='width:100%'>";
	products +="<tr><td>Item 1</td>";
	products +="<td><select class='form-control' id='p1'>";
	for(var i=0;i<objResult.products.length;i++){
	products +="<option value='"+objResult.products[i].pid+"'>"+objResult.products[i].product_name+"</option>";
	}
	products +="</select></td>";
	products +="<td></td>";
	products +="<td><select class='form-control' id='q1'>";
	for(var i=1;i<=20;i++){
	products +="<option value='"+i+"'>"+i+"</option>";
	}
	products +="</select></td></tr>";
	
	products +="<tr><td>Item 2</td>";
	products +="<td><select class='form-control' id='p2'>";
	for(var i=0;i<objResult.products.length;i++){
	products +="<option value='"+objResult.products[i].pid+"'>"+objResult.products[i].product_name+"</option>";
	}
	products +="</select></td>";
	products +="<td></td>";
	products +="<td><select class='form-control' id='q2'>";
	for(var i=1;i<=20;i++){
	products +="<option value='"+i+"'>"+i+"</option>";
	}
	products +="</select></td></tr>";
	
	products +="<tr><td>Item 3</td>";
	products +="<td><select class='form-control' id='p3'>";
	for(var i=0;i<objResult.products.length;i++){
	products +="<option value='"+objResult.products[i].pid+"'>"+objResult.products[i].product_name+"</option>";
	}
	products +="</select></td>";
	products +="<td></td>";
	products +="<td><select class='form-control' id='q3'>";
	for(var i=1;i<=20;i++){
	products +="<option value='"+i+"'>"+i+"</option>";
	}
	products +="</select></td></tr>";
	
	products +="<tr><td>Item 4</td>";
	products +="<td><select class='form-control' id='p4'>";
	for(var i=0;i<objResult.products.length;i++){
	products +="<option value='"+objResult.products[i].pid+"'>"+objResult.products[i].product_name+"</option>";
	}
	products +="</select></td>";
	products +="<td></td>";
	products +="<td><select class='form-control' id='q4'>";
	for(var i=1;i<=20;i++){
	products +="<option value='"+i+"'>"+i+"</option>";
	}
	products +="</select></td></tr>";
	
	products +="<tr><td>Item 5</td>";
	products +="<td><select class='form-control' id='p5'>";
	for(var i=0;i<objResult.products.length;i++){
	products +="<option value='"+objResult.products[i].pid+"'>"+objResult.products[i].product_name+"</option>";
	}
	products +="</select></td>";
	products +="<td></td>";
	products +="<td><select class='form-control' id='q5'>";
	for(var i=1;i<=20;i++){
	products +="<option value='"+i+"'>"+i+"</option>";
	}
	products +="</select></td></tr>";

	products +="</table>";
	
	products +="<div>Location<input type='text' class='form-control' id='myLocation' readonly></div>";
	
	products +="<button onclick='sendRequest()'>Send Request</button>";
	
	document.getElementById("formMakeRequest").innerHTML=products;
}

function sendRequest(){
	var p1 = $("#p1").prop("value");
	var q1 = $("#q1").prop("value");
	var p2 = $("#p2").prop("value");
	var q2 = $("#q2").prop("value");
	var p3 = $("#p3").prop("value");
	var q3 = $("#q3").prop("value");
	var p4 = $("#p4").prop("value");
	var q4 = $("#q4").prop("value");
	var p5 = $("#p5").prop("value");
	var q5 = $("#q5").prop("value");
	var loc = $("#myLocation").prop("value");
	var uid = 1;
	
	var u ="foreman_request_action.php?cmd=1&p1="+p1+"&q1="+q1+"&p2="+p2+"&q2="+q2+"&p3="+p3+"&q3="+q3+"&p4="+p4+"&q4="+q4+"&p5="+p5+"&q5="+q5+"&loc="+loc+"&uid="+uid;
	var objResult = syncAjax(u);
	console.log(objResult);
	if(objResult.result == 1){
		$("#status").val("Product has been successfully updated");
		return;
	}
}

function viewRequests(){
	var uid=1;
	var u ="foreman_request_action.php?cmd=4&uid="+uid;
	console.log(u);
	var objResult = syncAjax(u);
	$('#myList').empty();
	for(var i=0;i<objResult.requests.length;i++){
		var parent = document.getElementById("myList");
		var listItem = document.createElement('li');
		listItem.setAttribute('id','listitem');
		
		var date = objResult.requests[i].date;
		var location = objResult.requests[i].user_location;
		var status = objResult.requests[i].status;
		var msg;
		if(status=="New Request"){
			msg ="Hello there, Your Request has been submitted";
		}
		else if (status=="Confirmed"){
			msg ="Hello there, Your Request has been confirmed and will be processed as soon as possible";
		}
		else if (status=="Processed"){
			msg ="Hello there, Your Request is been processed and will be sent to you as soon as possible";
		}
		else if (status=="Disbursed"){
			msg ="Hello there, Your Request has been processed, items are currently been sent to the site";
		}
		else if (status=="Delivered"){
			msg ="Hello there, Your Request has been delivered to the site";
		}
		else{
			return;
		}
		
		listItem.innerHTML="<h3>"+location+" - "+date+"</h3><p>"+msg+"</p>";
		parent.appendChild(listItem);
		var list = document.getElementById('myList');
		$(list).listview().listview("refresh");
		
	}
}
