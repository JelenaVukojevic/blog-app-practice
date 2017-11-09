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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vivify Blog</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<link href="styles/blog.css" rel="stylesheet">
	<link href="styles/styles.css" rel="stylesheet">
</head>
<body>
	<?php include('header.php') ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
                if (isset($_GET['post_id'])) {

                    $sql = "SELECT * FROM posts WHERE id = {$_GET['post_id']}";
                    $statement = $connection->prepare($sql);

                    $statement->execute();

                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    $singlePost = $statement->fetch();

            ?>

            <div class="blog-post">
	            <h2 class="blog-post-title"><?php echo($singlePost['title']) ?></h2>
	            <p class="blog-post-meta"><?php echo $singlePost['created_at'] . ' by ' . $singlePost['author']?> </p>

	            <p><?php echo $singlePost['body'] ?></p>
	        </div>

	        <div>
                <h3>Comments</h3>

                <?php

                	$sql = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
                	$statement = $connection->prepare($sql);
                	$statement->execute();
                	$statement->setFetchMode(PDO::FETCH_ASSOC);
                	$comments = $statement->fetchAll();

                ?>

                <?php
	                foreach ($comments as $comment) {
	            ?>

                    <div class="comments">
                        <ul>
                        	<li> <?php echo $comment['author'] ?> </li>
                        	<li> <?php echo $comment['text'] ?> </li>
                        </ul>
                        <hr>
                    </div>

                <?php
	                }
	            ?>
                            

	        <?php
                } else {
                    echo('post_id nije prosledjen kroz $_GET');
                }
            ?>


            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>

        <?php include('sidebar.php') ?>

    </div>

</main>

<?php include('footer.php') ?>
</body>
</html>