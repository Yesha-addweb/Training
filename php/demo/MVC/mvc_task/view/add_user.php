<form method="post" action="" name="addUserForm">
<table cellpadding="10">
	<tr>
		<td>Category Name:</td>
		<td><input type="text" name="name" value="<?php if(!empty($row['name'])) echo $row['name']; else echo '';?>"></td>
	</tr>
	<tr>
		<td>Status:</td>
		<td><input type="text" name="status" value="<?php if(!empty($row['status'])) echo $row['status']; else echo ''; ?>"></td>
	</tr>
	<?php if(!empty($row['id'])) {?>

	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Update">
			<input type="reset" name="reset" value="Cancel">
		</td>
	</tr><?php 

	} else { ?>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Save">
			<input type="reset" name="reset" value="Cancel">
		</td>
	</tr><?php
	} ?>
	
</table>
</form>