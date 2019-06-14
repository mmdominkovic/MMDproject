<?php
include 'includes/connect.php';
include 'includes/wallet.php';
$total = 0;
	if($_SESSION['customer_sid']==session_id())
	{
$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
$name = $row['name'];	
$address = $row['address'];
$contact = $row['contact'];
$verified = $row['verified'];
}
		?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Pizza Delicious</title>

<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

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
        <h5 class="breadcrumbs-title">Provide Order Details</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Provide required delivery and payment details.</p>
  <div class="divider"></div>
  <div class="row" style=" margin-bottom: 0;margin-left: -0.75rem; margin-right: -0.75rem;flex-direction: row;display: block;">
      <div class="col " style=" flex-basis: auto;" >
        <h4 class="header">Details</h4>
      </div>
<div>
        <div class="card-panel">
        <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem; box-sizing: inherit; display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
            <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="confirm-order.php" novalidate="novalidate">
            <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem; box-sizing: inherit; display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Payment Type</label><br><br>
                    <select class="form-control"id="exampleFormControlSelect1" name="payment_type">
                            <option value="Wallet" selected>Wallet</option>
                            <option value="Cash On Delivery" <?php if(!$verified) echo 'disabled';?>>Cash on Delivery</option>							
                    </select>
                </div>
              </div>					
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="form-group"><i class="fa fa-home" aria-hidden="true"></i><label for="address" class="">Address</label>

                    <textarea class="form-control" name="address" id="address" class="materialize-textarea validate"><?php echo $address;?></textarea>
                </div>
              </div>
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem; box-sizing: inherit; display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="form-group"><i class="fa fa-credit-card" aria-hidden="true"></i>
                <label for="cc_number">Card Number</label>
                <input class="form-control" name="cc_number" id="cc_number" type="text"  required>
                 
                </div>
              </div>
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem; box-sizing: inherit; display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                <div class="form-group"><i class="fa fa-key" aria-hidden="true"></i>
                <label for="cvv_number">CVV Number</label>
                <input  class="form-control" name="cvv_number" id="cvv_number" type="text" required>
                </div>
              </div>					  
              <div class="row">
              <div class="row"style=" margin-bottom: 0; margin-left: -0.75rem;margin-right: -0.75rem;box-sizing: inherit;display: block;line-height: 1.5;font-weight: normal;color: rgba(0,0,0,0.87);">
                  <div class="input-field col s12">
                  <button style="cursor: pointer;display: inline-block; overflow: hidden;user-select: none;-webkit-tap-highlight-color: transparent;vertical-align: middle; z-index: 1; will-change: opacity, transform;text-decoration: none;color: #fff;     text-align: center;letter-spacing: .5px;background-color: #A82128"class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                      
                    </button>
                  </div>
                </div>
              </div>
              <?php
                  foreach ($_POST as $key => $value)
                {
                    if($key == 'action' || $value == ''){
                        break;
                    }
                    echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
                }
              ?>
            </form>
          </div>
        </div>
      </div>
    <div class="divider"></div>
    
  </div>
<!--end container-->

</div>

<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Estimated Receipt</p>
  <div class="divider"></div>
<div id="work-collections" class="section">
<div class="row">
<div>
<ul id="issues-collection" class="list-group list-group-flush" style="background-color: #818181;">
<?php
echo '<li class="list-group-item">
<p><strong>Name:</strong>'.$name.'</p>
<p><strong>Contact Number:</strong> '.$contact.'</p>';

foreach ($_POST as $key => $value)
{
if($value == ''){
    break;
}
if(is_numeric($key)){
$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
while($row = mysqli_fetch_array($result))
{
    $price = $row['price'];
    $item_name = $row['name'];
    $item_id = $row['id'];
}
    $price = $value*$price;
echo '<li class="list-group-item">
<div class="row">
 <div class="col s7">
    <p class="collections-title"><strong>#'.$item_id.' </strong>'.$item_name.'</p>
 </div>
 <div class="col s2">
    <span>'.$value.' Pieces</span>
 </div>
 <div class="col s3">
    <span>Rs. '.$price.'</span>
 </div>
</div>
      </li>';
$total = $total + $price;
}
}
echo '<li class="list-group-item">
<div>
    <div class="col s7">
        <p class="collections-title"> Total</p>
    </div>
    <div class="col s2">
        <span>&nbsp;</span>
    </div>
    <div class="col s3">
        <span><strong>Rs. '.$total.'</strong></span>
    </div>
</div>
</li>';

?>
</ul>
        </div>
        </div>
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