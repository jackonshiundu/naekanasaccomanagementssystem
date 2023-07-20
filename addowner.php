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
                            $veheclereg=$_GET['vehicle'];
                            $query = 'SELECT * FROM owners WHERE idnumber = ' . $idnumber;
                            $result = mysqli_query($db, $query);
                            if(mysqli_num_rows($result)>0) {
                                $rows=mysqli_fetch_assoc($result);
                                $idnumber2=$rows['idnumber'];
                                $username=$rows['username'];
                                $email=$rows['email'];
                                $vehicle=$rows['vehicle'];
                            }
                        }
                        ?>
                        <h1 class="page-header">
                             <small>
                                <?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Owner Details';
                                 }}?>
                                Add A new Owner
                            </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2><?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Owner Details';
                                 }}?>
                        Add A new Owner Records</h2>
                    <div class="col-lg-6">

                        <form role="form" method="post">
                            <div class="form-group">
                                <select name="username" class="form-control">
                                    <option value="">Select Vehicles Owners</option>
                                    <?php
                                        $sql = "SELECT * from users where role='owner'";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $username = $results['username'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if($username==$username){ echo "selected";}}?>
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
                                <input type='number' class="form-control" required placeholder="ID Number"
                                    value="<?php echo isset($_GET['action'])? $idnumber:''?>" name="idnumber">
                            </div>
                            <div class="form-group">
                                <input type='email' class="form-control" required placeholder="example@gmail.com"
                                    value="<?php echo isset($_GET['action'])? $email:''?>" name="email">
                            </div>
                            <div class="form-group">
                                <select name="vehicle" class="form-control">
                                    <option value="0">Select Vehicles</option>
                                    <?php
                                        $sql = "SELECT * from vehicles ";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $numberplate = $results['numberplate'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if($numberplate==$vehicle){ echo "selected";}}?>
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
                            <?php
                            if(isset($_GET['action'])){
                                ?>
                            <button type="submit" name="updateowner" class="btn btn-default">Update Record</button>
                            <?php
                            }else{
                            ?>
                            <button type="submit" name="addowner" class="btn btn-default">Save Record</button>
                            <?php
                            }
                            ?>
                            <button type="reset" class="btn btn-default">Clear Entry</button>
                        </form>
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
    if(isset($_POST['addowner'])){
        $username = $_POST['username'];
        $idnumber = $_POST['idnumber'];
        $email = $_POST['email'];
        $vehicle = $_POST['vehicle'];
                $query = "INSERT INTO owners set idnumber=$idnumber,username='$username',email='$email',vehicle='$vehicle';";
                mysqli_query($db,$query) or die ('Error in Adding into the  Database');    
            }
    if (isset($_POST['updateowner'])) {
         $username = $_POST['username'];
        $idnumber3 = $_POST['idnumber'];
        $email = $_POST['email'];
        $vehicle = $_POST['vehicle'];
                $query = "UPDATE  owners set idnumber=$idnumber3,username='$username',email='$email',vehicle='$vehicle' where idnumber=$idnumber";
                mysqli_query($db,$query) or die ('Error in Adding into the  Database');    
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