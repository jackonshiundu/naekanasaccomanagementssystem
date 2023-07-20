 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>

         <a class="navbar-brand text-3xl" href="index.php"> NAEKANA SACCO</a>

     </div>
     <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
     <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav side-nav">
             <li class="active">
                 <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
             </li>
             <?php
        if($_SESSION['role']=='admin'){
                 ?>
             <li class="active">
                 <a href="drivers.php"><i class="fa fa-fw fa-dashboard"></i> Drivers</a>
             </li>

             <li class="active">
                 <a href="Vehicleowners.php"><i class="fa fa-fw fa-dashboard"></i> Vehicle Owners</a>
             </li>

             <li class="active">
                 <a href="vehicles.php"><i class="fa fa-fw fa-dashboard"></i> Vehicles</a>
             </li>
             <li class="active">
                 <a href="addvehicle.php"><i class="fa fa-fw fa-dashboard"></i> Add vehicle</a>
             </li>
             <li class="active">
                 <a href="addowner.php"><i class="fa fa-fw fa-dashboard"></i> Add owner</a>
             </li>
             <li class="active">
                 <a href="users.php"><i class="fa fa-fw fa-dashboard"></i> Users</a>
             </li>
             <li class="active">
                 <a href="adddriver.php"><i class="fa fa-fw fa-dashboard"></i> Add driver</a>
             </li>
             <li class="active">
                 <a href="adddriverrecord.php"><i class="fa fa-fw fa-dashboard"></i> Add Record</a>
             </li>
             <li class="active">
                 <a href="driverreport.php"><i class="fa fa-fw fa-dashboard"></i> Veiw report</a>
             </li>
             <?php
             }
             ?>
             <?php  if($_SESSION['role']=='driver') {
                ?>

             <li class="active">
                 <a href="ddriverreport.php"><i class="fa fa-fw fa-dashboard"></i> Veiw report</a>
             </li>
             <?php
             }
             ?>
             <?php  if($_SESSION['role']=='owner') {
                ?>
             <li class="active">
                 <a href="collection.php"><i class="fa fa-fw fa-dashboard"></i> Collection</a>
             </li>

             <?php
             }
             ?>

             <li class="active">
                 <a href="logoutUser.php"><i class="fa fa-lock"></i> Log Out</a>
             </li>

         </ul>
     </div>
     <!-- /.navbar-collapse -->
 </nav>