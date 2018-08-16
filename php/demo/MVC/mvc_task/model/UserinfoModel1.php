<?php 
class UserinfoModel {
	var $con;
	function __construct()
  	{
	     $this->con = mysqli_connect("mysql", "root", "root","task_mvc");
	     //mysqli_select_db("mvc_demo", $con);
  	}

	public function addUser($arrayUserinfo) {
		
		$query = "INSERT INTO product(name, category_name, price, quantity, status) 
					VALUES('" . addslashes($arrayUserinfo['name']) . "',
							'" . addslashes($arrayUserinfo['category_name']) . "',
							'" . addslashes($arrayUserinfo['price']) . "',
							'" . addslashes($arrayUserinfo['quantity']) . "',
							'". addslashes($arrayUserinfo['status']) ."')";
		
		$result = mysqli_query($this->con, $query);
		return $result;
	}

	public function listUser() {	
	
		$query = "SELECT * FROM product";
		$result = mysqli_query($this->con, $query);
		return $result;
	}

	public function FetchUserDetails($id) {
		
		$query = "SELECT * FROM product WHERE id='$id'";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}

	public function UpdateUser($arrayUserinfo) {
		
		$query = "UPDATE product 
					SET name ='". addslashes($arrayUserinfo['name']) . "' , 
					category_name ='". addslashes($arrayUserinfo['category_name']) . "' , 
					price ='". addslashes($arrayUserinfo['price']) . "' , 
					quantity ='". addslashes($arrayUserinfo['quantity']) . "' , 
					status = '" . addslashes($arrayUserinfo['status']) . "'
					WHERE id='" . $arrayUserinfo['id'] . "'";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}

	public function deleteUser($id) {
		
		$query = "DELETE FROM product WHERE id=$id";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}

	public function selectJoin() {

		$query = "SELECT product.id, category.name, product.price, product.quantity, product.status
				  FROM product
				  JOIN category ON product.category_id=category.category_id;";
		$result = mysqli_query($this->con, $query);
		return $result;
	}
}
?>

