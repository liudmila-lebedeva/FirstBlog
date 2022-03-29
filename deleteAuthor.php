<?php

include_once 'config.php';

$author = filter_input(INPUT_POST, 'author');

$con = connectDatabase();

//избежать проблем с апострофами:
$author = mysqli_real_escape_string($con, $author);

$query = "DELETE FROM messages WHERE author = '$author'";

//close the connection

mysqli_query($con, $query);

mysqli_close($con);

header('Location: index.php');
