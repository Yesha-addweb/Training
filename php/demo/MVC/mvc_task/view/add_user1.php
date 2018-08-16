<form method="post" action="" name="addUserForm">
<table cellpadding="10">
	<tr>
		<td>Product Name:</td>
		<td><input type="text" name="name" value="<?php if(!empty($row['name'])) echo $row['name']; else echo '';?>"></td>
	</tr>
	<tr>
		<td>Category Name:</td>
		<td><input type="text" name="category_name" value="<?php if(!empty($row['category_name'])) echo $row['category_name']; else echo '';?>"></td>
	</tr>
	<tr>
		<td>Price:</td>
		<td><input type="text" name="price" value="<?php if(!empty($row['price'])) echo $row['price']; else echo '';?>"></td>
	</tr>
	<tr>
		<td>Quantity:</td>
		<td><input type="text" name="quantity" value="<?php if(!empty($row['quantity'])) echo $row['quantity']; else echo '';?>"></td>
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