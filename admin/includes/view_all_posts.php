<table class="table table-bordered table-hover">
<thead>
  <tr class="info">
    <th>ID</th>
    <th>Author</th>
    <th>Title</th>
    <th>Category</th>
    <th>Status</th>
    <th>Image</th>
    <th>Tags</th>
    <th>Comments</th>
    <th>Date</th>
  </tr>
</thead>
<tbody>
<?php //This query selects all categories
$query = "SELECT * FROM posts";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result); 
while($row)
{
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comments = $row['post_comment_count'];
    $post_date = $row['post_date'];
    echo "<tr>";
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_category_id}</td>";
    echo "<td>{$post_status}</td>";
    //echo "<td>{$post_image}</td>";
    echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comments}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='posts.php?delete={$post_id}'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
    echo "</tr>"; 
    $row = mysqli_fetch_assoc($result); 
}
    if(isset($_GET['delete']))
    {
        $deleted_post=$_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$deleted_post}";
        $deletion = mysqli_query($connection, $query);
        if(!$deletion)
        {
            die('Delete Query Failed'.mysqli_error($connection));
        }
        else
        {
            header("Location: posts.php");
        }        
    }
    
?>
</tbody>
</table>