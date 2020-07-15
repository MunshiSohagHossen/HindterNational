<?php
$page = "contact";
include('header.php');

?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
<?php
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 4 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	echo '<h1>'.$row['pagetitle'].'</h1>';
	echo '<address>'.$row['pagetext'].'</address>';
}
?>
	</div>
	<div class="col-md-6">
		<form name="msgForm" method="post" action="" onSubmit="return validateForm()">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" placeholder="Enter your name" onBlur="validateName()">
			</div>
			<div class="form-group">
				<label>Email address</label>
				<input type="email" name="email" class="form-control" placeholder="Enter your email" onBlur="validateEmail()">
			</div>
			<div class="form-group">
				<label>Message</label>
				<textarea name="msg" class="form-control" placeholder="message" onBlur="validateMsg()"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
<?php
if(isset($_POST['name']) && $_POST['name']!="" && $_POST['email']!="" && $_POST['msg']!=""){    
    $qry = "INSERT INTO contactmsg (name,email,message) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['msg']."')";
        
    if($con->query($qry)){
        echo "<p>Message submitted.</p>";
    }else{
        echo "<p>Something went wrong. Cannot submit message.</p>";
    }
}   
?>
	</div>
  </div>
</div>
<script src="js/validations.js"></script>
<?php
include('footer.php');
?>