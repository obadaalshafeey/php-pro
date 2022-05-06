<?php
session_start();
setCookie('FirstName', date("H:i:s-m/d/y"), 60*24*60*60+time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1 class="text-center admin-h1"> Welcome  Admin To Your Control Page! </h1>
    <p class="text-center"> The following table contains the user information: </p>
    <!--The information in a table -->  
    <table class="table table-striped admin-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Last Login</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-primary">
                <th scope="row"><?php echo $_SERVER['REMOTE_ADDR'] ?></th><!--User IP Address-->
                <td><?php echo $_SESSION['firstName'] ;?> </td><!--User First Name-->
                <td><?php echo $_SESSION['email'] ;?></td><!--User Email-->
                <td><?php echo $_SESSION['password'] ;?></td> <!--User Password-->
                <td><?php echo $_SESSION['date_create'] ;?></td> <!--User Date Create-->
                <td><?php echo $_COOKIE['FirstName']; ?></td> <!--User Last Login Date-->
            </tr>
        </tbody>
    </table>
</body>
</html>