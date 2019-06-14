<?php
include 'connect.php';
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
<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 
</head>

<body style="background-color: #121618; ">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  	<div id="main">
	    <span style="font-size:30px;cursor:pointer;"  onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	        <div class="container" style="margin-right: 900px;">
			
		         <a class="fa fa-sign-out"  class="navbar-brand" href="logout.php"><i c></i> Logout</a>
           </div>
		  
	       </nav>
  	   <a href="index.php">Home</a>
       <a href="orderbag.php">Order food</a>
       <a href="#">About us</a>
       <a href="#">Edit details</a>
      </div>
</div>
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">User Details</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container">
  <p class="caption">Edit your details here which are required for delivery and contact.</p>
  <div class="divider"></div>
    <div class="row">
      <div class="col s12 m4 l3">
        <h4 class="header">Details</h4>
      </div>
<div>
        <div class="card-panel">
          <div class="row">
            <form class="formValidate" id="formValidate" method="post" action="routers/details-router.php" novalidate="novalidate"class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input name="username" id="username" type="text" value="<?php echo $username;?>" data-error=".errorTxt1">
                  <label for="username" class="">Username</label>
                  <div class="errorTxt1"></div>
                </div>
              </div>					
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input name="name" id="name" type="text" value="<?php echo $name;?>" data-error=".errorTxt2">
                  <label for="name" class="">Name</label>
                   <div class="errorTxt2"></div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-communication-email prefix"></i>
                  <input name="email" id="email" type="email" value="<?php echo $email;?>" data-error=".errorTxt3">
                  <label for="email" class="">Email</label>
                  <div class="errorTxt3"></div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-lock-outline prefix"></i>
                  <input name="password" id="password" type="password" data-error=".errorTxt4">
                  <label for="password" class="">Password</label>
                  <div class="errorTxt4"></div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input name="phone" id="phone" type="number" value="<?php echo $contact;?>" data-error=".errorTxt5">
                  <label for="phone" class="">Contact</label>
                  <div class="errorTxt5"></div>
                </div>
              </div>					  
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-home prefix"></i>
                  <textarea name="address" id="address" class="materialize-textarea validate" data-error=".errorTxt6"><?php echo $address;?></textarea>
                  <label for="address" class="">Address</label>
                  <div class="errorTxt6"></div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                      <i class="mdi-content-send right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <div class="divider"></div>
    
  </div>
<!--end container-->

</section>

   
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