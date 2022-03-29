<?php

include_once 'config.php';

$author = filter_input(INPUT_POST, 'author');
$title = filter_input(INPUT_POST, 'title');
$message = filter_input(INPUT_POST, 'message');

$con = connectDatabase();

//избежать проблем с апострофами:
$author = mysqli_real_escape_string($con, $author);
$title = mysqli_real_escape_string($con, $title);
$message = mysqli_real_escape_string($con, $message);

$query = "INSERT into messages (author, title, message) VALUES ('$author', '$title', '$message')";

mysqli_query($con, $query);

mysqli_close($con);

header('Location: index.php');
