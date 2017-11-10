<?php

    header("Location: posts.php");
 
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

    $post_id = $_POST['post_id'];

    $deletePost = "DELETE FROM posts where id = $post_id LIMIT 1";

    $statement = $connection->prepare($deletePost);
    $statement->execute();

?>