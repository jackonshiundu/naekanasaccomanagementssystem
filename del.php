<?php

include 'connection.php';
include 'header.php';

?>

<body>
    <?php

if (isset($_GET['type'])) {
    if(isset($_GET['numberplate'])){
        $numberplate=$_GET['numberplate'];
    }
    switch ($_GET['type']) {
        case 'deletedrivers':
            $query = 'DELETE FROM drivers WHERE idnumber = ' . $_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
			header('location:drivers.php');
            break;
        case 'deletevehicle':
            $query = "DELETE FROM vehicles where numberplate='$numberplate'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
			header('location:vehicles.php');
            break;
        case 'deleteowner':
            $query = 'DELETE FROM owners where idnumber=' . $_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
			header('location:Vehicleowners.php');
            break;
        case 'deleteuser':
            $query = 'DELETE FROM users where id=' . $_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
			header('location:users.php');
            break;
        case 'deletedriversrecords':
            $query = 'DELETE FROM driversrecord where Serial_Num=' . $_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
			header('location:driverreport.php');
            break;
    }
}
?>

</body>

</html>