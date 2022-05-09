<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q2</title>
</head>
<body>
    <form method="post">
        <p>Please insert you favorite city</p>
        <input type="text" name="city">
        <br>
        <br>
        <button type="submit" name="submit">Submit</button>
        <br>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    echo "Your favorite city is ". $_POST['city'];
    $info=array($_POST['city']);
}
?>