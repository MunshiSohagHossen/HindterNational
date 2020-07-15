<?php
$page="slider";
include("header.php");
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Slider
        <small>Images</small>
      </h1>
    </section>
    <section class="content container-fluid">
<?php
if(isset($_POST['submitImage']))
{
    $str='';
    $file_name = $_FILES['sliderImage']['name'];
    $file_type = $_FILES['sliderImage']['type'];
    $file_size = $_FILES['sliderImage']['size'];

    if(strstr($file_name,".exe")){
        $str = '<div class="callout callout-danger"><p>.EXE files are not allowed</p></div>';
    }
    if($file_size > 350000)
    {
        $str = '<div class="callout callout-danger"><p>File is too large...</p></div>';
    }
    
    $target = "../images/slider/".$file_name;
    
    if(move_uploaded_file($_FILES['sliderImage']['tmp_name'],$target))
    {
        $qry = 'INSERT INTO sliderimages(pageid, image) VALUES (1,"'.$_FILES['sliderImage']['name'].'")';
        if($con->query($qry)){
            $str = '<div class="callout callout-success"><p>Image has been uploaded successfully.</p></div>';
        }else{
            $str = '<div class="callout callout-danger"><p>Problem occurred while uploading image. Please try again.</p></div>';
        }        
    }
    else{
        $str = '<div class="callout callout-danger"><p>Problem occurred while uploading image. Please try again.</p></div>';
    }
    echo $str;
} 
?>

		
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Slider Images</h3>

		  <div class="box-tools">
		    <form action="" method="post" enctype="multipart/form-data">
			<div class="input-group input-group-sm" style="width: 250px;">
			  <input type="file" name="sliderImage" class="form-control pull-right" required>
			  <div class="input-group-btn">
				<button type="submit" class="btn btn-success" name="submitImage">Add Image</button>
			  </div>
			</div>
			</form>
		  </div>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tbody><tr>
			  <th width="100px">ID</th>
			  <th width="150px">Image</th>
			  <th>Page</th>
			  <th width="200px">Status</th>
			  <th width="100px">Action</th>
			</tr>
<?php
$qry = "SELECT * FROM sliderimages WHERE pageid = 1";
$result = $con->query($qry);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
?>
<tr>
	<td><?php echo $row['id']; ?></td>
	<td><div class="img-circle img-slider" style="background-image:url('../images/slider/<?php echo $row['image']; ?>');"></div></td>
	<td>Home</td>
	<td><?php 
	if($row['status']) 
		echo '<span class="label label-success">Active</span>';
	else 
		echo '<span class="label label-danger">Inactive</span>'; 
	?></td>
	<td><?php 
	if($row['status']) 
		echo '<a href="apis/sliderImages.php?sid='.$row['id'].'&del=true" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
	else 
		echo '<a href="apis/sliderImages.php?sid='.$row['id'].'&rev=true" class="btn btn-sm btn-success"><i class="fa fa-undo"></i></a>'; 
	?></td>
</tr>
<?php
	}
}
?>			
		  </tbody></table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
  </div>		

    </section>
  </div>
<?php
include("footer.php");
?>