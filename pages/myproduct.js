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
				
				function addProduct(){
	var pname = $("#name").prop("value");
	var pdesc = $("#description").prop("value");
	var pqty = $("#quantity").prop("value");
	var pprice = $("#price").prop("value");
	
	var w = $("#weight").prop("value");
	var wu = $("#weightUnit").prop("value");
	var l = $("#length").prop("value");
	var lu = $("#lengthUnit").prop("value");
	
	var n = $("#nature").prop("value");
	var v = $("#volume").prop("value");
	var vu = $("#volumeUnit").prop("value");
	
	
	var u ="product_action.php?cmd=1&name="+pname+"&description="+pdesc+"&quantity="+pqty+"&price="+pprice+"&w="+w+"&wu="+wu+"&l="+l+"&lu="+lu+"&n="+n+"&v="+v+"&vu="+vu;
	//console.log(u);
	var objResult = syncAjax(u);
	console.log(objResult);
	if(objResult.result == 1){
		$("#status").val("Product has been added successfully");
		return;
	}
}

function updateProduct(){
	var pname = $("#name").prop("value");
	var pdesc = $("#description").prop("value");
	var pqty = $("#quantity").prop("value");
	var pprice = $("#price").prop("value");
	
	var w = $("#weight").prop("value");
	var wu = $("#weightUnit").prop("value");
	var l = $("#length").prop("value");
	var lu = $("#lengthUnit").prop("value");
	
	var n = $("#nature").prop("value");
	var v = $("#volume").prop("value");
	var vu = $("#volumeUnit").prop("value");
	
	
	var u ="product_action.php?cmd=1&name="+pname+"&description="+pdesc+"&quantity="+pqty+"&price="+pprice+"&w="+w+"&wu="+wu+"&l="+l+"&lu="+lu+"&n="+n+"&v="+v+"&vu="+vu;
	//console.log(u);
	var objResult = syncAjax(u);
	console.log(objResult);
	if(objResult.result == 1){
		$("#status").val("Product has been successfully updated");
		return;
	}
}

function displayProducts(){
	var u ="product_action.php?cmd=2";
	var objResult = syncAjax(u);
	
	var products="<div class='table-responsive'><table class='table table-hover' style='width:100%'><tr><th>Product Name</th><th>Description</th><th>Quantity</th><th>unit price</th><th></th><th></th><th></th></tr>"
	for(var i=0;i<objResult.products.length;i++){
		products +="<tr><td>"+objResult.products[i].product_name+"</td><td>"
		+objResult.products[i].product_description+"<td>"+objResult.products[i].product_quantity+"</td><td>"
		+objResult.products[i].product_price+"</td><td><a class='btn btn-success' role='button' onclick='viewdetails(this,"+objResult.products[i].pid+",event)'>view details</a></td><td><a class='btn btn-primary' role='button' onclick='modifyproduct(this,"+objResult.products[i].pid+",event)'>modify</a></td><td><a class='btn btn-danger' role='button' onclick='deleteproduct(this,"+objResult.products[i].pid+",event)'>delete</a></td></tr>";
	}
	products +="</table></div>";
	document.getElementById("products").innerHTML=products;
}

function viewdetails(obj,id,event){
	document.getElementById("myModal").style.display='block';
}

function modifyproduct(){
	
}

function deleteproduct(obj,id,event){
	var u ="product_action.php?cmd=3&product_id="+id;
	objResult = syncAjax(u);
	if (objResult.result==1){
		displayProducts();
	}
	else{
		return;
	}
}