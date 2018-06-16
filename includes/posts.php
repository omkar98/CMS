<?php

$query = "SELECT * FROM posts";
$result = mysqli_query($connection, $query); 
$row = mysqli_fetch_assoc($result);
while($row)
{
    $post_tite=row['post_tile'];
    $post_author=row['post_author'];
    $post_date=row['post_date'];
    $post_image=row['post_image'];
    $post_content=row['post_content'];
?>
        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>
        <!-- First Blog Post -->
        <h2>
            <a href="#"><?php $post_tite ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php $post_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php $post_date ?></p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p><?php $post_content ?></p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
        <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>
<?php
    $row=mysqli_fetch_assoc($result);
}
?>