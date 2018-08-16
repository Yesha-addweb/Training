<style>
	.succmsg {
		color: green;
		font-size:14px;
	}
	.failmsg {
		color: red;
		font-size:14px;
	}
</style>

<?php if(isset($_GET['add_flag']) && $_GET['add_flag'] == '1') {
	echo '<span class="succmsg"> Record Inserted Successfully </span>';
} else if(isset($_GET['update_flag']) && $_GET['update_flag'] == '1') {
	echo '<span class="succmsg"> Record Updated Successfully </span>';
} else if(isset($_GET['update_flag']) && $_GET['update_flag'] == '0') {
	echo '<span class="failmsg"> Something goes wrong..!! </span>';
} else if(isset($_GET['add_flag']) && $_GET['add_flag'] == '0') {
	echo '<span class="failmsg"> Something goes wrong..!! </span>';
} else if(isset($_GET['delete_flag']) && $_GET['delete_flag'] == '1') {
	echo '<span class="succmsg"> Record Deleted Successfully </span>';
} else if(isset($_GET['delete_flag']) && $_GET['delete_flag'] == '0') {
	echo '<span class="failmsg"> Something goes wrong..!! </span>';
} else {
	echo '';
}; ?>

<table cellpadding="10" cellspacing="5">
	<tr>
		<td colspan="6" align="right"><a href="index1.php?op=add">Add User</a></td>
	</tr>

	<tr>
		<th>Id</th>
		<th>Product Name</th>
		<th>Category Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	if($noofrow>0) {
		while($resultArray = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php echo $resultArray['id']; ?></td>
				<td><?php echo $resultArray['name']; ?></td>
				<td><?php echo $resultArray['categoy_id']; ?></td>
				<td><?php echo $resultArray['price']; ?></td>
				<td><?php echo $resultArray['quantity']; ?></td>
				<td><?php echo $resultArray['status']; ?></td>
				<td><a href="index1.php?op=edit&id=<?php echo $resultArray['id'];?>">Edit</a></td>
				<td><a onClick="javascript: return confirm('Please confirm deletion');" href="index1.php?op=delete&id=<?php echo $resultArray['id'];?>">Delete</a></td>
			</tr><?php
	} } else { ?>
		<td colspan="5">No Record</td><?php
	}?>
	
</table>