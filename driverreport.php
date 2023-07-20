<?php
       
       include('connection.php');
       include('header.php');
       
        ?>

<body>
    <script>
    function clearAndFetch() {
        // Set the filter select boxes to their default (first) option
        document.getElementById("filterYear").selectedIndex = 0;
        document.getElementById("filterRegNum").selectedIndex = 0;
        // Submit the form to fetch all records
        document.querySelector("form").submit();
    }
    </script>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('nav.php')?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <h1 class='text-center'>Daily Report</h1>
                <form method="GET" action="">
                    <div class="form-group">
                        <label for="filterYear">Filter by Year:</label>
                        <select class="form-control" id="filterYear" name="filterYear">
                            <option value="">Choose Year </option>

                            <?php
                // Assuming you have a range of years you want to display in the select box
                $currentYear = date("Y");
                $startYear = 1900; // Change this to your desired starting year
                for ($year = $currentYear; $year >= $startYear; $year--) {
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
                        </select>
                        <div class="form-group">
                            <label for="filterRegNum">Filter by Registration Number:</label>
                            <select class="form-control" id="filterRegNum" name="filterRegNum">
                                <option value="">Choose Registration Number</option>
                                <?php
                // Assuming you have a database connection ($db) already established

                // Fetch registration numbers from the database
                $query = "SELECT DISTINCT Vehicles_Reg FROM driversrecord WHERE 1;";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));

                // Loop through the results and populate the select box
                while ($row = mysqli_fetch_assoc($result)) {
                    $regNum = $row['Vehicles_Reg'];
                    echo '<option value="' . $regNum . '">' . $regNum . '</option>';
                }
                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
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
                $drivername=$_SESSION['user'];
                 $query = "SELECT * FROM vehicles where driver='$drivername';";
                    $res = mysqli_query($db, $query) or die (mysqli_error($db));
                    if(mysqli_num_rows($res)>0){
                        $result=mysqli_fetch_assoc($res);
                        $numberplate=$result['numberplate'];
                    }
               
            }
                    // Filter variables
                    $filterYear = isset($_GET['filterYear']) ? intval($_GET['filterYear']) : null;
                    $filterRegNum = isset($_GET['filterRegNum']) ? $_GET['filterRegNum'] : null;
                    // Base query
                    $query = "SELECT * FROM driversrecord ";

                   // Add filters if provided
                    if ($filterYear !== null || !empty($filterRegNum)) {
                        $query .= "WHERE";

                        // Handle year filter
                        if ($filterYear !== null) {
                            $query .= " YEAR(day_taken) = $filterYear";

                            // Check if registration number filter is also provided
                            if (!empty($filterRegNum)) {
                                $query .= " AND Vehicles_Reg='$filterRegNum'";
                            }
                        }
                         else {
                            // Only registration number filter is provided
                            $query .= " Vehicles_Reg='$filterRegNum'";
                        }
                    }


                    $query .= ";";

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
            ?>
                            <tr>
                                <td colspan='4' style='font-size:2rem;color:black;font-weight: bold;'>Total</td>
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
                                    echo "<td colspan='4' style='font-size:2rem;color:black;font-weight: bold;'>". $total."</td>";
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
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