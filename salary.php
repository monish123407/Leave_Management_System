
<?php
require('top.inc.php');

$name='';
$email='';
$mobile='';
$department_id='';
$address='';
$birthday='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
		die('Access denied');
	}
	$res=mysqli_query($con,"select * from employee where id='$id'");
	$row=mysqli_fetch_assoc($res);
	
	$name=$row['name'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$department_id=$row['department_id'];
	$address=$row['address'];
	$birthday=$row['birthday'];
	$salary=$row['salary'];
	$res1=mysqli_query($con,"select * from department where id='$department_id'");
	$row1=mysqli_fetch_assoc($res1);
	$department=$row1['department'];

}
if(isset($_POST['submit'])){
	$empid=mysqli_real_escape_string($con,$_POST['employeeid']);
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$department_id=mysqli_real_escape_string($con,$_POST['department_id']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$birthday=mysqli_real_escape_string($con,$_POST['birthday']);
	if($id>0){
		$sql="update employee set name='$name',email='$email',mobile='$mobile',password='$password',department_id='$department_id',address='$address',birthday='$birthday' where id='$id'";
	}else{
		$re=mysqli_query($con,"select * from  employee");
		$count=mysqli_num_rows($re) +1;
		$sql="insert into employee(id,name,email,mobile,password,department_id,address,birthday,role) values('$empid','$name','$email','$mobile','$password','$department_id','$address','$birthday','2')";
	}
	mysqli_query($con,$sql);
	header('location:employee.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Salary </strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
							   	
									<label class=" form-control-label">Name</label>
									<input type="text" value="<?php echo $name?>" name="name" placeholder="Enter employee name" class="form-control" required>
								</div>
								
								<div class="form-group">
									<label class=" form-control-label">Salary</label>
									<input type="text" value="<?php echo $salary?>" name="mobile" placeholder="Enter employee mobile" class="form-control" required>
								</div>
								
								<div class="form-group">
									<label class=" form-control-label">Department</label>
									<input type="text" value="<?php echo $department?>" name="mobile" placeholder="Enter employee mobile" class="form-control" required>
								</div>
								
								
							   <?php if($_SESSION['ROLE']==1){?>
							   <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <?php } ?>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>