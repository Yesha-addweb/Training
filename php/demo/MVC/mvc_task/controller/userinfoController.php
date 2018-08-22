<?php
include_once('model/UserinfoModel.php');

class userinfoController
{

    private $UserinfoModel = NULL;

    public function __construct()
    {

        $this->UserinfoModel = new UserinfoModel();
    }

    public function handleRequest()
    {

        $op = isset($_GET['op']) ? $_GET['op'] : NULL;
        try {
            if (!$op || $op == 'list') {
                $this->ListCategory();
            } elseif ($op == 'add') {
                $this->addCategory();
            } elseif ($op == 'delete') {
                $this->deleteCategory();
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

    public function addCategory()
    {
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {
            $arrayUserinfo = array();
            $arrayUserinfo['name'] = $_POST['name'];
            $arrayUserinfo['status'] = $_POST['status'];
            $result = $this->UserinfoModel->addCategory($arrayUserinfo);
            if ($result) {
                header('location:index.php?op=list&add_flag=1');
            } else {
                header('location:index.php?op=list&add_flag=0');
            }
        } else {
            $row = array();
            include('view/add_user.php');
        }
    }

    public function ListCategory()
    {

        $result = $this->UserinfoModel->ListCategory();
        $noofrow = mysqli_num_rows($result);
        include('view/userList.php');
    }

    public function Active()
    {
        $id = $_GET['id'];
        $result = $this->UserinfoModel->active($id);
        $noofrow = mysqli_num_rows($result);
        include('view/userList.php');

    }

    public function editUser()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->UserinfoModel->FetchUserDetails($id);
            $row = mysqli_fetch_array($result);
            if (isset($_POST['submit']) && !empty($_POST['submit'])) {
                $arrayUserinfo = array();
                $arrayUserinfo['id'] = $_POST['id'];
                $arrayUserinfo['name'] = $_POST['name'];
                $arrayUserinfo['status'] = $_POST['status'];
                $result = $this->UserinfoModel->UpdateCategory($arrayUserinfo);
                if (!empty($result)) {
                    header('location:index.php?op=list&update_flag=1');
                } else {
                    header('location:index.php?op=list&update_flag=0');
                }
            } else {
                include('view/add_user.php');
            }
        }
    }

    public function deleteCategory()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->UserinfoModel->deleteCategory($id);
            if (!empty($result)) {
                header('location:index.php?op=list&delete_flag=1');
            } else {
                header('location:index.php?op=list&delete_flag=0');
            }
        }
    }
}

?>