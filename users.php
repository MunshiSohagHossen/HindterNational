<?php
$page="users";
include("header.php");

?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Admin 
        <small>Contacts</small>
      </h1>
    </section>
    <section class="content container-fluid">
		
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Contact Details</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table id="tblUsers" class="table table-hover">
			<thead>
			<tr>
			  <th>Image</th>
			  <th>User</th>
			  <th>Username</th>
			  <th>User Role</th>
			  <th width="100px">Status</th>
			  <th width="100px">Action</th>
			</tr>
			</thead>
			<tbody>
<?php
$qry = "SELECT * FROM users";
$result = $con->query($qry);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
?>
<tr>
	<td><div class="img-circle img-slider" style="background-image:url('../images/users/<?php echo $row['image']; ?>');"></div></td>
	<td><p><?php echo $row['firstname']." ".$row['lastname']; ?></p></td>
	<td><?php echo $row['username']; ?></td>
	<td><?php echo $row['userrole']; ?></td>
	<td><?php
	if($row['status'])
		echo '<span class="label label-success">Active</span>';
	else
		echo '<span class="label label-danger">Inactive</span>';
	?></td>
	<td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-user"><i class="fa fa-edit"></i></button> <?php
	if($row['status'])
		echo '<a href="apis/userStatus.php?uid='.$row['id'].'&del=true" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
	else
		echo '<a href="apis/userStatus.php?uid='.$row['id'].'&rev=true" class="btn btn-sm btn-success"><i class="fa fa-undo"></i></a>';
	?></td>
</tr>
<?php
	}
}
?>			
			</tbody>
		  </table>
		</div>
	  </div>
	</div>
  </div>		

    </section>
  </div>

<div class="modal fade" id="modal-user">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Default Modal</h4>
	  </div>
	  <div class="modal-body">
		<p>One fine body&hellip;</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary">Save changes</button>
	  </div>
	</div>
  </div>
</div>
 
<?php
include("footer.php");
?>
<script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#tblStudent').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  })
</script>