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
                            $idnumber=$_GET['id'];
                            $veheclereg=$_GET['vehicle_reg'];
                            $query = 'SELECT * FROM drivers WHERE idnumber = ' . $idnumber;
                            $result = mysqli_query($db, $query);
                            if(mysqli_num_rows($result)>0) {
                                $rows=mysqli_fetch_assoc($result);
                                $idnumber2=$rows['idnumber'];
                                $username=$rows['username'];
                                $contact=$rows['contact'];
                                $vehicle_reg=$rows['vehicle_reg'];
                            }
                        }
                        ?>
                        <h1 class="page-header">
                            M-Driver <small>
                                <?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Driver Details';
                                 }}?>
                                Add A new Driver
                            </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2><?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Driver Details';
                                 }}?>
                        Add A new Driver Records</h2>
                    <div class="col-lg-6">

                        <form role="form" method="post">
                            <div class="form-group">
                                <select name="username" class="form-control">
                                    <option value="">Select Driver's Name</option>

                                    <?php
                                        $sql = "SELECT * from users where role='driver'";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $username = $results['username'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if($vehicle_reg==$vehicle_reg){ echo "selected";}}?>
                                        value="<?php echo $username ?>">
                                        <?php echo $username ?></option>
                                    <?php

                                            }
                                        } else {
                                            ?>
                                    <option value="0">No Vehicle Found</option>
                                    <?php
                                        }
                                        ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type='number'
                                    value="<?php  echo isset($_GET['action'])?$idnumber:''?>" required
                                    placeholder="ID Number" name="idnumber">
                            </div>
                            <div class="form-group">
                                <select name="vehicle_reg" class="form-control">
                                    <option value="">Select Vehicle Registration</option>
                                    <?php
                                        $sql = "SELECT * from vehicles ";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $numberplate = $results['numberplate'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if($vehicle_reg==$vehicle_reg){ echo "selected";}}?>
                                        value="<?php echo $numberplate ?>">
                                        <?php echo $numberplate ?></option>
                                    <?php
                                            }
                                        } else {
                                            ?>
                                    <option value="0">No Vehicle Found</option>
                                    <?php
                                        }
                                        ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" required placeholder="Contact"
                                    value="<?php echo isset($_GET['action'])? $contact:''?>" name="Contact">
                            </div>
                            <?php
                            if(isset($_GET['action'])){
                                ?>
                            <button type="submit" name="updatedriver" class="btn btn-default">Update Record</button>
                            <?php
                            }else{
                            ?>
                            <button type="submit" name="adddriver" class="btn btn-default">Save Record</button>
                            <?php
                            }
                            ?>
                            <button type="reset" class="btn btn-default">Clear Entry</button>
                        </form>
                        <?php
                            $driverexists= $_SESSION['driverexists'];
                            if($_SESSION['driverexists']){
                                echo '<h1 style="color:red">'. $driverexists .'</h1>';
                            }
/*                             unset($_SESSION['driverexists']);
 */                        ?>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- post drivers to the driver's table -->
    <?php
    if(isset($_POST['adddriver'])){
        $username = $_POST['username'];
        $idnumber = $_POST['idnumber'];
        $contact = $_POST['Contact'];
        $vehicle_reg = $_POST['vehicle_reg'];
        $query = "SELECT * FROM drivers WHERE vehicle_reg='$vehicle_reg' or username='$username'";
         $result = mysqli_query($db, $query);
                if (mysqli_num_rows($result) > 0) {
                    // Vehicle registration or username already exists
                    $_SESSION['driverexists']='Driver and Vehicle is already Added</h1>';
                } else {
                    // Vehicle registration and username are unique, add the record
                    $query = "INSERT INTO drivers (idnumber, username, contact, vehicle_reg) VALUES ('$idnumber', '$username', '$contact', '$vehicle_reg')";
                    mysqli_query($db, $query) or die('Error in adding to the database');
                }
            }
    if (isset($_POST['updatedriver'])) {
        $firstname = $_POST['username'];
        $idnumber = $_POST['idnumber'];
        $contact = $_POST['Contact'];
        $vehicle_reg = $_POST['vehicle_reg'];
                $query2 = "UPDATE  drivers  set idnumber=$idnumber,username='$username',contact='$contact',vehicle_reg='$vehicle_reg' where  idnumber=$idnumber";
                mysqli_query($db,$query2) or die ('Error in Adding into the  Database');      
 }

        
?>
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