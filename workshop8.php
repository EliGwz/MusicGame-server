<?php

/* Step 4.1 Start */
$db_server = "sophia.cs.hku.hk";
$db_user = "wzgao";
$db_pwd = "Qwmgwz14";
$link = mysql_connect($db_server, $db_user, $db_pwd) or die(mysql_error());
$db_selected = mysql_select_db($db_user, $link);
/* Step 4.1 End */

/* Step 5.1 Start */
// Do something here..
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
$res = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($res)) {
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
