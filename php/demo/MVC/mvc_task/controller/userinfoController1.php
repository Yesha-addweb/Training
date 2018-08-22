<?php
include_once('model/UserinfoModel1.php');

class userinfoController
{

    private $UserinfoModel1 = NULL;

    public function __construct()
    {

        $this->UserinfoModel1 = new UserinfoModel1();

    }

    public function handleRequest()
    {

        $op = isset($_GET['op']) ? $_GET['op'] : NULL;
        try {
            if (!$op || $op == 'list') {
                $this->ListProduct();
            } elseif ($op == 'add') {
                $this->addProduct();
            } elseif ($op == 'delete') {
                $this->deleteProduct();
            } elseif ($op == 'edit') {
                $this->editUser();
            } elseif ($op == 'filter') {
                $this->Active();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function addProduct()
    {
            $categories = $this->UserinfoModel1->category();
            $row = array();
            $row['category'] = $this->UserinfoModel1->category();
            $row['categories'] = $categories;
            if (isset($_POST['submit']) && !empty($_POST['submit'])) {
                $arrayUserinfo = array();
                $arrayUserinfo['name'] = $_POST['name'];
                $arrayUserinfo['category_name'] = $_POST['check'];
                $arrayUserinfo['price'] = $_POST['price'];
                $arrayUserinfo['quantity'] = $_POST['quantity'];
                $arrayUserinfo['status'] = $_POST['status'];
                $result = $this->UserinfoModel1->addProduct($arrayUserinfo);
                if ($result) {
                    header('location:index1.php?op=list&add_flag=1');
                } else {
                    header('location:index1.php?op=list&add_flag=0');
                }
            } else {
                
                include('view/add_user1.php');
            }
        
    }

    public function editUser()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->UserinfoModel1->FetchUserDetails($id);
            $row = mysqli_fetch_array($result);
            $categories = $this->UserinfoModel1->category();
            $row['product_category'] = $this->UserinfoModel1->selectJoin($id);
            $row['categories'] = $categories;
            if (isset($_POST['submit']) && !empty($_POST['submit'])) {
                $arrayUserinfo = array();
                $arrayUserinfo['id'] = $_POST['id'];
                $arrayUserinfo['name'] = $_POST['name'];
                $arrayUserinfo['category_name'] = $_POST['check'];
                $arrayUserinfo['price'] = $_POST['price'];
                $arrayUserinfo['quantity'] = $_POST['quantity'];
                $arrayUserinfo['status'] = $_POST['status'];
                $result = $this->UserinfoModel1->updateProduct($arrayUserinfo);
                if (!empty($result)) {
                    header('location:index1.php?op=list&update_flag=1');
                } else {
                    header('location:index1.php?op=list&update_flag=0');
                }
            } else {
                include('view/add_user1.php');
            }
        }
    }

    public function ListProduct()
    {

        $result = $this->UserinfoModel1->ListProduct();
        $noofrow = mysqli_num_rows($result);
        include('view/userList1.php');
    }

    public function Category()    {

        $result = $this->UserinfoModel1->category();
        $noofrow = mysqli_num_rows($result);
        include('view/add_user1.php');
    }

    public function Active()
    {
        $id = $_GET['id'];
        $result = $this->UserinfoModel1->active($id);
        $noofrow = mysqli_num_rows($result);
        include('view/userList1.php');

    }

    public function deleteProduct()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->UserinfoModel1->deleteProduct($id);
            if (!empty($result)) {
                header('location:index1.php?op=list&delete_flag=1');
            } else {
                header('location:index1.php?op=list&delete_flag=0');
            }
        }
    }
}

?>