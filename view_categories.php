<?php 
include 'db.php';
session_start();
if (isset($_SESSION['user'])) {	
	include 'head.php';
	include 'nav.php';

	$ids 	= array();
	$names 	= array();
	$dates 	= array();
	$categories		= mysql_query("SELECT * FROM `category`")
	or die('could not Select :'.mysql_error());
	if (mysql_num_rows($categories) > 0) {
		while ($row=mysql_fetch_object($categories)) {
			$ids[]		= $row->id;
			$names[]   	= $row->name;
			$dates[] 	= $row->created_at;
		}
	}		
?>
<div class="content">
	<div class="container">
		<div class="page_head"><!-- page head-->
			<span>Categories</span>
			<div class="pull-right">
				<a href="add_category.php" class="btn btn-success">Add Category</a>
			</div>
		</div><!-- page head-->
		<div class="page_body"><!-- page body-->
			<div class="pmd-card pmd-z-depth">
				<div class="table-responsive">
					<table class="table pmd-table table-hover" >
						<thead>
			                <tr>
			                  <th></th>	
			                  <th> Name </th> 
			                  <th> Date </th> 
			                  <th colspan="2" class="center"> Action</th>              
			                </tr>
						</thead>
						<tbody>
						<?php
							$ceq 	= 0;
							for ($i=0; $i < count($names); $i++) { 
								$ceq++
						?>
							<tr>
								<td><?php echo $ceq; ?></td>
								<td><?php echo $names[$i]; ?></td>
								<td><?php echo $dates[$i]; ?></td>
								<td> 
									<a href="add_category.php?category_id=<?php echo $ids[$i];?>" class="btn btn-primary">Edit</a>
								</td>
								<td> 
									<form method="POST" action="categoryController.php">
										<input type="hidden" name="id" value="<?php echo $ids[$i]; ?>">
										<input type="submit" name="delete" value="Delete" class="btn btn-danger">
									</form>
								</td>
							</tr>
						<?php		
							}
						?>	
						</tbody>
					</table>
				</div>
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