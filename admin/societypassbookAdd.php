<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){

	if(!empty($_POST['edit_id'])){
		$sql = "UPDATE `societypassbook` SET `title` = '".$_POST['title']."',`note` = '".$_POST['note']."',`payment` = '".$_POST['payment']."' WHERE id = '".$_POST['edit_id']."' ";
		$mysqli->query($sql);
		$_SESSION['success'] = "Society Passbook Update successfully.";
	}else{
		$sql = "INSERT INTO `societypassbook` (`title`, `note`, `payment`, `date_added`) VALUES ('".$_POST['title']."','".$_POST['note']."','".$_POST['payment']."','".date("Y-m-d")."')";
		$mysqli->query($sql);
		$_SESSION['success'] = "Society Passbook Insert successfully.";
	}
    header("location:".$base_url."SocityPassbook.php");die;
}

$id = "";
$title = "";
$note = "";
$payment = "";

$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id){
	$sql = "SELECT * FROM societypassbook WHERE id = '".$id."'" ;
	$data = array(); 
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = mysqli_fetch_assoc($result)){ 
	    	$id = $row['id'];
	    	$title = $row['title'];
	    	$note = $row['note'];
	    	$payment = $row['payment'];
	    }
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
	<div class="col-12">
		<h2>Socity Passbook Manager</h2>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label>Title</label>
				<input type="text" name="title" required="required" value="<?= $title ?>" class="form-control">
			</div>

			<div class="mb-3">
				<label>Note</label>
				<input type="text" name="note" required="required" value="<?= $note ?>" class="form-control">
			</div>
			
			<div class="mb-3">
				<label>Payment</label>
				<input type="number" name="payment" required="required" value="<?= $payment ?>" class="form-control">
			</div>
			
			<div class="mb-3">
				<input type="hidden" name="edit_id" value="<?= $id ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<a href="SocityPassbook.php" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<?php
require("footer.php")
?>