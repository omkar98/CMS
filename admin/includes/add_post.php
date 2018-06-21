<?php global $count_posts;?>
<?php if(isset($_POST['create_post']))   
{
    $post_title = $_POST['title'];  
    $post_author = $_POST['author'];  
    $post_category_id = $_POST['post_category_id'];  
    $post_status = $_POST['post_status'];  

    $post_image = $_FILES['image']['name'];  
    $post_image_temp = $_FILES['image']['tmp_name'];  
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
    
    $query .= "VALUES ({$post_category_id},'{$post_title}', '{$post_author}',now(),'{$post_image}','{$post_content}', '{$post_tags}','{$post_comment_count}','{$post_status}')";
    
    $create_post_query = mysqli_query($connection, $query);
    if(!$create_post_query)
    {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    else
    {
        echo "Post created Successfully!";
    }
}

?>

  <!--To get an image from the form we use the enctype field-->
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>    
    <div class="form-group">
       <label for="post_category">Post category </label>
        <select name="post_category_id" id="post_category_id">
        <?php //This query selects all categories
        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);         
        while($row)
        {
            $cat_title=$row['cat_title'];
            $cat_id=$row['cat_id'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";   
            $row = mysqli_fetch_assoc($result);         
        }

        ?>
        </select>
    </div>    
    <div class="form-group">
       <label for="post_author">Author</label>
        <input type="text" class="form-control" name="author">
    </div>    
    <div class="form-group">
       <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>    
    <div class="form-group">
       <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>    
    <div class="form-group">
       <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div> 
    <div class="form-group">
       <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div> 
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>    
</form>