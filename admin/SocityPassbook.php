<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
if(!empty($_GET['delete'])){
	$sql = "DELETE FROM `societypassbook` WHERE id = '".$_GET['delete']."' ";
	$mysqli->query($sql);
	$_SESSION['success'] = "Socity Passbook Delete successfully.";
	header("location:".$base_url."SocietyPassbook.php");
	die();
}
$sql = "SELECT *  FROM societypassbook ORDER BY id DESC" ;
$data = array(); 
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)){
    	$data[] = $row;
    }
}

?>
<header class="d-flex justify-content-center py-3">
	<ul class="nav nav-pills">
	  <li class="nav-item"><a href="<?= $base_url ?>Home.php" class="nav-link " aria-current="page">Home</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Events.php" class="nav-link ">Events</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Complaints.php" class="nav-link">Complaints</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>PaymentHistory.php" class="nav-link ">Payment History</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Resident.php" class="nav-link ">Resident</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>ServiceProvider.php" class="nav-link ">Service Provider</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocityPassbook.php" class="nav-link active">Socity Passbook</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocMeeting.php" class="nav-link">Socity Meeting</a></li>
<li class="nav-item"><a href="<?= $base_url ?>?logout=1" class="nav-link">Logout</a></li>
	</ul>
</header>
<?php require_once("alert.php"); ?>
<div class="row">
	<div class="col-6">
		<h2>Socity Passbook List</h2>
	</div>
	<div class="col-6 text-end">
		<a href="societypassbookAdd.php" class="btn btn-primary">Add Socity Passbook</a>
	</div>
	<div class="col-12">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Title</th>
		      <th scope="col">Note</th>
		      <th scope="col">Payment</th>
		      <th scope="col">Date Added</th>
		      <th scope="col" class="text-end">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if($data){ ?>
		  		<?php $i = 1; foreach ($data as $key => $value) { ?>
		  			<tr>
		  				<td><?= $i ?></td>
		  				<td><?= $value['title'] ?></td>
		  				<td><?= $value['note'] ?></td>
		  				<td><?= $value['payment'] ?></td>
		  				<td><?= $value['date_added'] ?></td>
		  				<td class="text-end">
		  					<a class="btn btn-primary btn-sm" href="<?= $base_url ?>societypassbookAdd.php?id=<?= $value['id'] ?>">Edit</a>
		  					<a class="btn btn-danger btn-sm" onclick="if(!confirm('Sure You Want To Delete Record?')){return false;}" href="<?= $base_url ?>Events.php?delete=<?= $value['id'] ?>">Delete</a>
		  				</td>
		  			</tr>
		  		<?php $i++; } ?>
		  	<?php }else{ ?>
		  		<tr>
		  			<td align="center" colspan="4">Record NOt Found</td>
		  		</tr>
		  	<?php } ?>
		  </tbody>
		</table>
	</div>
</div>
<?php
require("footer.php")
?>