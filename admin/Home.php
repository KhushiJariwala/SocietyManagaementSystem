<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
?>
<header class="d-flex justify-content-center py-3">
	<ul class="nav nav-pills">
	  <li class="nav-item"><a href="<?= $base_url ?>Home.php" class="nav-link active" aria-current="page">Home</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Events.php" class="nav-link">Events</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Complaints.php" class="nav-link">Complaints</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>PaymentHistory.php" class="nav-link">Payment History</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Resident.php" class="nav-link">Resident</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>ServiceProvider.php" class="nav-link">Service Provider</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocityPassbook.php" class="nav-link ">Socity Passbook</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocMeeting.php" class="nav-link">Socity Meeting</a></li>
<li class="nav-item"><a href="<?= $base_url ?>?logout=1" class="nav-link">Logout</a></li>
	</ul>
</header>
<div class="row">
	<div class="col-sm-12">
		<h1 class="mt-4" style="text-align: center;"><br>Socity Management System Admin</h1>
	</div>
</div>

<?php
require("footer.php")
?>