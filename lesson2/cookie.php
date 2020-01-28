<?php
$name = $_POST['name'];
setcookie("myCookie",$name, time() + 10, "/");
 ?>
