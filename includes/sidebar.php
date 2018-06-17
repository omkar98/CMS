<!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                

                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
<?php //require_once('db.php');
require_once ("db.php");
$count = 1;
$query = "SELECT * FROM categories LIMIT 8";
$result = mysqli_query($connection,$query);
?>
<?php $row = mysqli_fetch_assoc($result); 
while($row && $count<=4)
{
echo "<li><a href='#'>{$row['cat_title']}</a></li>";
$row = mysqli_fetch_assoc($result); 
$count++;
}
?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
<?php 
while($row && $count>4 && $count<=8)
{
echo "<li><a href='#'>{$row['cat_title']}</a></li>";
$row = mysqli_fetch_assoc($result); 
$count++;
} 
?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>