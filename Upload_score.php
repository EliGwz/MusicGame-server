<?php
    $db_server = "sophia.cs.hku.hk";
    $db_user = "wzgao";
    $db_pwd = "Qwmgwz14";

    $uid = $_POST['usr_ID'];
    $sid = $_POST['song_ID'];
    $score = $_POST['score'];

    $link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server,$db_user,$db_pwd)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
    $db_selected = mysqli_select_db( $link, $db_user);

    if(!$db_selected)
    {
        ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
        die(mysqli_error($GLOBALS["___mysqli_ston"]));
    }

    $sql = "INSERT INTO records(`user_id`, `song_id`, `score`) VALUES ('$uid','$sid','$score');";
    echo $sql;
    mysqli_query($link, $sql);
?>
