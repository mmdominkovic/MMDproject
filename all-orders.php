<?php
include 'includes/connect.php';

	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Pizza Delicious</title>
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

<body style="background-color: #121618;">
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
 <section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
	<div class="row">
	  <div class="col s12 m12 l12">
		<h5 class="breadcrumbs-title">All Orders</h5>
	  </div>
	</div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">List of orders by customers with details</p>
  <div class="divider"></div>
  <!--editableTable-->
<div id="work-collections" class="section">
	 
			<?php
			if(isset($_GET['status'])){
				$status = $_GET['status'];
			}
			else{
				$status = '%';
			}
			$sql = mysqli_query($con, "SELECT * FROM orders WHERE status LIKE '$status';");
			echo '<div class="row" style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">
		<div>
			<h4 class="header">List</h4>
			<ul id="issues-collection" class="list-group list-group-flush" style="background-color: #818181;">';
			while($row = mysqli_fetch_array($sql))
			{
				$status = $row['status'];
				$deleted = $row['deleted'];
				echo '<li class="list-group-item">
				<i class="fa fa-circle" aria-hidden="true"></i>
				<span class="card-header text-center">Order No. '.$row['id'].'</span>
					  <p><strong>Date:</strong> '.$row['date'].'</p>
					  <p><strong>Payment Type:</strong> '.$row['payment_type'].'</p>							  
					  <p><strong>Status:</strong> '.($deleted ? $status : '
					  <form method="post" action="routers/edit-orders.php">
						<input type="hidden" value="'.$row['id'].'" name="id">
						<select name="status">
						<option value="Yet to be delivered" '.($status=='Yet to be delivered' ? 'selected' : '').'>Yet to be delivered</option>
						<option value="Delivered" '.($status=='Delivered' ? 'selected' : '').'>Delivered</option>
						<option value="Cancelled by Admin" '.($status=='Cancelled by Admin' ? 'selected' : '').'>Cancelled by Admin</option>
						<option value="Paused" '.($status=='Paused' ? 'selected' : '').'>Paused</option>
											
						</select>
					  ').'</p>
					  <a href="#" class="secondary-content"><i class="fa fa-star" aria-hidden="true"></i>
					  </a>
					  </li>';
					 
				$order_id = $row['id'];
				$customer_id = $row['customer_id'];
				$sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $order_id;");
				$sql3 = mysqli_query($con, "SELECT * FROM users WHERE id = $customer_id;");
					while($row3 = mysqli_fetch_array($sql3))
					{
					echo '<li class="list-group-item">
					<div class="">
					<p><strong>Name: </strong>'.$row3['name'].'</p>
					<p><strong>Address: </strong>'.$row['address'].'</p>
					'.($row3['contact'] == '' ? '' : '<p><strong>Contact: </strong>'.$row3['contact'].'</p>').'	
					'.($row3['email'] == '' ? '' : '<p><strong>Email: </strong>'.$row3['email'].'</p>').'		
					'.(!empty($row['description']) ? '<p><strong>Note: </strong>'.$row['description'].'</p>' : '').'								
					</li>';							
					}
				while($row1 = mysqli_fetch_array($sql1))
				{
					$item_id = $row1['item_id'];
					$sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
					while($row2 = mysqli_fetch_array($sql2))
						$item_name = $row2['name'];
					echo '<li class="list-group-item">
					<div class="row">
					<div class="col s7">
					<p class="title"><strong>#'.$row1['item_id'].'</strong> '.$item_name.'</p>
					</div>
					<div class="col s2">
					<span>'.$row1['quantity'].' Pieces</span>
					</div>
					<div class="col s3">
					<span>Rs. '.$row1['price'].'</span>
					</div>
					</div>
					</li>';
				}
						echo'<li class="list-group-item">
								<div class="row">
									<div class="col s7">
										<p class="card-footer"> Total</p>
									</div>
									<div class="col s2">
									<span> </span>
									</div>
									<div class="col s3">
										<span><strong>Rs. '.$row['total'].'</strong></span>
									</div>';										
						if(!$deleted){
						echo '<button class="btn btn-dark" type="submit" name="action">Change Status
						<i class="fa fa-times" aria-hidden="true"></i>

								</button>
								</form>';
						}
						echo'</div></li>';
			}
			?>
			</ul>
		</div>
	  </div>
	</div>
</div>

<!--end container-->

</section>
<!-- END CONTENT -->
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