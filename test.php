<?php
echo "1111111111";
$db_server = "sophia.cs.hku.hk";
$db_user = "wzgao";
$db_pwd = "Qwmgwz14";

echo "login";

$link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server,  $db_user,  $db_pwd)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$db_selected = mysqli_select_db( $link, $db_user);

?>
