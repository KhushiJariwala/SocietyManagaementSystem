<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){

	if(!empty($_POST['edit_id'])){
		$sql = "UPDATE `socmeeting` SET `title` = '".$_POST['title']."',`purpuse` = '".$_POST['purpuse']."',`meeting_date` = '".$_POST['meeting_date']."',`meeting_time` = '".$_POST['meeting_time']."' WHERE id = '".$_POST['edit_id']."' ";
		$mysqli->query($sql);
		$_SESSION['success'] = "Society Meeting Update successfully.";
	}else{
		$sql = "INSERT INTO `socmeeting` (`title`, `purpuse`, `meeting_date`, `meeting_time`) VALUES ('".$_POST['title']."','".$_POST['purpuse']."','".$_POST['meeting_date']."','".$_POST['meeting_time']."')";
		$mysqli->query($sql);
		$_SESSION['success'] = "Society Meeting Insert successfully.";
	}
    header("location:".$base_url."SocMeeting.php");die;
}

$id = "";
$title = "";
$purpuse = "";
$meeting_date = "";
$meeting_time = "";

$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id){
	$sql = "SELECT * FROM socmeeting WHERE id = '".$id."'" ;
	$data = array(); 
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = mysqli_fetch_assoc($result)){ 
	    	$id = $row['id'];
	    	$title = $row['title'];
	    	$purpuse = $row['purpuse'];
	    	$meeting_date = $row['meeting_date'];
	    	$meeting_time = $row['meeting_time'];
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
	  <li class="nav-item"><a href="<?= $base_url ?>SocityPassbook.php" class="nav-link ">Socity Passbook</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>SocMeeting.php" class="nav-link active">Socity Meeting</a></li>
<li class="nav-item"><a href="<?= $base_url ?>?logout=1" class="nav-link">Logout</a></li>
	</ul>
</header>
<?php require_once("alert.php"); ?>
<div class="row">
	<div class="col-12">
		<h2>Socity Meeting Manager</h2>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label>Title</label>
				<input type="text" name="title" required="required" value="<?= $title ?>" class="form-control">
			</div>

			<div class="mb-3">
				<label>Purpose</label>
				<input type="text" name="purpuse" required="required" value="<?= $purpuse ?>" class="form-control">
			</div>
			
			<div class="mb-3">
				<label>Meeting Date</label>
				<input type="date" name="meeting_date" required="required" value="<?= $meeting_date ?>" class="form-control">
			</div>
			
			<div class="mb-3">
				<label>Meeting Time</label>
				<select  name="meeting_time" required="required"  class="form-control">
					<option value="00:00" <?= $meeting_time == "00:00" ? "selected" : "" ?>>00:00</option>
					<option value="00:30" <?= $meeting_time == "00:30" ? "selected" : "" ?>>00:30</option>
					<option value="01:00" <?= $meeting_time == "01:00" ? "selected" : "" ?>>01:00</option>
					<option value="01:30" <?= $meeting_time == "01:30" ? "selected" : "" ?>>01:30</option>
					<option value="02:00" <?= $meeting_time == "02:00" ? "selected" : "" ?>>02:00</option>
					<option value="02:30" <?= $meeting_time == "02:30" ? "selected" : "" ?>>02:30</option>
					<option value="03:00" <?= $meeting_time == "03:00" ? "selected" : "" ?>>03:00</option>
					<option value="03:30" <?= $meeting_time == "03:30" ? "selected" : "" ?>>03:30</option>
					<option value="04:00" <?= $meeting_time == "04:00" ? "selected" : "" ?>>04:00</option>
					<option value="04:30" <?= $meeting_time == "04:30" ? "selected" : "" ?>>04:30</option>
					<option value="05:00" <?= $meeting_time == "05:00" ? "selected" : "" ?>>05:00</option>
					<option value="05:30" <?= $meeting_time == "05:30" ? "selected" : "" ?>>05:30</option>
					<option value="06:00" <?= $meeting_time == "06:00" ? "selected" : "" ?>>06:00</option>
					<option value="06:30" <?= $meeting_time == "06:30" ? "selected" : "" ?>>06:30</option>
					<option value="07:00" <?= $meeting_time == "07:00" ? "selected" : "" ?>>07:00</option>
					<option value="07:30" <?= $meeting_time == "07:30" ? "selected" : "" ?>>07:30</option>
					<option value="08:00" <?= $meeting_time == "08:00" ? "selected" : "" ?>>08:00</option>
					<option value="08:30" <?= $meeting_time == "08:30" ? "selected" : "" ?>>08:30</option>
					<option value="09:00" <?= $meeting_time == "09:00" ? "selected" : "" ?>>09:00</option>
					<option value="09:30" <?= $meeting_time == "09:30" ? "selected" : "" ?>>09:30</option>
					<option value="10:00" <?= $meeting_time == "10:00" ? "selected" : "" ?>>10:00</option>
					<option value="10:30" <?= $meeting_time == "10:30" ? "selected" : "" ?>>10:30</option>
					<option value="11:00" <?= $meeting_time == "11:00" ? "selected" : "" ?>>11:00</option>
					<option value="11:30" <?= $meeting_time == "11:30" ? "selected" : "" ?>>11:30</option>
					<option value="12:00" <?= $meeting_time == "12:00" ? "selected" : "" ?>>12:00</option>
					<option value="12:30" <?= $meeting_time == "12:30" ? "selected" : "" ?>>12:30</option>
					<option value="13:00" <?= $meeting_time == "13:00" ? "selected" : "" ?>>13:00</option>
					<option value="13:30" <?= $meeting_time == "13:30" ? "selected" : "" ?>>13:30</option>
					<option value="14:00" <?= $meeting_time == "14:00" ? "selected" : "" ?>>14:00</option>
					<option value="14:30" <?= $meeting_time == "14:30" ? "selected" : "" ?>>14:30</option>
					<option value="15:00" <?= $meeting_time == "15:00" ? "selected" : "" ?>>15:00</option>
					<option value="15:30" <?= $meeting_time == "15:30" ? "selected" : "" ?>>15:30</option>
					<option value="16:00" <?= $meeting_time == "16:00" ? "selected" : "" ?>>16:00</option>
					<option value="16:30" <?= $meeting_time == "16:30" ? "selected" : "" ?>>16:30</option>
					<option value="17:00" <?= $meeting_time == "17:00" ? "selected" : "" ?>>17:00</option>
					<option value="17:30" <?= $meeting_time == "17:30" ? "selected" : "" ?>>17:30</option>
					<option value="18:00" <?= $meeting_time == "18:00" ? "selected" : "" ?>>18:00</option>
					<option value="18:30" <?= $meeting_time == "18:30" ? "selected" : "" ?>>18:30</option>
					<option value="19:00" <?= $meeting_time == "19:00" ? "selected" : "" ?>>19:00</option>
					<option value="19:30" <?= $meeting_time == "19:30" ? "selected" : "" ?>>19:30</option>
					<option value="20:00" <?= $meeting_time == "20:00" ? "selected" : "" ?>>20:00</option>
					<option value="20:30" <?= $meeting_time == "20:30" ? "selected" : "" ?>>20:30</option>
					<option value="21:00" <?= $meeting_time == "21:00" ? "selected" : "" ?>>21:00</option>
					<option value="21:30" <?= $meeting_time == "21:30" ? "selected" : "" ?>>21:30</option>
					<option value="22:00" <?= $meeting_time == "22:00" ? "selected" : "" ?>>22:00</option>
					<option value="22:30" <?= $meeting_time == "22:30" ? "selected" : "" ?>>22:30</option>
					<option value="23:00" <?= $meeting_time == "23:00" ? "selected" : "" ?>>23:00</option>
					<option value="23:30" <?= $meeting_time == "23:30" ? "selected" : "" ?>>23:30</option>
				</select>
			</div>
			
			<div class="mb-3">
				<input type="hidden" name="edit_id" value="<?= $id ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<a href="SocMeeting.php" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<?php
require("footer.php")
?>