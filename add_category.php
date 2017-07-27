<?php 
$submit  = 'add';
$title   = 'Add Category';
session_start();

if (isset($_SESSION['user'])) {
	include 'head.php';
	include 'nav.php';

	if(isset($_GET['category_id'])) {
		$id 		= $_GET['category_id'];
		$submit 	= 'update';
		$title   	= 'Edit Category';
		$category		= mysql_query("SELECT * FROM `category` WHERE `id`= '$id'")
		or die('could not Select :'.mysql_error());
		if (mysql_num_rows($category) > 0) {
			while ($row=mysql_fetch_object($category)) {				
				$name   	= $row->name;				
			}
		}
	}
	
?>
<div class="content">
	<div class="container">
		<div class="page_head"><!-- page head-->
			<span><?php echo $title; ?></span>
			<div class="pull-right">
				<a href="view_categories.php" class="btn btn-success">View Category</a>
			</div>
		</div><!-- page head-->
		<div class="page_body"><!-- page body-->						
			<div class="col-md-offset-3 col-md-6 back_white">
				<form method="POST" action="categoryController.php" id="form">					
					<div class="form-group pmd-textfield">
					  <label for="name" class="control-label">Name</label>
					  <input type="text" name="name" class="form-control" value="<?php if(isset($_GET['category_id']))echo $name; ?>" required>
					</div>										
					<div class="form-group pmd-textfield">
						<input type="hidden" name="id" value="<?php if(isset($id))echo $id; ?>">
						<input type="submit" name="<?php echo $submit; ?>" value="<?php echo $submit; ?>" class="btn btn-primary pull-right">
					</div>
				</form>		
			</div>								
		</div><!-- page body-->
	</div>
</div>
<?php	
	include 'footer.php';
}else{
	header("location: login.php");
}	
?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script>
$(document).ready(function(){
	$("#form").validate();
});
</script>
