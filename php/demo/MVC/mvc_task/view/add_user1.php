<?php
    // print("<pre>");
    // print_r($row);

// while($catRow = mysqli_fetch_assoc($row['categories'])) {
// if(in_array($catRow['id'], $row['product_category'])) { 
// print("<pre>");
// print_r($row['id']); 
// print_r($catRow['id']);   
// }
// exit;
// if(in_array($row['product_category'],$arrProdCat)){ 
//     print("<pre>");
//     print_r($row);
// }
// exit();
?>
<form method="post" action="" name="addUserForm">
    <table cellpadding="10">
        <tr>
            <td>Product Name:</td>
            <td><input type="text" name="name"
                       value="<?php if (!empty($row['name'])) echo $row['name']; else echo ''; ?>"></td>
        </tr>
        <tr>
            <td>Category Name:</td>
            <td><?php
                while($catRow = mysqli_fetch_assoc($row['categories'])) {
                    ?>
                    <input type="checkbox" name="check[]"
                       value="<?php echo $catRow['id'];?>" 
                       <?php if(in_array($catRow['id'], $row['product_category'])) { 
                            echo "Checked"; 
                        }?>>
                       <label><?php echo $catRow['name']; ?></label><?php
                }
            ?></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text" name="price"
                       value="<?php if (!empty($row['price'])) echo $row['price']; else echo ''; ?>"></td>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><input type="text" name="quantity"
                       value="<?php if (!empty($row['quantity'])) echo $row['quantity']; else echo ''; ?>"></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td><input type="text" name="status"
                       value="<?php if (!empty($row['status'])) echo $row['status']; else echo ''; ?>"></td>
            <!-- <td><input type="radio" value="0" name="status"> &nbsp;&nbsp;&nbsp;&nbsp;0(Inacttive)
            <td><input type="radio" value="1" name="status"> &nbsp;&nbsp;&nbsp;&nbsp;1(Active)</td> -->
        </tr>
        <?php if (!empty($row['id'])) { ?>

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