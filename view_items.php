<?php 
session_start();
if (isset($_SESSION['user'])) {
	include 'head.php';
	include 'nav.php';

	$ids 			= array();
	$names 			= array();
	$categories 	= array();
	$description 	= array();
	$coast 			= array();
	$dates 			= array();

	$items		= mysql_query("SELECT item.id,item.item_name,item.description,item.coast,item.date,category.name FROM `item` INNER JOIN category ON item.category=category.id")
	or die('could not Select :'.mysql_error());
	if (mysql_num_rows($items) > 0) {
		while ($row=mysql_fetch_object($items)) {
			$ids[]			= $row->id;
			$names[]   		= $row->item_name;
			$categories[]	= $row->name;
			$description[]	= $row->description;
			$coast[]		= $row->coast;
			$dates[] 		= $row->date;
		}
	}
?>
<div class="content">
	<div class="container">
		<div class="page_head"><!-- page head-->
			<span> Items</span>
			<div class="pull-right">
				<a href="add_item.php" class="btn btn-success">Add Item</a>
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
			                  <th> Category </th>
			                  <th> Description </th> 
			                  <th> Coast </th>              
			                  <th> Date </th>
			                  <th colspan="2"> Action</th>
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
									<td><?php echo $categories[$i]; ?></td>
									<td><?php echo $description[$i]; ?></td>
									<td><?php echo $coast[$i]; ?></td>
									<td><?php echo $dates[$i]; ?></td>
									<td> 										
										<a href="add_item.php?item_id=<?php echo $ids[$i];?>" class="btn btn-primary">Edit</a>
									</td>
									<td> 
										<form method="POST" action="itemController.php">
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