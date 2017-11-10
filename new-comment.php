<?php

    header("Location: single-post.php?post_id={$_POST['post_id']}");
 
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

    // var_dump($_POST);

    $newComment = "INSERT INTO comments (author, text, post_id) VALUES ('{$_POST['author']}', '{$_POST['comment']}', '{$_POST['post_id']}')";

       $statement = $connection->prepare($newComment);
       $statement->execute();
?>