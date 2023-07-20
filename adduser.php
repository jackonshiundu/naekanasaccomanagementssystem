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
                            $id=$_GET['id'];
                            $query = "SELECT * FROM users WHERE id =$id;";
                            $result = mysqli_query($db, $query);
                            if(mysqli_num_rows($result)>0) {
                                $rows=mysqli_fetch_assoc($result);
                                $username=$rows['username'];
                                $role=$rows['role'];
                                $pasword=$rows['password'];
                                $idnumber=$rows['idnumber'];
                            }
                        }
                        ?>
                        <h1 class="page-header">
                            M-Driver <small>
                                <?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  User Details';
                                 }}?>
                                Add A new User
                            </small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2><?php if(isset($_GET['action']))
                                {if($_GET['action']=='edit')
                                 {echo 'Edit  User Details';
                                 }}?>
                        Add A new User Records</h2>
                    <div class="col-lg-6">

                        <form role="form" method="post">

                            <div class="form-group">
                                <input class="form-control" required placeholder="User name"
                                    value="<?php echo isset($_GET['action'])? $username:''?>" name="username">
                            </div>
                            <div class="form-group">
                                <input type='password' class="form-control"
                                    value="<?php echo isset($_GET['action'])? $pasword:''?>" required
                                    placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" value="<?php echo isset($_GET['action'])? $idnumber:''?>"
                                    required placeholder="ID Number" name="idnumber">
                            </div>
                            <div class="form-group">
                                <select name="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="driver"
                                        <?php if(isset($_GET['action']))  {if($role=='driver'){ echo "selected";}}?>>
                                        Vehicle
                                        Driver</option>
                                    <option value="admin"
                                        <?php if(isset($_GET['action']))  {if($role=='admin'){ echo "selected";}}?>>
                                        Adminstrator
                                    </option>
                                    <option value="owner"
                                        <?php if(isset($_GET['action']))  {if($role=='owner'){ echo "selected";}}?>>
                                        Vihecle Owner
                                    </option>
                                </select>

                            </div>
                            <?php
                            if(isset($_GET['action'])){
                                ?>
                            <button type="submit" name="updateuser" class="btn btn-default">Update Record</button>
                            <?php
                            }else{
                            ?>
                            <button type="submit" name="adduser" class="btn btn-default">Save Record</button>
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
    if(isset($_POST['adduser'])){
        $username = $_POST['username'];
        $idnumber = $_POST['idnumber'];
        $password = $_POST['password'];
        $role = $_POST['role'];
                $query = "INSERT INTO users set username='$username',idnumber='$idnumber',password='$password',role='$role';";
                mysqli_query($db,$query) or die ('Error in Adding into the  Database');    
            }
    if (isset($_POST['updateuser'])) {
        $username = $_POST['username'];
        $idnumber = $_POST['idnumber'];
        $password = $_POST['password'];
        $role = $_POST['role'];
                $query = "UPDATE users set username='$username',idnumber='$idnumber',password='$password',role='$role' where id=$id;";
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