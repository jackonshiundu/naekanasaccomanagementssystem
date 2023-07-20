 <div class="col-lg-12 ">
     <div class="card dashboard ">
         <hr>
         <div class="row ml-2 mr-2">
             <div class="col-md-4 card-extras">
                 <div class="card bg-primary  text-white pb-3">
                     <div class="card-body">
                         <div class="d-flex justify-content-between gap-10 align-items-center">
                             <div class="mr-3">
                                 <div class="text-white-75 ">Driver Starts</div>
                                 <div class="text-lg font-styling font-styling font-weight-bold">
                                     <?php $query = "SELECT * FROM users where role='driver'";
                                                            $result = mysqli_query($db, $query) or die (mysqli_error($db));
                                                            $totalDrivers=mysqli_num_rows($result);
                                                            echo "Total Drivers $totalDrivers"
                                                            ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <a class=" text-white-75 stretched-link" href="drivers.php">View
                             Drivers</a>
                         <div class=" text-white">
                             <?php ?>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- <div class="col-md-4 card-extras">
                 <div class="card bg-success text-white mb-3">
                     <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                             <div class="mr-3">
                                 <div class="text-white-75 ">Users Stats</div>
                                 <div class="text-lg font-styling font-weight-bold">
                                     <?php $query = 'SELECT * FROM users';
                                                            $result = mysqli_query($db, $query) or die (mysqli_error($db));
                                                            $totalusers=mysqli_num_rows($result);
                                                            echo "Total Users $totalusers"
                                                            ?>
                                 </div>
                             </div>

                         </div>
                     </div>

                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <a class=" text-white stretched-link" href="users.php">View
                             Users</a>
                         <div class=" text-white">

                         </div>
                     </div>
                 </div>
             </div> -->
             <div class="col-md-4 card-extras">
                 <div class="card bg-danger text-white mb-3 ">
                     <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                             <div class="mr-3">
                                 <div class="text-white-75 ">Vehicles Stats</div>
                                 <div class="text-lg font-styling font-weight-bold">
                                     <?php $query = 'SELECT * FROM vehicles';
                                                            $result = mysqli_query($db, $query) or die (mysqli_error($db));
                                                            $totalvehicles=mysqli_num_rows($result);
                                                            echo "Total Vehicles $totalvehicles"
                                                            ?>

                                 </div>
                             </div>

                         </div>
                     </div>

                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <a class=" text-white stretched-link" href="vehicles.php">
                             View Vehicles</a>
                         <div class=" text-white">

                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-md-4">
                 <div class="card bg-primary cardstyling text-white mb-3">
                     <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                             <div class="mr-3">
                                 <div class="text-white-75 ">Owners Stats</div>
                                 <div class="text-lg font-styling font-weight-bold">
                                     <?php $query = "SELECT * FROM users where role='owner'";
                                                            $result = mysqli_query($db, $query) or die (mysqli_error($db));
                                                            $totalowners=mysqli_num_rows($result);
                                                            echo "Total Vehicle Owners $totalowners"
                                                            ?>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="card-footer d-flex align-items-center justify-content-between">
                         <a class="text-white stretched-link" href="Vehicleowners.php">View
                             Owners</a>

                     </div>
                 </div>
             </div>

         </div>

     </div>
     <div class="col-md-4 card-extras">
         <div class="card bg-success text-white mb-3 ">
             <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center">
                     <div class="mr-3">
                         <div class="text-white-75 ">collection Stats</div>
                         <div class="text-lg font-styling font-weight-bold">
                             <?php 

                                $query = "SELECT Amount FROM driversrecord";
                                $result = mysqli_query($db, $query);

                                
                                $total = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $value = $row['Amount'];
                                    if (is_numeric($value)) {
                                        $total += $value;
                                    }
                                }


                            // Example usage:
                            // Replace 'your_field_name' and 'your_table_name' with the actual field name and table name from your database
                            // Replace $db with your database connection variable
                             //from
                             echo "Total amount Ksh.". $total;
                             //to
                             ?>
                         </div>
                     </div>

                 </div>
             </div>

             <div class="card-footer d-flex align-items-center justify-content-between">
                 <a class=" text-white stretched-link" href="driver.php">
                     View driversrecord</a>
                 <div class=" text-white">

                 </div>
             </div>
         </div>
     </div>