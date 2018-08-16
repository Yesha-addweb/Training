<form method="post" action="" name="addUserForm" enctype="multipart/form-data">
<table cellpadding="10">
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="first_name" value="<?php if(!empty($row['first_name'])) echo $row['first_name']; else echo '';?>"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="last_name" value="<?php if(!empty($row['last_name'])) echo $row['last_name']; else echo ''; ?>"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" value="<?php if(!empty($row['email'])) echo $row['email']; else echo '';?>"></td>
	</tr>
	<tr>
		<?php if(!empty($row["image"])) { ?>
		<td>Image:</td>
			<td><img src="image/<?php echo $row['image']; ?>" class="removeimage" height="170" width="175" /></td>
			<td><input type="submit" name="remove" class="removebutton" value="Remove" onclick="remove()"></td>
		<?php } else { ?>	
		<td>Image:</td>
		<td><div class="file"><input type="file" name="image" value="<?php if(!empty($row['image'])) echo $row['image']; else echo '';?> "></div></td>
		<?php } ?>
	</tr>
	<tr>
		<td>Address:</td>
		<td><input text="text" name="address" value="<?php if(!empty($row['address'])) echo $row['address']; else echo '';?>"></td>
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