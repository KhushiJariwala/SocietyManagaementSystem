<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
?>

<header class="d-flex justify-content-center py-3">
	<ul class="nav nav-pills">
	  <li class="nav-item"><a href="<?= $base_url ?>Home.php" class="nav-link " aria-current="page">Home</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Events.php" class="nav-link">Events</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Complaints.php" class="nav-link">Complaints</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>PaymentHistory.php" class="nav-link">Payment History</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Resident.php" class="nav-link active">Resident</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>ServiceProvider.php" class="nav-link ">Service Provider</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocityPassbook.php" class="nav-link ">Socity Passbook</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocMeeting.php" class="nav-link">Socity Meeting</a></li>
<li class="nav-item"><a href="<?= $base_url ?>?logout=1" class="nav-link">Logout</a></li>
	</ul>
</header>
<div class="row">
	<div class="col-12">
		<h2>Event Manager</h2>
		<form action="" method="POST">
			<div class="mb-3">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="mb-3">
				<label>Image</label>
				<input type="file" name="image" class="form-control">
			</div>
			<div class="mb-3">
				<input type="hidden" name="edit_id" value="">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<a href="Events.php" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<?php
require("footer.php")
?>