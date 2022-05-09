<?php
session_start();
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
                <?php
                     $id= 1;
                     foreach ($_SESSION['array'] as $value) {
                         echo "<tr>
                                 <td>".$id."</td>
                                 <td>". $value['First Name']."</td>
                                 <td>".$value['Email']."</td>
                                 <td>".$value['Password']."</td>
                                 <td>".$value['Date Create']."</td>
                                 <td>".$value['Last-Login-Date']."</td>
                             </tr>";
                         $id++;  
                    }
                     ?>
        </tbody>
    </table>
</body>
</html>