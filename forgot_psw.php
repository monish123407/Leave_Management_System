<?php
require('db.inc.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['oldpassword'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$oldpassword=mysqli_real_escape_string($con,$_POST['oldpassword']);
   $newpassword=mysqli_real_escape_string($con,$_POST['newpassword']);
	$res=mysqli_query($con,"select * from employee where email='$email' and password='$oldpassword'");
	$count=mysqli_num_rows($res);

	if($count==1)
   {
		$sql="update employee set password='$newpassword' where email='$email'";
      mysqli_query($con,$sql);
      header('location:login_fake.php');
      
	}else{
		$msg="Please enter correct login details";
	}
  
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Forgot Password</title>
      <link href="assets/img/logo.jpg" rel="icon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                     </div>
                     <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="oldpassword" class="form-control" placeholder="Old Password" required>
                     </div>
                     <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newpassword" class="form-control" placeholder="New Password" required>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button>
                     
					 <div class="result_msg"><?php echo $msg?></div>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>