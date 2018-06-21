<!--To get an image from the form we use the enctype field-->
<?php 
 if(isset($_GET['p_id']))
 {
    $query = "SELECT * FROM posts WHERE post_id = {$_GET['p_id']} ";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result); 
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comments = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
//$query1="UPDATE users SET username = '$username', password = '$password' WHERE id = $id ";
 }
if(isset($_POST['publish_post']))
{ 
    $post_title = $_POST['title'];  
    $post_author = $_POST['post_author'];  
    $post_category_id = $_POST['post_category_id'];  
    $post_status = $_POST['post_status'];  
    $post_image = $_FILES['image']['name'];

    if(empty($post_image))
    {
        $query1 = "SELECT * FROM posts WHERE post_id = {$_GET['p_id']} ";
        $req_image = mysqli_query($connection, $query1);
        $row = mysqli_fetch_assoc($req_image);
        $post_image = $row['post_image'];
    }
    else
    {  
        $post_image_temp = $_FILES['image']['tmp_name'];  
        move_uploaded_file($post_image_temp, "../images/$post_image");
    }
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    
    
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_image = '{$post_image}', ";    
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_date = '{$post_date}' ";
    $query .= "WHERE post_id = {$_GET['p_id']} ";
    
    $result1 = mysqli_query($connection, $query);
    
    if($result1)
    {
        echo "Post Updated Successfully!";
    }
    else
    {
        echo "Post Couldn't be Updated" . mysqli_error($connection);
    }
    
}
?>
   
   <form action="" method="post" enctype="multipart/form-data">   
    <div class="form-group">
       <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
    </div>    
       
    
    <div class="form-group">
       <label for="post_category_id">Category</label>
       <select name="post_category_id" id="post_category">
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
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
    </div>    
    <div class="form-group">
       <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
    </div>    
    <div class="form-group">
       <img width="30%" height="30%" src="../images/<?php echo $post_image; ?>" alt="image">
       <input type="file" name="image">
    </div>    
    <div class="form-group">
       <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div> 
    <div class="form-group">
       <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div> 
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="publish_post" value="Publish Post">
    </div>    
</form>