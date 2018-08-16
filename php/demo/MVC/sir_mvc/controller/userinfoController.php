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
            } elseif ( $op == 'deleteimage' ) {
                $this->deleteimage();
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
            $arrayUserinfo['first_name'] = $_POST['first_name'];
    		$arrayUserinfo['last_name'] = $_POST['last_name'];
    		$arrayUserinfo['email'] = $_POST['email'];
            $arrayUserinfo['image'] = $_FILES['image']['name'];
            $arrayUserinfo['address'] = $_POST['address'];
            if(isset($_FILES["image"]) && !empty($_FILES["image"]))
            {
                $errors= array();
                $Name=$_POST['name'];
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $target_dir="image/";
                $target_file=$target_dir.basename($file_name);
                $file_ext=strtolower(end(explode('.',$file_name)));
                $expensions= array("jpeg","jpg","png");
                $imgcontent = addslashes(file_get_contents($file_tmp));
                
                //check file is image or not
                if(in_array($file_ext,$expensions) == false)
                {
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                // set maximum image upload size 2MB
                if($file_size > 2097152)
                {
                    $errors[]='File size must be excately 2 MB';
                }
                if (empty($errors) == true)
                {
                    if(move_uploaded_file($file_tmp,"image/".$file_name))
                    {
                        echo "file upload";
                    }
                    else
                    {
                       $this->showError("File not upload");
                    }
                    $connection = mysqli_connect("mysql","root","root","mvc_demo")
                    or die("problems connecting to DB");
                    $sql="insert into image(name,myimage,img_name) values('$Name','$imgcontent','$file_name')";
                    $q=mysqli_query($connection,$sql);
                    if($q)
                    {
                        echo "image inserted successfully";
                    }
                    else
                    {
                        echo "error";
                    }
                }
                else
                {
                    echo $errors;
                } 
            }

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
	    		$arrayUserinfo['first_name'] = $_POST['first_name'];
	    		$arrayUserinfo['last_name'] = $_POST['last_name'];
	    		$arrayUserinfo['email'] = $_POST['email'];
                $arrayUserinfo['image'] = $_FILES['image']['name'];
                $arrayUserinfo['address'] = $_POST['address'];
                
                if(isset($_FILES["image"]) && !empty($_FILES["image"]))
                {
                    $errors= array();
                    $Name=$_POST['name'];
                    $file_name = $_FILES['image']['name'];
                    $file_size =$_FILES['image']['size'];
                    $file_tmp =$_FILES['image']['tmp_name'];
                    $file_type=$_FILES['image']['type'];
                    $target_dir="image/";
                    $target_file=$target_dir.basename($file_name);
                    $file_ext=strtolower(end(explode('.',$file_name)));
                    $expensions= array("jpeg","jpg","png");
                    $imgcontent = addslashes(file_get_contents($file_tmp));
                    
                    //check file is image or not
                    if(in_array($file_ext,$expensions) == false)
                    {
                        $errors[]="extension not allowed, please choose a JPEG or PNG or JPG file.";
                    }
                    // set maximum image upload size 2MB
                    if($file_size > 2097152)
                    {
                        $errors[]='File size must be excately 2 MB';
                    }
                    if (empty($errors) == true)
                    {
                        if(move_uploaded_file($file_tmp,"image/".$file_name))
                        {
                            echo "file upload";
                        }
                        else
                        {
                            echo "file not upload";
                        }
                        $connection = mysqli_connect("mysql","root","root","mvc_demo")
                        or die("problems connecting to DB");
                        $sql="insert into image(name,myimage,img_name) values('$Name','$imgcontent','$file_name')";
                        $q=mysqli_query($connection,$sql);
                        if($q)
                        {
                            echo "image inserted successfully";
                        }
                        else
                        {
                            echo "error";
                        }
                    }
                    else
                    {
                        echo $errors;
                    } 
                }

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

    public function deleteimage() {
        if(!empty($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->UserinfoModel->UpdateUser($arrayUserinfo);
            $arrayUserinfo = mysqli_fetch_array($result);
            // $result = $this->UserinfoModel->deleteimage($id);

            if(!empty($result)) {
                header('location:index.php?op=deleteimage&delete_flag=1');
            }  
            else {
                header('location:index.php?op=deleteimage&delete_flag=0');
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