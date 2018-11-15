<?php

/* Step 4.1 Start */
$db_server = "sophia.cs.hku.hk";
$db_user = "wzgao";
$db_pwd = "Qwmgwz14";
$link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($db_server,  $db_user,  $db_pwd)) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$db_selected = mysqli_select_db( $link, $db_user);
/* Step 4.1 End */

/* Step 5.1 Start */
$action = (isset($_GET['action']) ? $_GET['action'] : "");
$student_name = (isset($_GET['name']) ? $_GET['name'] : "");
if ($action == "insert" && $student_name) {
$sql = "INSERT INTO students (name) VALUES ('$student_name');";
$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]));$student_id = ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}
/* Step 5.1 End */

$course_code = "COMP7506";
$course_name = "Smart Phone Apps Development";
$teachers = array("1" => "Dr. T.W. Chim", "2" => "Dr. T.M. Chan");
echo '{';
echo '"course_code":"' . $course_code . '"';
echo ', "course_name":"' . $course_name . '"';
foreach ($teachers as $key => $val) {
echo ', "teacher_' . $key . '":"' . $val . '"';
}

/* Step 4.2 Start */
$students = array();
$sql = "SELECT name FROM students;";
$res = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
while ($row = mysqli_fetch_array($res)) {
	array_push($students, $row['name']);}
echo ', "students":[';
$add_delimiter = false;
for ($i=0; $i<count($students); $i++) {
	echo ($add_delimiter ? ', ' : '') . '"' . $students[$i] . '"';
	$add_delimiter = true;
}
echo ']';
/* Step 4.2 End */

echo '}';
?>
