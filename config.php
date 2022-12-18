<?php
define('DB_SEVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','studyfirst');
$conn=mysqli_connect(DB_SEVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if(!$conn){
    die("DB Connection Failed!!! ".mysqli_connect_error());
}
?>


