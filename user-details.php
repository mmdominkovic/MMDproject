<?php
include 'includes/connect.php';
$user_id = $_SESSION['user_id'];

$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
$name = $row['name'];	
$address = $row['address'];
$contact = $row['contact'];
$email = $row['email'];
$username = $row['username'];
}
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 
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
<!-- START CONTENT -->
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
    <div class="row" >
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">User Details</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Edit your details here which are required for delivery and contact.</p>
  <div class="divider"></div>
    <div class="row" style=" margin-bottom: 0;margin-left: -0.75rem; margin-right: -0.75rem;flex-direction: row;display: block;">
      <div class=" col" style=" flex-basis: auto;">
        <h4 class="header">Details</h4>
      </div>
<div>
        <div class="card-panel">
          <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem; box-sizing: inherit; display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
            <form class="formValidate" id="formValidate" method="post" action="routers/details-router.php" novalidate="novalidate"class="col s12">
            <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem; box-sizing: inherit; display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="input-field col s12">
                  <i class="fa fa-user"></i><label for="username" >Username</label>
                  <input class="form-control"style="" name="username" id="username" type="text" value="<?php echo $username;?>">
                </div>
              </div>					
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="input-field col s12">
                <i class="fa fa-user"></i><label for="name" class="">Name</label>
                  <input class="form-control" name="name" id="name" type="text" value="<?php echo $name;?>">
                </div>
              </div>
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="input-field col s12">
                <i class="fa fa-envelope" aria-hidden="true"></i><label for="email" class="">Email</label>
                  <input class="form-control"name="email" id="email" type="email" value="<?php echo $email;?>">
                </div>
              </div>
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="input-field col s12">
                <i class="fa fa-lock" aria-hidden="true"></i> <label for="password" class="">Password</label>
                  <input value="" class="form-control" name="password" id="password" type="password">
                  <input type="checkbox" onclick="Toggle()">Show Password
                </div>
              </div>
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="input-field col s12">
                <i class="fa fa-user"></i>  <label for="phone" class="">Contact</label>
                  <input class="form-control" name="phone" id="phone" type="number" value="<?php echo $contact;?>">
                </div>
              </div>					  
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="input-field col s12">
                <i class="fa fa-home" aria-hidden="true"></i> <label for="address" class="">Address</label>
                  <textarea class="form-control" name="address" id="address" class="materialize-textarea validate" ><?php echo $address;?></textarea>
                </div>
                <br>
                <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                  <div class="input-field col s12">
                    <button style="cursor: pointer;display: inline-block; overflow: hidden;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle; z-index: 1; will-change: opacity, transform;text-decoration: none;color: #fff;     text-align: center;letter-spacing: .5px;background-color: #A82128"class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
  
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    
    
  </div>
<!--end container-->

</section>
<!-- END CONTENT -->
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