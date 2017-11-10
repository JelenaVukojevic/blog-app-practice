<?php
 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    var_dump($_POST)

    $newComment = "INSERT INTO posts (title, body, author, created_at) VALUES ('{$_POST['title']}', '{$_POST['text']}', 'JelenaV' , '{$_POST['YYYY-MM-DD hh:mm:ss']}')";

       $statement = $connection->prepare($newComment);
       $statement->execute();
?>