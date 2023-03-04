<?php
$db = mysqli_connect ('localhost','kosw0709','Oppidum12!','kosw0709');

$title = $_POST["title"];
$writer = $_POST["writer"];
$contents = $_POST["contents"];
$password = $_POST["password"];

$query = "insert into oppidum(title, writer, contents, password, write_date, view_count)
          values('".$title."','".$writer."','".$contents."','".$password."', now(), 0);";
mysqli_query($db, $query);

mysqli_close($db);
header("location:./main.php");
?>
