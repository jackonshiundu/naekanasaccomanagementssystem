<?php
       
       include('connection.php');
       
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Sacco vehicle management system</title>
    <style>
    body {
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }

    .login {
        display: flex;
        width: 25vw;
        padding: 6px;
        flex-direction: column;
        gap: 3px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

    }

    .form_group {
        display: flex;
        width: 100%;
        margin-bottom: 15px
    }


    .form_group input,
    select {
        width: 100%;
        padding: 5px;
        outline: none;
        border: none;
        font-size: 20px;
        background-color: rgba(250, 235, 23, .4);
        border-radius: 5px;

    }

    .text_center {
        text-align: center;
    }

    .submit_btn {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .submit_btn input {
        outline: none;
        border: none;
        width: 100%;
        padding: 15px;
        border-radius: 5px;
        cursor: pointer;
        color: white;
        background-color: rgba(5, 154, 223, 0.842);

    }

    .title {
        color: black;
        padding: 3px;
        text-decoration: none;
        font-size: 30px
    }

    .login-toppart {
        position: absolute;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow-x: hidden;
        text-align: center;
        width: 100%;
        height: 5rem;
        background-color: grey;
    }
    </style>
</head>

<body>

    <div class='login-toppart'>
        <a class="navbar-brand title" href="index.php"> NAEKANA SACCO</a>
    </div>

    </div>
    <div class='login-wrapper'>
        <div class="login">
            <h1 class='text_center'>Log In Here </h1>
            <!-- login form Starts Here -->
            <form action="" method="POST">
                <div class='form_group'>
                    <input type="text" placeholder='Username' required name='username'>
                </div>
                <div class="form_group">
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
                <div class='form_group'>
                    <input type="password" placeholder='Password' name='password'>
                </div>
                <div class='submit_btn'>
                    <input type="submit" class='btn_primary' name='submit'>
                </div>
            </form>
            <!-- login form ends Here -->
            <p class='text_center'>Created By &copy; <a href="">Peter motonga</a></p>
        </div>
    </div>
</body>

</html>
<?php
//check if the submit button is clicked
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    //sql to check whether the user with username and password exists or not

    $sql ="SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
    //execute the query
    $res = mysqli_query($db, $sql);
    //count rows to check if user exists
    $count = mysqli_num_rows($res);
    $results=mysqli_fetch_assoc($res);
    if ($count == 1) {
        $_SESSION['role'] =$results['role'] ;
        $_SESSION['user']=$username;
        $_SESSION['idnumber']=$results['idnumber'];
        header('location:index.php');
    } else {
        $_SESSION['login'] = "<div class='error text_center'>No such User</div>";
        header('location:Loginpage.php');

    }
}
?>