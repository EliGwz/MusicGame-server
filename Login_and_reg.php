<?php 

$db_server = "sophia.cs.hku.hk";
$db_user = "wzgao";
$db_pwd = "Qwmgwz14";

$uid = $_POST['usr'];
$pwd = $_POST['pwd'];
$action = $_POST['act'];

$link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server,  $db_user,  $db_pwd)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$db_selected = mysqli_select_db( $link, $db_user);

if(!$db_selected)
{
    ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
    die(mysqli_error($GLOBALS["___mysqli_ston"]));
}

if ($action == "login")
{
    $sql = "SELECT * FROM users WHERE id=('$uid') AND password=('$pwd');";

    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    if(!$res)
    {
        ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
        die(mysqli_error($GLOBALS["___mysqli_ston"]));
    }

    $recordCount = mysqli_num_rows($res);
    if($recordCount>0)
    {
        echo "success";
    }
    else
    {
         echo "fail";
    }
}
else if ($action == "reg")
{
    $sql = "SELECT * FROM users WHERE id=('$uid');";

    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    if (!$res)
    {
        ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
	die(mysqli_error($GLOBALS["___mysqli_ston"]));
    }

    $recordCount = mysqli_num_rows($res);
    if ($recordCount > 0)
    {
        echo "exist";
        ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
	die(mysqli_error($GLOBALS["___mysqli_ston"]));
    }
    else
    {
        $sql = "INSERT INTO users(id, password) VALUES(('$uid'),('$pwd'))";

	$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if (!$res)
	{
	    ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
	}
	else
	{
	    echo "success";
	}
    }
}
else
{
    echo "error";
}
?>
