<?php

class UserinfoModel
{
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect("mysql", "root", "root", "task_mvc");
        //mysqli_select_db("mvc_demo", $con);
    }

    public function addCategory($arrayUserinfo)
    {
        $query = "INSERT INTO category(name, status)
					VALUES('" . addslashes($arrayUserinfo['name']) . "',
							'" . addslashes($arrayUserinfo['status']) . "')";

        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function ListCategory()
    {

        $query = "SELECT * FROM category";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function active($id)
    {

        $query = "SELECT * FROM category where status='$id'";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function FetchUserDetails($id)
    {

        $query = "SELECT * FROM category WHERE id='$id'";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function UpdateCategory($arrayUserinfo)
    {

        $query = "UPDATE category
					SET name ='" . addslashes($arrayUserinfo['name']) . "' ,
					status = '" . addslashes($arrayUserinfo['status']) . "'
					WHERE id='" . $arrayUserinfo['id'] . "'";
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function deleteCategory($id)
    {

        $query = "DELETE FROM category WHERE id=$id";
        $result = mysqli_query($this->con, $query);
        return $result;
    }
}

?>

