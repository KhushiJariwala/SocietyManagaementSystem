<?php if(isset($_SESSION['success'])){ ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Success : </strong> <?= $_SESSION['success'] ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
<?php unset($_SESSION['success']); }else if(isset($_SESSION['error'])){ ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Success : </strong> <?= $_SESSION['error'] ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
<?php unset($_SESSION['error']); } ?>