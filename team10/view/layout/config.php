<?php
//define('DB_SERVER', 'localhost:3307');           //define('常數名稱','常數值'); refence:P6-2
    define('DB_SERVER', '172.17.0.1:3307');           //pls don't delete it! by Rui-Xin.
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '304db');                  //default NULL
define('DB_NAME', 'csie112');

//connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);       //i => improvement PDO => PHP Data Objects

// Check connection
if($link === false){
    die("ERROR: 無法連線至資料庫. " . mysqli_connect_error());
}
else{
    // set utf8
    mysqli_query($link, 'SET NAMES utf8');
    return $link;
}