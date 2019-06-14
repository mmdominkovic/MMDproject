<?php
include 'includes/connect.php';

	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #121618; ">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  	<div id="main">
	    <span style="font-size:30px;cursor:pointer " onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	        <div class="container" style="margin-right: 900px;">
		         <a class="fa fa-sign-out" class="navbar-brand" href="logout.php"><i c></i> Logout</a>
           </div>
	       </nav>
  	   <a href="admin-page.php">Food Menu</a>
       <a href="all-orders.php">Orders</a>
       <a href="users.php">Users</a>
       <a href="admin-details.php">About me</a>
  
      </div>
</div>
<!-- START CONTENT -->
<section class="content"id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 id="breadcrumbs-title" class="breadcrumbs-title">Food Menu</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Add, Edit or Remove Menu Items.</p>
  <div class="divider"></div>
  <form class="formValidate" id="formValidate" method="post" action="routers/menu-router.php" novalidate="novalidate">
  <div class="row" style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">

      <div class="col s12 m4 l3">
        <h4 class="header">Food items: </h4>
      </div>
      <div>
        <table role="table" id="data-table-admin" class="table table-striped table-bordered table-sm" width="100%" cellspacing="0">
            <thead role="rowgroup">
              <tr role="row">
                <th class="th-sm" role="columnheader">Name</th>
                <th class="th-sm" role="columnheader">Price</th>
                <th class="th-sm" role="columnheader">Available</th>
              </tr>
            </thead>

            <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM items");
        while($row = mysqli_fetch_array($result))
        {
            echo '<tr><td><div class="input-field col s12"><label for="'.$row["id"].'_name">Name</label>';
            echo '<input value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text"></td>';					
            echo '<td><div class="input-field col s12 "><label for="'.$row["id"].'_price">Price</label>';
            echo '<input value="'.$row["price"].'" id="'.$row["id"].'_price" name="'.$row['id'].'_price" type="number"></td>';                   
            echo '<td>';
            if($row['deleted'] == 0){
                $text1 = 'selected';
                $text2 = '';
            }
            else{
                $text1 = '';
                $text2 = 'selected';						
            }
            echo '<select name="'.$row['id'].'_hide">
              <option value="1"'.$text1.'>Available</option>
              <option value="2"'.$text2.'>Not Available</option>
            </select></td></tr>';
        }
        ?>
            </tbody>
</table>
      </div>
      <div class="input-field col s12">
                      <button class="btn btn-success btn-lg btn-block" type="submit" name="action">Modify<i class="fa fa-paper-plane-o" aria-hidden="true"></i>

                      </button>
                    </div>
    </div>
    </form>
  <form class="formValidate" id="formValidate1" method="post" action="routers/add-item.php" novalidate="novalidate">
  <div class="row" style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">
      <div class="col s12 m4 l3">
        <h4 class="header">Add Item</h4>
      </div>
      <div>
<table>
            <thead>
              <tr>
                <th class="th-sm" data-field="id"></th>
                <th class="th-sm" data-field="name"></th>
              </tr>
            </thead>

            <tbody>
        <?php
            echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
            echo '<input id="name" name="name" type="text"></td>';					
            echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';
            echo '<input id="price" name="price" type="number"></td>';                   
            echo '<td></tr>';
        ?>
            </tbody>
</table>
      </div>
      <div class="input-field col s12">
                      <button class="btn btn-success btn-lg btn-block" type="submit" name="action">Add<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        
                      </button>
                    </div>
    </div>
    </form>			
    <br>
    <div class="divider"></div>
    <!-- Footer -->
<footer class="page-footer font-small blue">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
  <p>Marija Magdalena Dominkovic</p>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
  </div>
</div>
</div>
      </div>
<!--end container-->

</section>
<!-- END CONTENT -->


<script type="text/javascript" src="js/mainjs.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>