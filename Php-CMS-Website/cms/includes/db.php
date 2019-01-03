<?php
// make the value into constant can make it safer
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "cms";

foreach($db as $key => $value){
    //define($DB_HOST,$db_host)
    define(strtoupper($key), $value);
}

//mysqli_connect("name","address", "password","databasename")
//$connection = mysqli_connect('localhost', 'root','root','cms');
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if($connection){
//    echo "we are connected";
//}
?>