<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q3</title>
</head>
<body>
    <form method="post">
        <p>Please insert you the day</p>
        <input type="text" name="day">
        <br>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{   echo '<br>';
    $day=strtolower($_POST['day']);
    if($day=='monday')
        echo 'Laugh on Monday, laugh for danger.';
    else if ($day=='tuesday')
        echo 'Laugh on Tuesday, kiss a stranger.';
    else if ($day=='wednesday')
        echo 'Laugh on Wednesday, laugh for a letter.';
    else if ($day=='thursday')
        echo 'Laugh on Thursday, something better.';
    else if ($day=='friday')
        echo 'Laugh on Friday, laugh for sorrow.';
    else if ($day=='saturday')
        echo 'Laugh on Saturday, joy tomorrow.'; 
}
?>