<div class="card bg-warning cardstyling text-white mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mr-3">
                <div class="text-lg font-styling font-weight-bold">
                    <?php 
                        if(isset($_SESSION)){
                            $ownername=$_SESSION['user'];
                             $query = "SELECT * FROM vehicles where owner='$ownername';";
                                $res = mysqli_query($db, $query) or die (mysqli_error($db));
                                if(mysqli_num_rows($res)>0){
                                   while( $result=mysqli_fetch_assoc($res)){
                                       $numberplate=$result['numberplate'];
                                       echo "Owner Name".": ". $result['owner'].BR;
                                       echo "Vehicle Reg".": ". $numberplate.BR;
                                       echo "Vehicle Brand".": ". $result['brand'].BR;
                                       echo "Vehicle Driver".": ". $result['driver'].BR;
                                       echo "<hr>";
                                   }
                                }
                         }
                            ?>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
<h1 class='text-center'>Daily Deposit</h1>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Serial Num</th>
                <th>Day Taken</th>
                <th>Time Taken</th>
                <th>No of operation </th>
                <th>Amount(Ksh)</th>
                <th>Vehicles Reg</th>
                <th>Driver Name</th>
            </tr>
        </thead>
        <tbody>
            <?php    
            if(isset($_SESSION)){
                    $ownername=$_SESSION['user'];
                    // Base query
                    $query = "SELECT * FROM driversrecord where vehicle_owner='$ownername';";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    $sn=1;
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $sn++.'</td>';
                            echo '<td>'. $row['day_taken'].'</td>';
                            echo '<td>'. $row['time_taken'].'</td>';
                            echo '<td>'. $row['squad'].'</td>';
                            echo '<td>'. $row['Amount'].'</td>';                        
                            echo '<td>'. $row['Vehicles_Reg'].'</td>';                        
                            echo '<td>'. $row['drivername'].'</td>';                        
                            
                }
            }
            ?>
            <tr>
                <td colspan='4' style='font-size:2rem;color:black;font-weight: bold;'>Total</td>
                <?php 
                                $vehicle_owner=$_SESSION['user'];

                                $query = "SELECT Amount FROM driversrecord where vehicle_owner='$vehicle_owner'";
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
                                    echo "<td colspan='4' style='font-size:2rem;color:black;font-weight: bold;'>". $total."</td>";
                                ?>
            </tr>
        </tbody>
    </table>
</div>