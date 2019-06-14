<?php
include 'includes/connect.php';
include 'includes/wallet.php';

	if($_SESSION['customer_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Pizza Delicious</title>

<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

 
 
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
         <a href="index.php">Home</a>
			 <a href="orderbag.php">Order food</a>
			 <a href="user-details.php">Edit details</a>
             <a href="orders.php">My orders</a>
      </div>
</div>
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Order</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->		

<!--start container-->
<div class="order-container" style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Order your food here.</p>
  <div class="divider"></div>
  <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
    <div class="row" style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">
    <div>
          <table id="data-table-customer" class="table table-striped table-bordered table-sm" width="100%" cellspacing="0">
            <thead>
              <tr style="font-size: 17px">
                <th class="th-sm">Name</th>
                <th class="th-sm">Price</th>
                <th class="th-sm">Quantity</th>
              </tr>
            </thead>

            <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
        while($row = mysqli_fetch_array($result))
        {
            echo '<tr><td>'.$row["name"].'</td><td>'.$row["price"].'</td>';                      
            echo '<td><div class="input-field col s12"><label for='.$row["id"].'>Quantity</label>';
            echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="number"></td></tr>';
        } ?>
        </tbody>
        </table>
      </div>
      <div>
        <div class="input-field col s12">
  <button class="btn btn-danger btn-primary btn-lg btn-block" type="submit" name="action">Order
    <i class="fa fa-paper-plane" aria-hidden="true"></i>
  </button>
      </div>
      </div>   
    </form>
    <div class="divider"></div>
    
  </div>
</div>
<!--end container-->

</section>
<div class="divider"></div>
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
			header("location:mojindex.php");
		}
	}
?>