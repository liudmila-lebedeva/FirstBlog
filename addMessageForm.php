<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Add your message</h1>
        <form action="saveMessage.php" method="POST">
            Author: <input type="text" name="author">
            <br>
            Title: <input type="text" name="title">
            <br>
            Message: <textarea name="message" row="5" cols="30"></textarea>
            <br>
            <input type="submit" value="send"></input>
        </form>
    </body>
</html>
