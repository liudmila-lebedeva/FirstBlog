<?php

include_once 'config.php';
$con = connectDatabase();

//to get ID:

//$id = $_GET['id'];

$id = filter_input(INPUT_GET, 'id');
$id = mysqli_escape_string($con, $id);

$query = "DELETE FROM messages WHERE id = '$id'"; 

mysqli_query($con, $query);
mysqli_close($con);

header('Location: index.php');
