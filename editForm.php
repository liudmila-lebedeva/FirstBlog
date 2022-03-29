<!DOCTYPE html>
<?php
include_once 'config.php';
$con = connectDatabase();
//to get ID:
$id = filter_input(INPUT_GET, 'id');
$id = mysqli_escape_string($con, $id);

$query = "SELECT * FROM messages WHERE id='$id'";
$results = mysqli_query($con, $query);

$row = mysqli_fetch_array($results);

mysqli_close($con);
if(!$row) {
    header('Location: index.php');
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Edit your message</h1>
        <form action="saveEditedMessage.php" method="POST">
            <input type="hidden" name="id" value="<?='$id'?>">
            Author: <input type="text" name="author" value="<?= $row['author']?>">
            <br>
            Title: <input type="text" name="title" value="<?= $row['title']?>">
            <br>
            Message: <textarea name="message" rows="5" cols="30"><?= $row['message']?></textarea>
            <br>
            <input type="submit" value="send"></input>
        </form>
    </body>
</html>
