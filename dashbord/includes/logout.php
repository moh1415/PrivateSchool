<?php
session_start();

$_SESSION['name']=null;
$_SESSION['role']=null;
$_SESSION['class']=null;
$_SESSION['teacher_id']=null;
$_SESSION['student_id']=null;
$_SESSION['parent_id']=null;
//session_destroy();


header("Location: ../index.php");

?>