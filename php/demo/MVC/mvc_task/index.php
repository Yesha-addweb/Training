<style>
    ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
        width: 800px;
        height: 40px;
    }

    ul li {
        width: 100px;
        height: 40px;
        line-height: 30px;
        float: left;
    }

    ul li a {
        text-decoration: none;
        color: WHITE;
    }

    ul li a:hover {
        color: RED;
    }
</style>

<html>
<body>
<div style="width:1250px;background-color:#000000;height:30px;color:#ffffff;">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="?op=list">Userlist</a></li>
    </ul>
</div>
<?php
echo "Welcome to the Category Page..!!";
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

