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
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Categories
                            </li>
                        </ol>
                        <div class="col-xs-6">
                          <form action="">
                            <div class="form-group">
                               <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" title="cat_title">
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
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>John</td>
                            <td>Doe</td>
                          </tr>
                          <tr>
                            <td>Mary</td>
                            <td>Moe</td>
                          </tr>
                          <tr>
                            <td>July</td>
                            <td>Dooley</td>
                          </tr>
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