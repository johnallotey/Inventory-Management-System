<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BlessesField Ltd</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<script src="gen.js"></script>
	<script src="myproduct.js"></script>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">BlessedField</a>
            </div>
            <!-- /.navbar-header -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="product_list.php"><i class="fa fa-table fa-fw"></i> Product List</a>
                        </li>
                        <li>
                            <a href="new_product.php"><i class="fa fa-edit fa-fw"></i> New Inventory</a>
                        </li>
						<li>
                            <a href="request_list.php"><i class="fa fa-envelope fa-fw"></i> Foreman Request</a>
                        </li>
						<li>
                            <a href=""><i class="fa fa-sitemap fa-fw"></i> Manage User</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill the form to add a new product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<form class="form">
                                    <div class="form-group">
						  <label for="name">Product Name:</label>
						  <input type="text" class="form-control" id="name" placeholder="">
						</div>
						<div class="form-group">
						  <label for="description">Product Description:</label>
						  <input type="text" class="form-control" id="description" placeholder="">
						</div>
						<div class="form-group">
						  <label for="quantity">Quantity:</label>
						  <input type="text" class="form-control" id="quantity" placeholder="">
						</div>
						<div class="form-group">
						  <label for="quantity">Weight per unit:</label>
						  <input type="text" class="form-control" id="weight" placeholder="">
						  <select class="form-control" id="weightUnit">
							<option value="KG">KG</option>
							<option value="MG">MG</option>
							<option value="G">G</option>
							<option value="POUND">POUND</option>
							<option value="TONNES">TONNES</option>
						  </select>
						</div>
						<div class="form-group">
						  <label for="quantity">Length per unit:</label>
						  <input type="text" class="form-control" id="length" placeholder="">
						  <select class="form-control" id="lengthUnit">
							<option value="M">M</option>
							<option value="MM">MM</option>
							<option value="CM">CM</option>
							<option value="DM">DM</option>
							<option value="FT">FOOT</option>
							<option value="IN">INCH</option>
						  </select>
						</div>
						<div class="form-group">
						  <label for="quantity">Volume per unit:</label>
						  <input type="text" class="form-control" id="volume" placeholder="">
						  <select class="form-control" id="volumeUnit">
							<option value="M3">M3</option>
							<option value="MM3">MM3</option>
							<option value="CM3">CM3</option>
							<option value="DM3">DM3</option>
							<option value="FT3">FT3</option>
							<option value="IN3">IN3</option>
							<option value="OUNCE">OUNCE</option>
							<option value="GALLON">GALLON</option>
						  </select>
						</div>
						<div class="form-group">
						  <label for="quantity">Nature of product:</label>
						  <select class="form-control" id="nature">
							<option value="Manufactured Product">Manufactured Product</option>
							<option value="Raw Material">Raw Material</option>
						  </select>
						</div>
						<div class="form-group">
						  <label for="price">Price per unit:</label>
						  <input type="text" class="form-control" id="price" placeholder="">
						</div>
						
					</form>
					<button type="submit" onclick="addProduct();">ADD Product</button>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
