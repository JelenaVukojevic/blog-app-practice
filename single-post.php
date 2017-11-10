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

            <div class="deletePost">
                <form class="deleteComm" method="post" action='delete-post.php'>
                    <input type="submit" name="delete" value="Delete this post" onclick="promptMe()">
                    <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
                </form>
            </div>

	        <div class="comments">
                <h3>Comments</h3>

                <?php

                	$sql = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
                	$statement = $connection->prepare($sql);
                	$statement->execute();
                	$statement->setFetchMode(PDO::FETCH_ASSOC);
                	$comments = $statement->fetchAll();

                ?>

                <form method="post" action="new-comment.php">
                    <label for="author">Author</label>
                    <input type="text" name="author" placeholder="Your name" required>
                    <label for="comment">Comment text</label>
                    <textarea name="comment" rows="3" cols="40" placeholder="Type your comment..." required></textarea>
                    <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
                    <input type="submit" value="Submit comment">    
                </form>

              
                <div class="comment">
                	<a id="hideshow" class="btn btn-outline-primary" href="#" onclick="hideComments('hide-show')";>Hide comments</a>
                </div>

                <div id="comments">

	                <?php
		                foreach ($comments as $comment) {
		            ?>
                        <ul>
                        	<li> <?php echo $comment['author'] ?> </li>
                        	<li> <?php echo $comment['text'] ?> </li>
                        </ul>
                        <form class="deleteComm" method="post" action='delete-comment.php'>
                            <input type="submit" name="delete" value="Delete">
                            <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
                            <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
                        </form>
                        <hr>
                <?php
	                }
	            ?>

	            </div>

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

<script type="text/javascript" src="show-hide-comments.js"></script>
</body>
</html>