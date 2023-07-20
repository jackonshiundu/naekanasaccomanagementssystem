<?php
       
       include('connection.php');
       include('header.php');
        ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('nav.php')?>

        <!-- /#wrapper -->
        <div id="page-wrapper">

            <div class="container-fluid bg-dark ">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header flex ">
                            <span> <?php echo $_SESSION['role']?> Dashboard</span>
                            <span class='role_style bg-danger p-4'>
                                <?php  if($_SESSION['role']=='admin') echo "Admin" ?>
                                <?php  if($_SESSION['role']=='driver') echo "Driver" ?>
                                <?php  if($_SESSION['role']=='owner') echo "Owner" ?>
                            </span>
                        </h1>
                        <?php  if($_SESSION['role']=='owner')  echo "<span class='driversspam'>Vehicles Daily Stats</span>"?>
                    </div>
                </div>
                <div class="container-fluid ">
                    <?php  if($_SESSION['role']=='admin'){
                        include('Adminststats.php');
                    }?>
                    <?php  if($_SESSION['role']=='driver'){
                        include('Driverstats.php');
                    }?>
                    <?php  if($_SESSION['role']=='owner'){
                        include('OwnerStats.php');
                    }?>

                </div>

            </div>

        </div>

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