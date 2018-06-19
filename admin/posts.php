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
                            Posts
                            <small>All Posts</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../admin/index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Posts
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                     <?php
                        if(isset($_GET['source']))
                        {
                            $source = $_GET['source'];
                        }
                        else
                        {
                            $source = "";
                        }
                        switch($source)
                        {
                            case 'add_post':
                                include "includes/add_post.php";
                                break;
                            case 2:
                                echo "We are in 1";
                                break;
                            case 3:
                                echo "We are in 1";
                                break;
                            case 4:
                                echo "We are in 1";
                                break;
                            default:
                                "Lets look at the table: ";
                                include "includes/view_all_posts.php";   
                        }
                     ?>
                                      
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