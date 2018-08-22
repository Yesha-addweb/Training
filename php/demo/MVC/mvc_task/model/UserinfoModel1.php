<?php

class UserinfoModel1
{
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect("mysql", "root", "root", "task_mvc");
        //mysqli_select_db("mvc_demo", $con);
    }

    public function addProduct($arrayUserinfo)
    {
        
        $product_category = array();
          
        $query = "INSERT INTO product(name,  price, quantity, status)
        VALUES('" . addslashes($arrayUserinfo['name']) . "',
        '" . addslashes($arrayUserinfo['price']) . "',
        '" . addslashes($arrayUserinfo['quantity']) . "',
        '" . addslashes($arrayUserinfo['status']) . "')";
        
        $result = mysqli_query($this->con, $query);
        $product_Id = mysqli_insert_id($this->con);
        
        foreach ($arrayUserinfo['category_name'] as $key => $value) {
           $queryInsert = "INSERT INTO product_category(product_id,category_id) VALUES ('" . $product_Id . "', '" .$value. "')";
           $result = mysqli_query($this->con, $queryInsert);

        }
        return $result;
    }

    public function updateProduct($arrayUserinfo)
    {

    
        $product_category = array();

        $query = "UPDATE product
                    SET name ='" . addslashes($arrayUserinfo['name']) . "' ,
                    price ='" . addslashes($arrayUserinfo['price']) . "' ,
                    quantity ='" . addslashes($arrayUserinfo['quantity']) . "' ,
                    status = '" . addslashes($arrayUserinfo['status']) . "'
                    WHERE id='" . $arrayUserinfo['id'] . "'";

        $result = mysqli_query($this->con, $query);

        $queryDelete = "DELETE FROM product_category WHERE product_id = '" . $arrayUserinfo['id'] . "'";
        $result = mysqli_query($this->con, $queryDelete);

        foreach ($arrayUserinfo['category_name'] as $key => $value) {
           $queryInsert = "INSERT INTO product_category(product_id,category_id) VALUES ('" . $arrayUserinfo['id']  . "', '" .$value. "')";
           $result = mysqli_query($this->con, $queryInsert);

        }
        return $result;
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM product WHERE id=$id";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function ListProduct()
    {

        $query = "SELECT * FROM product";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function category()
    {
        $query = "SELECT * FROM category";
        $result = mysqli_query($this->con, $query);
        return $result;
        
    }

    public function active($id)
    {

        $query = "SELECT * FROM product where status='$id'";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function FetchUserDetails($id)
    {

        $query = "SELECT * FROM product WHERE id='$id'";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    /*
        This function is used to display selected category list for the given product
    */
    
    public function selectJoin($product_id = NULL)
    {

        $query = "SELECT product_category.product_id, product_category.category_id FROM product_category INNER JOIN product ON product_category.product_id=product.id INNER JOIN category ON product_category.category_id=category.id";

        if (!is_null($product_id)){
            $query .= " WHERE product.id = $product_id"; 
        }

        $result = mysqli_query($this->con, $query);
        $arrProdCat = array();
        while($r = mysqli_fetch_array($result)) {
            $arrProdCat[] = $r['category_id'];
        }

        return $arrProdCat;
    }

    public function updateStatus()
    {
        $query = "UPDATE product SET status = 1";
        $result = mysqli_query($this->con, $query);
        return $result;
    }
}

?>