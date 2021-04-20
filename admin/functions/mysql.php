<?php

    $db = new mysqli($config["mysqlHostname"],$config["mysqlUsername"],$config["mysqlPassword"],$config["mysqlDatabase"]);
    $db->query("SET NAMES utf8");
    if ($db->connect_errno)
    {
        echo "Cant't Connect to Database".$db->connect_error;
        exit();
    }
