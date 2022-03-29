<!DOCTYPE html>
<?php
include_once 'config.php';
$current_page = filter_input(INPUT_GET, 'page'); 

if(!$current_page) {
    $current_page = 0;
}

$offset = $current_page * amount;



$previous = $current_page - 1;

if ($current_page > 1){
    $previous = $current_page - 1;
} else {
    $previous = 1;
}
$next = $current_page + 1;

$con = connectDatabase();
$query = "SELECT * FROM messages ORDER BY created DESC LIMIT $offset, " . amount;
$results = mysqli_query($con, $query);

$resultsArray = mysqli_fetch_all($results,
        MYSQLI_ASSOC);

mysqli_close($con);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php foreach ($results as $row) : ?>
            <h1><?= $row ['title'] ?></h1>
            <h3> by <?= $row ['author'] ?> at <?= $row ['created'] ?></h3>
            <div><?= nl2br($row ['message']) ?></div>
            <br>
            <a href="delete.php?id=<?=$row['id']?>"><button>delete</button></a>
            <a href="editForm.php?id=<?=$row['id']?>"><button>edit</button></a>
            <hr>
            <br>
<?php endforeach; ?>

                <a href="addMessageForm.php"><button>Add Message</button></a>
                <br>
                <a href="deleteAuthorForm.php"><button>Delete Author</button></a>
                <br>
                <a href="updateAuthorForm.php"><button>Update Author</button></a>
                <br>
                
                <a href="index.php?page=<?= $previous ?>">Prev</a>
                <a href="index.php?page=<?= $next ?>">Next</a>
    </body>
</html>
