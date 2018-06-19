<?php include "includes/header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/navigation.php"; ?>     
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small>Add Category</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../admin/index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Categories
                            </li>
                        </ol>
                        
                      
                        <div class="col-xs-6">
                          <form action="categories.php" method="POST">
                            <div class="form-group">
<?php 
if(isset($_POST['submit']))
{
    $cat_title = $_POST['cat_title'];
    if($cat_title == " " || empty($cat_title))
       {
         echo "This field cannot be empty." . "<br>";
       }
    else
    {
        $query = "INSERT into categories(cat_title) ";
        $query .= "VALUE('$cat_title')";
        $result = mysqli_query($connection, $query);
        if(!$result)
        {
            die('QUERY FAILED'.mysqli_error($connection));
        }
    }
}
?>  
                               <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" title="cat_title" name="cat_title" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                          </form>  
                        </div>
                        <div class="col-xs-6">
                        <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                        <thead>
                          <tr class="info">
                            <th>ID</th>
                            <th>Category Title</th>
                            <th colspan="2">Options</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php //This query selects all categories
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection,$query);
                                $row = mysqli_fetch_assoc($result); 
                                while($row)
                                {
                                    echo "<tr><td>{$row['cat_id']}</td>";
                                    echo "<td>{$row['cat_title']}</td>";                    
                                    echo "<td><i class='fa fa-pencil' aria-hidden='true'></i></td>";
                                    echo "<td><a href='categories.php?delete={$row['cat_id']}'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>";
                                    $row = mysqli_fetch_assoc($result); 
                                }
                            ?>
                            <?php /*0This query deletes the category that it 'GETS' from link having 'delete' with value {$row['cat_id']} */
                                if(isset($_GET['delete']))
                                {
                                     /* This $_GET['delete'] has the id of the category which we want to delete */
                                    $query = "DELETE FROM categories WHERE cat_id = {$_GET['delete']}";
                                    $delete_query = mysqli_query($connection, $query);
                                    /*Till this point the category is deleted, but it takes two clicks to do so.
                                     It takes two clicks because, in the first click the category is deleted, but the deleted category only disappears if we refresh the page. 
                                    To reduce the number of clicks, we include a function names "header()", which automatically refreshs the page as soon as the category is deleted.
                                    */
                                    header("Location: categories.php");
                                }
                            
                            
                            ?>
                        </tbody>
                      </table>
                        </div>    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>