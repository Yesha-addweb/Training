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
		<td colspan="10" align="center"><a href="index.php?op=add">Add User</a></td>
	</tr>

	<tr>
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Image</th>
		<th>Address</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	if($noofrow>0) {
		while($resultArray = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php echo $resultArray['id']; ?></td>
				<td><?php echo $resultArray['first_name']; ?></td>
				<td><?php echo $resultArray['last_name']; ?></td>
				<td><?php echo $resultArray['email']; ?></td>
				<td><img src="image/<?php echo $resultArray['image']; ?>" height="50" width="50"></td>
				<td><?php echo $resultArray['address']; ?></td>
				<td><a href="index.php?op=edit&id=<?php echo $resultArray['id'];?>">Edit</a></td>
				<td><a class="delete" onClick="javascript: return confirm('Please confirm deletion');" href="index.php?op=delete&id=<?php echo $resultArray['id'];?>">Delete</a></td>
			</tr><?php
	} } else { ?>
		<td colspan="5">No Record</td><?php
	}?>
	
</table>



