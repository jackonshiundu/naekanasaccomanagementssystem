<?php
       
       include('connection.php');
       include('header.php');
       
        ?>

<body>

    <div id="wrapper">

        <?php include_once('nav.php')?>
        <div id="page-wrapper">

            <div class="container-fluid h-">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            M- VEHICLES LIST
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2>List of Vehicles</h2> <a href="addvehicle.php" type="button" class="btn btn-xs btn-info">Add
                        New</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Reg NUmber</th>
                                    <th>Brand</th>
                                    <th>Driver</th>
                                    <th>Owner</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                  
                $query = 'SELECT * FROM vehicles';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['numberplate'].'</td>';
                            echo '<td>'. $row['brand'].'</td>';
                            echo '<td>'. $row['driver'].'</td>';
                            echo '<td>'. $row['owner'].'</td>';
                              
                            echo '<td> <a  type="button" class="btn btn-xs btn-warning" href="addvehicle.php?action=edit & numberplate='.$row['numberplate'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=deletevehicle&numberplate=' . $row['numberplate'] . '">DELETE </a> </td>';
                            echo '</tr> ';
                }
            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>