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
  <section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">User List</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Enable, Disable or Verify Users.</p>
  <div class="divider"></div>
  <!--editableTable-->
  <div id="editableTable" class="section">
  <form class="formValidate" id="formValidate1" method="post" action="routers/user-router.php" novalidate="novalidate">
  <div class="row" style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">
      <div class="col s12 m4 l3">
        <h4 class="header">List of users</h4>
      </div>
      <div>
<table class="table table-striped table-bordered table-sm" width="100%" cellspacing="0">
            <thead>
              <tr style="font-size: 17px">
                <th class="th-sm" data-field="name">Name</th>
                <th class="th-sm" data-field="price">Email</th>
                <th class="th-sm" data-field="price">Contact</th>
                <th class="th-sm" data-field="price">Address</th>	
                <th class="th-sm" data-field="price">Role</th>
                <th class="th-sm" data-field="price">Verified</th>
                <th class="th-sm" data-field="price">Enable</th>
                <th class="th-sm" data-field="price">Wallet</th>						
              </tr>
            </thead>

            <tbody>
        <?php
        $result = mysqli_query($con, "SELECT * FROM users");
        while($row = mysqli_fetch_array($result))
        {
            echo '<tr><td>'.$row["name"].'</td>';
            echo '<td>'.$row["email"].'</td>';
            echo '<td>'.$row["contact"].'</td>';   
            echo '<td>'.$row["address"].'</td>';      					
            echo '<td><select name="'.$row['id'].'_role">
              <option value="Administrator"'.($row['role']=='Administrator' ? 'selected' : '').'>Administrator</option>
              <option value="Customer"'.($row['role']=='Customer' ? 'selected' : '').'>Customer</option>
            </select></td>';
            echo '<td><select name="'.$row['id'].'_verified">
              <option value="1"'.($row['verified'] ? 'selected' : '').'>Verified</option>
              <option value="0"'.(!$row['verified'] ? 'selected' : '').'>Not Verified</option>
            </select></td>';	
            echo '<td><select name="'.$row['id'].'_deleted">
              <option value="1"'.($row['deleted'] ? 'selected' : '').'>Disable</option>
              <option value="0"'.(!$row['deleted'] ? 'selected' : '').'>Enable</option>
            </select></td>';
            $key = $row['id'];
            $sql = mysqli_query($con,"SELECT * from wallet WHERE customer_id = $key;");
            if($row1 = mysqli_fetch_array($sql)){
                $wallet_id = $row1['id'];
                $sql1 = mysqli_query($con,"SELECT * from wallet_details WHERE wallet_id = $wallet_id;");
                if($row2 = mysqli_fetch_array($sql1)){
                    $balance = $row2['balance'];
                }
            }
            echo '<td><label for="balance">Balance</label><input id="balance" name="'.$row['id'].'_balance" value="'.$balance.'" type="number"></td></tr>'; 					
        }
        ?>
            </tbody>
</table>
      </div>
      <div class="input-field col s12">
                      <button class="btn btn-danger btn-primary btn-lg btn-block" type="submit" name="action">Modify
                      <i class="fa fa-paper-plane" aria-hidden="true"></i>
                      </button>
                    </div>
    </div>
    </form>
    <div class="divider"></div>
    
  <form class="formValidate" id="formValidate" method="post" action="routers/add-users.php" novalidate="novalidate">
  <div class="row" style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">
      <div class="col s12 m4 l3">
        <h4 class="header">Add User</h4>
      </div>
      <div>
<table>
            <thead>
              <tr>
                <th class="th-sm" data-field="name">Username</th>
                <th class="th-sm" data-field="name">Password</th>							
                <th class="th-sm" data-field="name">Name</th>
                <th class="th-sm" data-field="price">Email</th>
                <th class="th-sm" data-field="price">Phone number</th>
                <th class="th-sm" data-field="price">Address</th>	
                <th class="th-sm" data-field="price">Role</th>
                <th class="th-sm" data-field="price">Verified</th>
                <th class="th-sm" data-field="price">Enable</th>		
              </tr>
            </thead>

            <tbody>
        <?php
            echo '<tr><td><label for="username">Username</label><input id="username" name="username" type="text" ></td>';   									
            echo '<td><label for="password">Password</label><input id="password" name="password" type="password" ></td>';   									
            echo '<td><label for="name">Name</label><input id="name" name="name" type="text" ></td>';
            echo '<td><label for="email">Email</label><input id="email" name="email" type="email"></td>';
            echo '<td><label for="contact">Phone number</label><input id="contact" name="contact" type="number" ></td>';   
            echo '<td><label for="address">Address</label><input id="address" name="address" type="text" ></td>';   
            echo '<td><select name="role">
              <option value="Administrator">Administrator</option>
              <option value="Customer" selected>Customer</option>
            </select></td>';
            echo '<td><select name="verified">
              <option value="1">Verified</option>
              <option value="0" selected>Not Verified</option>
            </select></td>';	
            echo '<td><select name="deleted">
              <option value="1">Disable</option>
              <option value="0" selected>Enable</option>
            </select></td></tr>';					
        ?>
            </tbody>
</table>
      </div>
      <div class="input-field col s12">
                      <button class="btn btn-success btn-lg btn-block" type="submit" name="action">Add
                      <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                      </button>
                    </div>
    </div>
    </form>			
    <div class="divider"></div>
    
  </div>
</div>
</div>
<!--end container-->

</section>
<!-- END CONTENT -->
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