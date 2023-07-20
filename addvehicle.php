<?php
       
       include('connection.php');
       include('header.php');
       
        ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('nav.php')?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                        if(isset($_GET['action'])){
                            $numberplate=$_GET['numberplate'];
                            $query = "SELECT * FROM vehicles WHERE numberplate ='$numberplate';";
                            $result = mysqli_query($db, $query);
                            if(mysqli_num_rows($result)>0) {
                                $rows=mysqli_fetch_assoc($result);
                                $numberplate2=$rows['numberplate'];
                                $brandname=$rows['brand'];
                                $drivername=$rows['driver'];
                                $ownername=$rows['owner'];
                            }
                        }
                        ?>
                        <h1 class="page-header">
                             <small>
                                <?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Vehicle Details';
                                 }}?>
                                Add A new Vehicle
                            </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2><?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Vehicle Details';
                                 }}?>
                        Add A new Vehicle Records</h2>
                    <div class="col-lg-6">

                        <form role="form" method="post">

                            <div class="form-group">
                                <input class="form-control" required placeholder="Registration Number"
                                    value="<?php echo isset($_GET['action'])? $numberplate2:''?>" name="reg_num">
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo isset($_GET['action'])? $brandname:''?>"
                                    required placeholder="Brand" name="brand">
                            </div>
                            <div class="form-group">
                                <select name="owner" class="form-control">
                                    <option value="">Select Vehicles Owners</option>
                                    <?php
                                        $sql = "SELECT * from users where role='owner'";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $username = $results['username'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if($username==$ownername){ echo "selected";}}?>
                                        value="<?php echo $username ?>">
                                        <?php echo $username ?></option>
                                    <?php

                                            }
                                        } else {
                                            ?>
                                    <option value="0">No Owner Found</option>
                                    <?php
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="driver" class="form-control">
                                    <option value="">Select Vehicles driver</option>
                                    <?php
                                        $sql = "SELECT * from users where role='driver'";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $username = $results['username'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if( $username==$drivername){ echo "selected";}}?>
                                        value="<?php  echo $username; ?>">
                                        <?php echo $username ?></option>
                                    <?php

                                            }
                                        } else {
                                            ?>
                                    <option value="0">No driver Found</option>
                                    <?php
                                        }
                                        ?>

                                </select>
                            </div>
                            <?php
                            if(isset($_GET['action'])){
                                ?>
                            <button type="submit" name="updatevehicle" class="btn btn-default">Update Record</button>
                            <?php
                            }else{
                            ?>
                            <button type="submit" name="addvehicle" class="btn btn-default">Save Record</button>
                            <?php
                            }
                            ?>
                            <button type="reset" class="btn btn-default">Clear Entry</button>
                        </form>
                    </div>
                </div>

                <?php
                if(isset($_POST['addvehicle'])){
                    $reg_num = $_POST['reg_num'];
                    $brand = $_POST['brand'];
                    $driver = $_POST['driver'];
                    $owner = $_POST['owner'];
                    $query = "INSERT INTO vehicles set numberplate='$reg_num',brand='$brand',driver='$driver',owner='$owner';";
                            mysqli_query($db,$query) or die ('Error in Adding into the  Database');    
                        
                    }
                if (isset($_POST['updatevehicle'])) {
                    $reg_num = $_POST['reg_num'];
                    $brand = $_POST['brand'];
                    $driver = $_POST['driver'];
                    $owner = $_POST['owner'];
                            $query = "UPDATE vehicles set numberplate='$reg_num',brand='$brand',driver='$driver',owner='$owner' where numberplate='$reg_num';";
                            mysqli_query($db,$query) or die ('Error in Adding into the  Database');    
                        }?>
                <!-- post drivers to the driver's table -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- post drivers to the driver's table -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>