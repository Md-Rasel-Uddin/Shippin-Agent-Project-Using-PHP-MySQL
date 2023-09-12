<?php 
session_start();
include ('db.php');
include ('header.php');

if(isset($_REQUEST['login'])){
	extract($_REQUEST);

	//$password=sha1($password);

if($db->getById("members","*","email_id='$email_id' AND password='$password' AND status=1")!=false){
		$info=$db->getById("members","*","email_id='$email_id' AND password='$password' AND status=1");
		 $_SESSION['email_id']=$info['email_id'];
		 header("location:ffol/index.php");

	}
	else{
		echo "Invalid Username/Password";
	}
}

if (isset($_SESSION['name'])){
	header("location:dashboard.php");
}

 ?>
 			<div class="container">
				<div  class="col-lg-12">
					<div class="main_content">
						<form action="index.php" method="post">
							<table class="table table-condensed table-striped table-bordered table-hover table-responsive">
								<tr>
									<th>Email:</th>
									<td><input type="text" class="form-control" name="email_id" placeholder="john@doe.com"></td>
								</tr>
								<tr>
									<th>Password:</th>
									<td><input type="password" class="form-control" name="password" placeholder="*******"></td>
								</tr>
								<tr>
									<td colspan="2" class="text-center"><input type="submit" name="login" class="form-control" value="Login"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>


				
<?php
include ('footer.php');

