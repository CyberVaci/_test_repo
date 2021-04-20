<?php
include "../../config/config.php";
include "../../functions/mysql.php";
include "../../functions/user.php";

$db->query("UPDATE token SET status=2 where id=".mysqli_real_escape_string($db, $_GET['id'])." LIMIT 1");
echo "1";
