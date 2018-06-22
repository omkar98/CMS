<?php 
include "includes/header.php";
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
<?php 
    if(isset($_GET['source']))
    {
        $p_id = $_GET['source'];
        $query = "SELECT * FROM posts WHERE post_id = $p_id";
        $required_post = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($required_post);
        echo "<h1>{$row['post_title']}</h1>";
?>
                

                <!-- Author -->
                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $row['post_author'];?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'];?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $row['post_image'];?>" alt="">

                <hr>

                <!-- Post Content -->
                <p><?php echo $row['post_content'];?></p>

               <?php } //closing the if statement?>
               
                <!-- <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>
                
                <hr>
                
                Date/Time
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>
                
                <hr>
                
                Preview Image
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                
                <hr>
                
                Post Content
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p> -->

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php 
                include "includes/comments.php";
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
            <?php 
                include "includes/sidebar.php";
            ?>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
<?php 
include "includes/footer.php";
?>