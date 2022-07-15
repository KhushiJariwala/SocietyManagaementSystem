<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$file = $_POST['image'];

	if(!empty($_POST['edit_id'])){
		$sql = "UPDATE `paymenthistory` SET `user_id` = '".$_POST['user_id']."' , `payment` = '".$_POST['payment']."' , `note` = '".$_POST['note']."' , `date_payment` = '".$_POST['date_payment']."'  WHERE id = '".$_POST['edit_id']."' ";
		$mysqli->query($sql);
		$_SESSION['success'] = "Payment History Update successfully.";
	}else{
		$sql = "INSERT INTO `paymenthistory` (`user_id`, `payment`, `note`, `date_payment`, `societypassbook`) VALUES ('".$_POST['user_id']."','".$_POST['payment']."','".$_POST['note']."','".$_POST['date_payment']."','".date("Y-m-d H:i:s")."')";
		$mysqli->query($sql);
		$_SESSION['success'] = "Payment History Insert successfully.";
	}
    header("location:".$base_url."PaymentHistory.php");die;
}

$id = "";
$user_id = "";
$payment = "";
$note = "";
$date_payment = "";

$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id){
	$sql = "SELECT * FROM paymenthistory WHERE id = '".$id."'" ;
	$data = array(); 
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = mysqli_fetch_assoc($result)){ 
	    	$id = $row['id'];
	    	$user_id = $row['user_id'];
	    	$payment = $row['payment'];
	    	$note = $row['note'];
	    	$date_payment = $row['date_payment'];
	    }
	}
}

$sql = "SELECT *  FROM user ORDER BY id DESC" ;
$users = array(); 
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)){
    	$users[] = $row;
    }
}


?>

<header class="d-flex justify-content-center py-3">
	<ul class="nav nav-pills">
	  <li class="nav-item"><a href="<?= $base_url ?>Home.php" class="nav-link " aria-current="page">Home</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Events.php" class="nav-link ">Events</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Complaints.php" class="nav-link">Complaints</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>PaymentHistory.php" class="nav-link active">Payment History</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Resident.php" class="nav-link ">Resident</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>ServiceProvider.php" class="nav-link ">Service Provider</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocityPassbook.php" class="nav-link ">Socity Passbook</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocMeeting.php" class="nav-link">Socity Meeting</a></li>
<li class="nav-item"><a href="<?= $base_url ?>?logout=1" class="nav-link">Logout</a></li>
	</ul>
</header>
<?php require_once("alert.php"); ?>
<div class="row">
	<div class="col-12">
		<h2>Payment History Manager</h2>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label>User</label>
				<select  name="user_id" required="required"  class="form-control">
					<option value="">Select User</option>
					<?php foreach ($users as $key => $value) { ?>
						<option <?= $user_id == $value['id'] ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['fname'] ?> <?= $value['lname'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="mb-3">
				<label>Payment</label>
				<input type="number" name="payment" required="required" value="<?= $payment ?>" class="form-control">
			</div>
			<div class="mb-3">
				<label>Note</label>
				<input type="text" name="note" required="required" value="<?= $note ?>" class="form-control">
			</div>
			<div class="mb-3">
				<label>Date Payment</label>
				<input type="date" name="date_payment" required="required" value="<?= $date_payment ?>" class="form-control">
			</div>
			<div class="mb-3">
				<input type="hidden" name="edit_id" value="<?= $id ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<a href="ServiceProvider.php" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<?php
require("footer.php")
?>