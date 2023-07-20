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
                        <h1 class="page-header">
                             LIST OF ALL THE DRIVERS
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <h2>List of Records</h2> <a href="adddriver.php" type="button" class="btn btn-xs btn-info">Add
                        New</a>

                    <div class="table-responsive">
                        <table class="table mt-3 table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>User name</th>
                                    <th>ID Number</th>
                                    <th>Contact</th>
                                    <th>Vehicle Reg</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                  
                    $query = 'SELECT * FROM drivers';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['username'].'</td>';
                            echo '<td>'. $row['idnumber'].'</td>';
                            echo '<td>'. $row['contact'].'</td>';
                            echo '<td>'. $row['vehicle_reg'].'</td>';
                            echo '<td> <a  type="button" class="btn btn-xs btn-warning" href="adddriver.php?action=edit& id='.$row['idnumber'] . '&vehicle_reg='.$row['vehicle_reg'].'"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=deletedrivers&id=' . $row['idnumber'] . '">DELETE </a> </td>';
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