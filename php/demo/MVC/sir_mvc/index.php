<style>
ul{
  margin:0px;
  padding:0px;
  list-style:none;
  width:800px;
  height:40px;
}
ul li{
  width:100px;
  height:40px;
  line-height:30px;
  float:left;
}
ul li a{
  text-decoration:none;
  color:WHITE;
}
ul li a:hover{
	color:RED; 
}
b{
  font-size: 20px;
}
</style>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  $(document).ready(function()
  {
    $(".removebutton").click(function()
    {
      var r = confirm("Are You Sure You Want To Remove The Image");
      if(r == true)
      {
        $ajax({
          url: "userinfoController.php",
          type: 'POST',
          data: 'id='+id,
          context: this,
          success: function(result) {
            alert("Record successfully updated");
          }
        });
      }
      $(".file").show();
    });
  });
</script>

<!-- <script>
  $(document).ready(function()
  {
    $(".removebutton").click(function()
    {
      var r = confirm("Are You Sure You Want To Remove The Image");
      if(r == true)
      {
        $(".removeimage").remove();
        $(".removebutton").remove();
        return false;
      }
      $("div").show();
    });
  });
</script> -->
</head>
<body>
<div style="width:1250px;background-color:#000000;height:30px;color:#ffffff;"> 
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="?op=list">Userlist</a></li>
</ul>
</div>
<?php
echo "<b>"."Welcome to the MVC ARCHITECTURE..!!"."</b>";
?>
<br/>
<br/>
</body>
</html>

<?php

require_once 'controller/userinfoController.php';

$controller = new userinfoController();

$controller->handleRequest();

?>