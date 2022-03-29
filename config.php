<?php

define ('host', "localhost");
define ('user', "root");
define ('password', "");
define ('dataBase', "blog");
define ('amount', 3);

function connectDatabase() {
    
    $con = mysqli_connect(host, user, password, dataBase);
    mysqli_set_charset($con,"utf8");
    return $con;
}
