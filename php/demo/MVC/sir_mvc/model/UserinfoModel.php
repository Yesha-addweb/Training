<?php 
class UserinfoModel {
	var $con;
	function __construct()
  	{
	     $this->con = mysqli_connect("mysql", "root", "root","mvc_demo");
	     //mysqli_select_db("mvc_demo", $con);
  	}

	public function addUser($arrayUserinfo) {
		
		$query = "INSERT INTO userinfo(first_name, last_name, email, image, address) 
					VALUES('" . addslashes($arrayUserinfo['first_name']) . "',
							'". addslashes($arrayUserinfo['last_name']) ."',
							'". addslashes($arrayUserinfo['email']) ."' ,
							'". addslashes($arrayUserinfo['image']) ."',
							'". addslashes($arrayUserinfo['address']) ."' )";
		
		$result = mysqli_query($this->con, $query);
		return $result;
	}

	public function listUser() {	
	
		$query = "SELECT * FROM userinfo";
		$result = mysqli_query($this->con, $query);
		return $result;
	}

	public function FetchUserDetails($id) {

		$query = "SELECT * FROM userinfo WHERE id='$id'";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}

	public function UpdateUser($arrayUserinfo) {
		// print_r($arrayUserinfo);
		// exit();
		$query = "UPDATE userinfo 
					SET first_name ='". addslashes($arrayUserinfo['first_name']) . "' , 
					last_name = '" . addslashes($arrayUserinfo['last_name']) . "', 
					email = '" . addslashes($arrayUserinfo['email']) . "',
					image = '" . addslashes($arrayUserinfo['image']). "',
					address = '" . addslashes($arrayUserinfo['address']) . "'  
					WHERE id='" . $arrayUserinfo['id'] . "'";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}


	public function deleteUser($id) {
		
		$query = "DELETE FROM userinfo WHERE id=$id";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}

	public function deleteimage($arrayUserinfo) {
		$query = "UPDATE userinfo SET image = '" . addslashes($arrayUserinfo['image']). "' WHERE id= '" . $arrayUserinfo['id'] . "'";
		$result = mysqli_query($this->con, $query);	
		return $result;
	}
}
?>