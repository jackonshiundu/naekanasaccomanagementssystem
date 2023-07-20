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
                        if (isset($_GET['action'])) {
                            $Serial_Num = $_GET["id"];
                            $query = 'SELECT * FROM driversrecord WHERE Serial_Num = ' . $Serial_Num;
                            $result = mysqli_query($db, $query);
                            
                            // Change "$res" to "$result" in the if condition
                            if (mysqli_num_rows($result) > 0) {
                                // Change "$rows" to "$result" to fetch the correct row
                                $row = mysqli_fetch_assoc($result);
                                
                                // Correct the column names in the fetched row
                                $day_taken = $row['day_taken'];
                                $time_taken = $row['time_taken'];
                                $Amount = $row['Amount'];
                                $squad = $row['squad'];
                                $drivername = $row['drivername'];
                            }
                        }
                                                ?>
                        <h1 class="page-header">
                            M-Driver <small>
                                <?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Driver Record';
                                 }else{
                                    echo 'Add A new Driver Record';
                                 }}?>

                            </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2><?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  Driver Record';
                                 }else{
                                    echo 'Add A new Driver Record';
                                 }}?>
                    </h2>
                    <div class="col-lg-6">
                        <form role="form" method="post">

                            <div class="form-group">
                                <label>day_taken</label>
                                <input type='date' class="form-control" required
                                    value="<?php echo isset($_GET['action'])? $day_taken:''?>" name="day_taken">
                            </div>

                            <div class="form-group">
                                <label>time_taken</label>
                                <input type='time' class="form-control" type='number'
                                    value="<?php  echo isset($_GET['action'])?$time_taken:''?>" required
                                    name="time_taken">
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type='text' class="form-control" required
                                    value="<?php echo isset($_GET['action'])? $Amount:''?>" name="Amount">
                            </div>
                            <div class="form-group">
                                <label>Squad/Number of operations</label>
                                <input type='text' class="form-control" required
                                    value="<?php echo isset($_GET['action'])?$squad:''?>" name="squad">
                            </div>


                            <div class="form-group">
                                <select name="username" class="form-control">
                                    <option value="">Select Driver's Name</option>
                                    <?php
                                        $sql = "SELECT * from drivers";
                                        $res = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            ;
                                            while ($results = mysqli_fetch_assoc($res)) {
                                                $username = $results['username'];
                                                ?> <option
                                        <?php if(isset($_GET['action'])) {if($username==$drivername){ echo "selected";}} ?>
                                        value="<?php echo $username ?>">
                                        <?php echo  $username ?></option>
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
                            <button type="submit" name="updatedriversrecord" class="btn btn-default">Update
                                Record</button>
                            <?php
                            }else{
                            ?>
                            <button type="submit" name="adddriversrecords" class="btn btn-default">Save Record</button>
                            <?php
                            }
                            ?>
                            <button type="reset" class="btn btn-default">Clear Entry</button>

                        </form>
                    </div>
                </div>

                <?php
    if(isset($_POST['adddriversrecords'])){
        $day_taken = $_POST['day_taken'];
        $time_taken = $_POST['time_taken'];
        $Amount = $_POST['Amount'];
        $drivername = $_POST['username'];
        $squad = $_POST['squad'];
                $query = "SELECT *  FROM vehicles WHERE driver='$drivername';";
                $vehicles = mysqli_query($db, $query) or die(mysqli_error($db));
                // Fetch the vehicle_reg value and assign it to $VEHICLES_res
                $row = mysqli_fetch_assoc($vehicles);
                $Vehicles_reg = $row['numberplate'];
                $vehicles_owner=$row['owner'];
                $query = "INSERT INTO driversrecord set vehicle_owner='$vehicles_owner', squad=$squad,drivername='$drivername', day_taken='$day_taken',time_taken='$time_taken',Amount='$Amount',Vehicles_Reg='$Vehicles_reg';";
                mysqli_query($db,$query) or die(mysqli_error($db));
                echo "Added Succesfully";
            }
    if (isset($_POST['updatedriversrecords'])) {
       $day_taken = $_POST['day_taken'];
        $time_taken = $_POST['time_taken'];
        $Amount = $_POST['Amount'];
        $drivername = $_POST['username'];
        $squad = $_POST['squad'];
               $query = "UPDATE driversrecord set  squad=$squad,drivername='$drivername', day_taken='$day_taken',time_taken='$time_taken',Amount='$Amount',Vehicles_Reg='$Vehicles_reg' where Serial_Num=$Serial_Num;";
                mysqli_query($db,$query) or die ('Error in Adding into the  Database');    
            }
      
?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- post drivers to the driver's table -->
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