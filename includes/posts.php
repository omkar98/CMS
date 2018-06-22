<?php
/*We have already included db.php in navigation.php file. So, if we include the file here also, then Apache throws an error stating that DB_HOST, DB_USER etc, are already being defined. Hence to remove multiple copies of the same file, we use the function require_once().*/
//include "db.php";
require_once ("db.php");
$query = "SELECT * FROM posts";
$result = mysqli_query($connection, $query); 
$row = mysqli_fetch_assoc($result);
while($row)
{
    $p_id=$row['post_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_date=$row['post_date'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
?>
        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>
        <!-- First Blog Post -->
        <h2>
            <a href="post.php?source=<?php echo $p_id; ?>"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
        <hr>
        <p><?php echo $post_content; ?></p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
<?php
    $row=mysqli_fetch_assoc($result);
}
?>
<!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>