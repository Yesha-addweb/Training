<?php 
include_once('model/UserinfoModel.php');

class userinfoController {

	private $UserinfoModel = NULL;

	public function __construct() {

	$this->UserinfoModel = new UserinfoModel();

	}

	public function handleRequest() {

        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'list' ) {
                $this->ListUser();
            } elseif ( $op == 'add' ) {
                $this->addUser();
            } elseif ( $op == 'delete' ) {
                $this->deleteUser();
            } elseif ( $op == 'edit' ) {
                $this->editUser();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function addUser() {
    	if(isset($_POST['submit']) && !empty($_POST['submit'])) 
    	{
    		$arrayUserinfo = array();
    		$arrayUserinfo['name'] = $_POST['name'];
    		$arrayUserinfo['status'] = $_POST['status'];
    		$result = $this->UserinfoModel->addUser($arrayUserinfo);
            if($result) {
                header('location:index.php?op=list&add_flag=1');
            }
            else {
                header('location:index.php?op=list&add_flag=0');
            }
    	}
    	else {
            $row = array();
    		include('view/add_user.php');
    	}
    	
    }

    public function ListUser() {
       
    	$result = $this->UserinfoModel->listUser();
    	$noofrow = mysqli_num_rows($result);
    	include('view/userList.php');
    }

    public function editUser() {
     	if(!empty($_GET['id'])) {
     		$id = $_GET['id'];
     		$result = $this->UserinfoModel->FetchUserDetails($id);
     		$row = mysqli_fetch_array($result);
     		if(isset($_POST['submit']) && !empty($_POST['submit'])) 
	    	{
	    		$arrayUserinfo = array();
	    		$arrayUserinfo['id'] = $_POST['id'];
	    		$arrayUserinfo['name'] = $_POST['name'];
	    		$arrayUserinfo['status'] = $_POST['status'];
	    		$result = $this->UserinfoModel->UpdateUser($arrayUserinfo);
                if(!empty($result)) {
                    header('location:index.php?op=list&update_flag=1');
                } else {
                    header('location:index.php?op=list&update_flag=0');
                }
	    	}
	    	else {
	    		include('view/add_user.php');
	    	}
     	}
    }

    public function deleteUser() {
    	if(!empty($_GET['id'])) {
    		$id = $_GET['id'];
    		$result = $this->UserinfoModel->deleteUser($id); 
            if(!empty($result)) {
                header('location:index.php?op=list&delete_flag=1');
            }  
            else {
                header('location:index.php?op=list&delete_flag=0');
            } 		
    	}
    }
}
?>