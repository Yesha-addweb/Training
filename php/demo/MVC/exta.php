public function UpdateUser($arrayUserinfo) {
		$query = "UPDATE userinfo 
					SET first_name ='". addslashes($arrayUserinfo['first_name']) . "' , 
					last_name = '" . addslashes($arrayUserinfo['last_name']) . "', 
					email = '" . addslashes($arrayUserinfo['email']) . "',";

		if() {
			$query .= "image = '" . addslashes($arrayUserinfo['image']). "',";
		}
		$query .= "address = '" . addslashes($arrayUserinfo['address']) . "'  
					WHERE id='" . $arrayUserinfo['id'] . "'";		
		$result = mysqli_query($this->con, $query);	
		return $result;
	}

<!-- <script>
function remove()
{
  var status = confirm("Are You Sure You Want To Remove The Image");  
  if(status==true)
  {
    var file = $(".removebutton").val();
    $.ajax({
      type:"POST",
      url:"userinfoController.php",
      data:{file:file},
      success(html){
       alert('Deleted');
      }
    });
  }
 }
</script> -->

<!-- <script>
  function remove(id)
  {
      var status = confirm("Are You Sure You Want To Remove The Image");  
      jQuery.ajax({
       type: "POST",
       url: "update.php",
       data: 'id='+id,
       cache: false,
       success: function(response)
       {
         alert("Record successfully updated");
       }
     });
 }
</script> -->