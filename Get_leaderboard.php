<?php
    $db_server = "sophia.cs.hku.hk";
    $db_user = "wzgao";
    $db_pwd = "Qwmgwz14";

      $sid = $_POST['song_ID'];
      $sdiff = $_POST['song_diff'];
//    $sid = 1;

    $link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server,  $db_user,  $db_pwd)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
    $db_selected = mysqli_select_db( $link, $db_user);

    if(!$db_selected)
    {
        ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
        die(mysqli_error($GLOBALS["___mysqli_ston"]));
    }

    $sql = "SELECT * FROM records WHERE song_id=('$sid') AND diff=('$sdiff') ORDER BY score DESC;";
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    
    if (!$res)
        {
            ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
            die(mysqli_error($GLOBALS["___mysqli_ston"]));
        }

    $recordCount = mysqli_num_rows($res);
    if ($recordCount == 0)
    {
        echo "empty";
    }
    else
    {
    	while($array = ($GLOBALS["___mysqli_ston"] = mysqli_fetch_array($res)))
	{
	    echo $array['user_id']."</next>";
	    echo $array['score']."</next>";
	}
    }
?>
