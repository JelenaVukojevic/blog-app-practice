<?php
 
    header("Location: http://localhost:8000/posts.php");

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

    $newComment = "INSERT INTO posts (title, body, author, created_at) VALUES ('{$_POST['title']}', '{$_POST['text']}', '{$_POST['author']}', '2017-11-11 21:59')";

    var_dump($newComment);

       $statement = $connection->prepare($newComment);
       $statement->execute();
?>