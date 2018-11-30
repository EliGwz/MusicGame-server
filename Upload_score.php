<?php
    $db_server = "sophia.cs.hku.hk";
    $db_user = "wzgao";
    $db_pwd = "Qwmgwz14";

    $uid = $_POST['usr_ID'];
    $sid = $_POST['song_ID'];
    $score = $_POST['score'];

    $link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server,  $db_user,  $db_pwd)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
    $db_selected = mysqli_select_db( $link, $db_user);

    if(!$db_selected)
    {
        ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
        die(mysqli_error($GLOBALS["___mysqli_ston"]));
    }

    $sql_for_count =  "SELECT COUNT(id) FROM records;";
    $num = mysqli_query($GLOBALS["___mysqli_ston"], $sql_for_count);
    $rid = (($GLOBALS["___mysqli_ston"] = mysqli_fetch_array($num)));
    $rid[0] = $rid[0] + 1;

    $sql = "INSERT INTO records(`id`, `user_id`, `song_id`, `score`) VALUES ('$rid[0]','$uid','$sid','$score');";
    mysqli_query($link, $sql);
?>
