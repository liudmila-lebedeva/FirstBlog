<?php

include_once 'config.php';

$prev_author = filter_input(INPUT_POST, 'prev_author');
$new_author = filter_input(INPUT_POST, 'new_author');

$con = connectDatabase();

//избежать проблем с апострофами:
$prev_author = mysqli_real_escape_string($con, $prev_author);
$new_author = mysqli_real_escape_string($con, $new_author);

$query = "UPDATE messages SET author = '$new_author' WHERE author = '$prev_author'";

//close the connection

mysqli_query($con, $query);

mysqli_close($con);

header('Location: index.php');

