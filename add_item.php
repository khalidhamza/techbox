<?php 
include 'db.php';
$submit 	= 'add';
$title 		= 'Add Item';
session_start();

if (isset($_SESSION['user'])) {
	include 'head.php';
	include 'nav.php';

	//select all categreies 
	$ids 	= array();
	$names 	= array();
	$categories		= mysql_query("SELECT * FROM `category`")
	or die('could not Select :'.mysql_error());
	if (mysql_num_rows($categories) > 0) {
		while ($row=mysql_fetch_object($categories)) {
			$ids[]		= $row->id;
			$names[]   	= $row->name;			
		}
	}
	//select all categreies 

	// get item id for edit
	if(isset($_GET['item_id'])){
		$item_id 	= $_GET['item_id'];	
		$submit 	= 'update';
		$title 		= 'Edite Item';		

		$item	= mysql_query("SELECT * FROM `item` WHERE `id`='$item_id'")
		or die('could not Select :'.mysql_error());
		if (mysql_num_rows($item) > 0) {
			while ($row=mysql_fetch_object($item)) {				
				$name  			= $row->item_name;
				$category		= $row->category;
				$description	= $row->description;
				$coast			= $row->coast;
				$date 	 		= $row->date;
			}
		}
	}
	// get item id for edit
?>
<div class="content">
	<div class="container">
		<div class="page_head"><!-- page head-->
			<span><?php echo $title; ?></span>
			<div class="pull-right">
				<a href="view_items.php" class="btn btn-success">View Items</a>
			</div>
		</div><!-- page head-->
		<div class="page_body"><!-- page body-->						
			<div class="col-md-offset-3 col-md-6 back_white">
				<form method="POST" action="itemController.php" id="form">					
					<div class="form-group pmd-textfield">
					  <label for="name" class="control-label">Name</label>
					  <input type="text" name="name" class="form-control" value="<?php if(isset($_GET['item_id']))echo $name; ?>" required>
					</div>
					<div class="form-group pmd-textfield">
						<label class="control-label" for="category">Category</label>
						<select class="form-control" name="category" required>
							<option></option>
							<?php 
							for ($i=0; $i < count($names); $i++) { 
							?>

							<option value="<?php echo $ids[$i];?>" <?php if(isset($_GET['item_id'])&& $category== $ids[$i])echo "selected"; ?>> <?php echo $names[$i];?> </option>
							
							<?php
							}
							?>							
						</select>			
					</div>
					<div class="form-group pmd-textfield">
					  <label for="description" class="control-label">Description</label>
					  <input type="text" name="description" class="form-control" value="<?php if(isset($_GET['item_id']))echo $description; ?>" required>
					</div>
					<div class="form-group pmd-textfield">
					  <label for="coast" class="control-label">Coast</label>
					  <input type="text" name="coast" class="form-control" value="<?php if(isset($_GET['item_id']))echo $coast; ?>" required>
					</div>
					<div class="form-group pmd-textfield">
					  <label for="date" class="control-label">Date</label>
					  <input type="text" name="date" id="date" class="form-control" value="<?php if(isset($_GET['item_id']))echo $date; ?>" required>
					</div>
					<div class="form-group pmd-textfield">
						<input type="hidden" name="id" value="<?php if(isset($_GET['item_id']))echo $item_id; ?>">
						<input type="submit" name="<?php echo $submit; ?>" value="<?php echo $submit; ?>" class="btn btn-primary pull-right" required>
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
<!-- Datepicker moment with locales -->
<script type="text/javascript" language="javascript" src="http://propeller.in/components/datetimepicker/js/moment-with-locales.js"></script>
<!-- Propeller Bootstrap datetimepicker -->
<script type="text/javascript" language="javascript" src="http://propeller.in/components/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>

<script>
	$(document).ready(function(){		
		// Default date and time picker
		$('#date').datetimepicker({
			viewMode: 'days',
			format: 'YYYY-MM-DD'
		});
	});
</script>
<script>
$(document).ready(function(){
	$("#form").validate();
});
</script>
