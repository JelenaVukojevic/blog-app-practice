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
	<title>Vivify Blog - posts</title>
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

                $sql = "SELECT * FROM posts ORDER BY created_at DESC";
                $statement = $connection->prepare($sql);

                $statement->execute();

                $statement->setFetchMode(PDO::FETCH_ASSOC);

                $posts = $statement->fetchAll();

            ?>

            <?php
                foreach ($posts as $post) {
            ?>
            	<div class="blog-post">
	                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h2>
	                <p class="blog-post-meta"><?php echo $post['created_at'] . ' by ' . $post['author']?> </p>

	                <p><?php echo $post['body'] ?></p>
	            </div>
                    

            <?php
                }
            ?>


            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>

        <?php include('sidebar.php') ?>

    </div>

</main><!-- /.container -->

<?php include('footer.php') ?>
</body>
</html>


