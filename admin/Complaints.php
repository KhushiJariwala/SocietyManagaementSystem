<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
if(!empty($_GET['delete'])){
	$sql = "DELETE FROM `complaints` WHERE id = '".$_GET['delete']."' ";
	$mysqli->query($sql);
	$_SESSION['success'] = "Complaint Delete successfully.";
	header("location:".$base_url."Complaints.php");
	die();
}
$sql = "SELECT *  FROM complaints ORDER BY id DESC" ;
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
	  <li class="nav-item"><a href="<?= $base_url ?>Complaints.php" class="nav-link active">Complaints</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>PaymentHistory.php" class="nav-link ">Payment History</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Resident.php" class="nav-link ">Resident</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>ServiceProvider.php" class="nav-link ">Service Provider</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocityPassbook.php" class="nav-link ">Socity Passbook</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocMeeting.php" class="nav-link">Socity Meeting</a></li>
<li class="nav-item"><a href="<?= $base_url ?>?logout=1" class="nav-link">Logout</a></li>
	</ul>
</header>
<?php require_once("alert.php"); ?>
<div class="row">
	<div class="col-6">
		<h2>Complaints List</h2>
	</div>
	<div class="col-6 text-end">
	</div>
	<div class="col-12">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Email</th>
		      <th scope="col">Name</th>
		      <th scope="col">House Number</th>
		      <th scope="col">Complaints</th>
		      <th scope="col">Date Added</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if($data){ ?>
		  		<?php $i = 1; foreach ($data as $key => $value) { ?>
		  			<tr>
		  				<td><?= $i ?></td>
		  				<td><?= $value['email'] ?></td>
		  				<td><?= $value['name'] ?></td>
		  				<td><?= $value['house_number'] ?></td>
		  				<td><?= $value['complaints'] ?></td>
		  				<td><?= $value['date_added'] ?></td>
		  			</tr>
		  		<?php $i++; } ?>
		  	<?php }else{ ?>
		  		<tr>
		  			<td align="center" colspan="4">Record Not Found</td>
		  		</tr>
		  	<?php } ?>
		  </tbody>
		</table>
	</div>
</div>
<?php
require("footer.php")
?>