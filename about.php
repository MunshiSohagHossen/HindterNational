<?php
$page = "about";
include('header.php');

?>

<div class="jumbotron">
<?php
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 2 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	echo '<h1 class="display-4">'.$row['pagetitle'].'</h1>';
	echo '<p class="lead">'.$row['pagetext'].'</p>';
}
?>
</div>

<div class="container">
  <div class="row">
<?php
$qry = "SELECT image,firstname,lastname,userrole FROM users WHERE status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
?>  
    <div class="col-sm">
		<div class="card" style="width: 18rem;">
		  <img class="card-img-top" src="images/users/<?php echo $row['image']; ?>" alt="Card image cap">
		  <div class="card-body">
			<h5 class="card-title"><?php echo $row['firstname']." ".$row['lastname']; ?></h5>
              <p class="card-text"><?php echo $row['userrole']; ?></p>
		  </div>
		</div>
    </div>
<?php      
	}
}
?>
  </div>
</div>
<?php

include('footer.php');

?>
