<?php
$page="pages";
include("header.php");
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pages
        <small>Content</small>
      </h1>
    </section>
    <section class="content container-fluid">
<?php
if(isset($_POST['home'])){
    $qry = 'UPDATE pages SET pagetitle="'.$_POST['titleHome'].'", pagetext="'.$_POST['txtHome'].'" WHERE id=1';
    if($con->query($qry) == TRUE){
        echo '<div class="callout callout-success"><p>Data has been updated successfully.</p></div>';
    }else{
        echo '<div class="callout callout-danger"><p>Problem occurred while updating data.'.$con->error.'</p></div>';
    }
}
if(isset($_POST['about'])){
    $qry = 'UPDATE pages SET pagetitle="'.$_POST['titleAbout'].'", pagetext="'.$_POST['txtAbout'].'" WHERE id=2';
    if($con->query($qry) == TRUE){
        echo '<div class="callout callout-success"><p>Data has been updated successfully.</p></div>';
    }else{
        echo '<div class="callout callout-danger"><p>Problem occurred while updating data.'.$con->error.'</p></div>';
    }
}
if(isset($_POST['gallery'])){
    $qry = 'UPDATE pages SET pagetitle="'.$_POST['titleGallery'].'", pagetext="'.$_POST['txtGallery'].'" WHERE id=3';
    if($con->query($qry) == TRUE){
        echo '<div class="callout callout-success"><p>Data has been updated successfully.</p></div>';
    }else{
        echo '<div class="callout callout-danger"><p>Problem occurred while updating data.'.$con->error.'</p></div>';
    }
}
if(isset($_POST['contact'])){
    $qry = 'UPDATE pages SET pagetitle="'.$_POST['titleContact'].'", pagetext="'.$_POST['txtContact'].'" WHERE id=4';
    if($con->query($qry) == TRUE){
        echo '<div class="callout callout-success"><p>Data has been updated successfully.</p></div>';
    }else{
        echo '<div class="callout callout-danger"><p>Problem occurred while updating data.'.$con->error.'</p></div>';
    }
}
?>		
		<div class="row">
			<div class="col-md-12">
				<!-- Custom Tabs -->
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
					
						<li><a href="#about" data-toggle="tab">About</a></li>
						<li><a href="#contact" data-toggle="tab">Contact</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<p>This content will be displayed on the 'Home' page of Hindternationalr website.</p>
							<form action="" method="post">
<?php
$pageTitle="";
$pageText="";
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 1 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$pageTitle = $row['pagetitle'];
	$pageText = $row['pagetext'];
}
?>
								<div class="form-group">
									<label for="titleHome">Home Title</label>
									<input type="hidden" name="home" value="1"/>
									<input type="text" class="form-control" id="titleHome" name="titleHome" placeholder="Enter page title" value="<?php echo $pageTitle; ?>">
								</div>
								<div class="form-group">
									<label for="txtHome">Home Description</label>
									<textarea id="txtHome" name="txtHome"><?php echo $pageText; ?></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-sm">Update</button>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="about">
							<p>This content will be displayed on the 'Homet' page of Hindternational website.</p>
							<form action="" method="post">
<?php
$pageTitle="";
$pageText="";
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 2 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$pageTitle = $row['pagetitle'];
	$pageText = $row['pagetext'];
}
?>
								<div class="form-group">
									<label for="titleAbout">About Title</label>
									<input type="hidden" name="about" value="1"/>
									<input type="text" class="form-control" id="titleAbout" name="titleAbout" placeholder="Enter page title" value="<?php echo $pageTitle; ?>">
								</div>
								<div class="form-group">
									<label for="txtAbout">About Description</label>
									<textarea id="txtAbout" name="txtAbout"><?php echo $pageText; ?></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-sm">Update</button>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="VisaGuide">
							<p>This content will be displayed on the 'About' page of Hindternational website.</p>
							<form action="" method="post">
<?php
$pageTitle="";
$pageText="";
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 3 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$pageTitle = $row['pagetitle'];
	$pageText = $row['pagetext'];
}
?>
								<div class="form-group">
									<label for="titleGallery">Contact</label>
									<input type="hidden" name="gallery" value="1"/>
									<input type="text" class="form-control" id="titleGallery" name="titleGallery" placeholder="Enter page title" value="<?php echo $pageTitle; ?>">
								</div>
								<div class="form-group">
									<label for="txtGallery">Contactn</label>
									<textarea id="txtGallery" name="txtGallery"><?php echo $pageText; ?></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-sm">Update</button>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="contact">
							<p>This content will be displayed on the 'Contact' page of Hindternational website.</p>
							<form action="" method="post">
<?php
$pageTitle="";
$pageText="";
$qry = "SELECT pagetitle,pagetext FROM pages WHERE id = 4 AND status = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$pageTitle = $row['pagetitle'];
	$pageText = $row['pagetext'];
}
?>
								<div class="form-group">
									<label for="titleContact">Contact Title</label>
									<input type="hidden" name="contact" value="1"/>
									<input type="text" class="form-control" id="titleContact" name="titleContact" placeholder="Enter page title" value="<?php echo $pageTitle; ?>">
								</div>
								<div class="form-group">
									<label for="txtContact">Contact Description</label>
									<textarea id="txtContact" name="txtContact"><?php echo $pageText; ?></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-sm">Update</button>
								</div>
							</form>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

    </section>
  </div>
  
 
<?php
include("footer.php");
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('txtHome');
	CKEDITOR.replace('txtAbout');
	CKEDITOR.replace('txtGallery');
	CKEDITOR.replace('txtContact');
  })
</script>