<?php
require("header.php");
if(empty($_SESSION['admin_id'])){
	header("location:".$base_url);die;
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$file = $_POST['image'];

	if(!empty($_FILES['image']['name'])){
		$unique = uniqid();
		$file = $unique.'_'.preg_replace("/\s+/", "_", $_FILES['image']['name']);
		$path = "../upload/".$file;
		move_uploaded_file($_FILES["image"]["tmp_name"], $path);
	}
	if(!empty($_POST['edit_id'])){
		$sql = "UPDATE `event` SET `name` = '".$_POST['title']."' , `image` = '".$file."' WHERE id = '".$_POST['edit_id']."' ";
		$mysqli->query($sql);
		$_SESSION['success'] = "Event Update successfully.";
	}else{
		$sql = "INSERT INTO `event` (`name`, `image`) VALUES ('".$_POST['title']."', '".$file."')";
		$mysqli->query($sql);
		$_SESSION['success'] = "Event Insert successfully.";
	}
    header("location:".$base_url."Events.php");die;
}

$id = "";
$title = "";
$image = "";

$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id){
	$sql = "SELECT * FROM event WHERE id = '".$id."'" ;
	$data = array(); 
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = mysqli_fetch_assoc($result)){ 
	    	$id = $row['id'];
	    	$title = $row['name'];
	    	$image = $row['image'];
	    }
	}
}

?>

<header class="d-flex justify-content-center py-3">
	<ul class="nav nav-pills">
	  <li class="nav-item"><a href="<?= $base_url ?>Home.php" class="nav-link " aria-current="page">Home</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Events.php" class="nav-link active">Events</a></li>
	  <li class="nav-item"><a href="<?= $base_url ?>Complaints.php" class="nav-link">Complaints</a></li>
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
	<div class="col-12">
		<h2>Event Manager</h2>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label>Title</label>
				<input type="text" name="title" required="required" value="<?= $title ?>" class="form-control">
			</div>
			<div class="mb-3">
				<label>Image</label>
				<input type="file" name="image" <?= !$image ? 'required="required"' : "" ?> class="form-control">
				<input type="hidden" name="image" value="<?= $image ?>" class="form-control">
			</div>

			<?php if($image){ ?>
				<img src="<?= $base_url ?>../upload/<?= $image ?>" width="50" class="mb-3" />
			<?php } ?>
			<div class="mb-3">
				<input type="hidden" name="edit_id" value="<?= $id ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
				<a href="Events.php" class="btn btn-danger">Cancel</a>
			</div>
		</form>
	</div>
</div>
<?php
require("footer.php")
?>