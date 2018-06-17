       <?php //require_once('db.php');
    require_once ("db.php");
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection,$query);
    ?>
       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MGM's College of Engineering</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php $row = mysqli_fetch_assoc($result); 
                    while($row)
                    {
                        /*This is a good practice of writing the html tags within PHP.
                        If we were to write PHP within HTML, then everywhere we had to mention the <?php ?> tags...*/
                        echo "<li><a href='#'>{$row['cat_title']}</a></li>";
                        /*Illegal way:
                        echo "<li><a href='#'>$row['cat_title']</a></li>";
                         We cannot give "" within a "". Hence we use '' within "".
                         Similarly, we cannot give '' within a ''. Hence we use {} within ''.
                        */
                        $row = mysqli_fetch_assoc($result); 
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>