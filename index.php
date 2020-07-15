<?php
$page = "home";
include('header.php');
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
<?php
$qry = "SELECT image FROM sliderimages WHERE pageid = 1 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	for($i=0;$i<$result->num_rows;$i++){
		$li = '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"';
		if($i==0) $li=$li.'class="active"';
		$li=$li.'></li>';
		echo $li;
	}
?>
  </ol>
  <div class="carousel-inner">  
<?php
	$active = true;
	while($row = $result->fetch_assoc()){
		if($active){
			echo '<div class="carousel-item active" style="background:url(\'images/slider/'.$row['image'].'\')"></div>';
			$active = false;
		}else{
			echo '<div class="carousel-item" style="background:url(\'images/slider/'.$row['image'].'\')"></div>';
		}	
	}	
}
	?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>	
	
	<?php
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 1 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	echo "<h1>".$row['pagetitle']."</h1>";
	echo "<p>".$row['pagetext']."</p>";
}
	?>
    </div>
  </div>
</div>
	

<?php

include('footer.php');

?>