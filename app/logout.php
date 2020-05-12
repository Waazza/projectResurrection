<?php
session_start();

foreach($_SESSION as $k => $v){
    unset($_SESSION[$k]);
}

$_SESSION['message'] = $arr_message[5];
header ('Location: index.php?id=1');


