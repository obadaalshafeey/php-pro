<?php
session_start();

$name_regex="/^([a-zA-Z' ]+)$/";
$email_regex="/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
$phoneNumber_regex="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";

if (isset($_POST['submit'])){
$_SESSION['firstName']=$_POST['firstName'];
$_SESSION['middleName']=$_POST['middleName'];
$_SESSION['lastName']=$_POST['lastName'];
$_SESSION['familyName']=$_POST['familyName'];
$_SESSION['email']=$_POST['signUpEmail'];
$_SESSION['password']=$_POST['signUpPassword'];
$_SESSION['confirmPassword']=$_POST['signUpConfirmPassword'];
$_SESSION['phoneNumber']=$_POST['phoneNumber'];
$_SESSION['dateOfBirth']=$_POST['DOB'];
$_SESSION['array']=array('');
$_SESSION['date_create']=date("Y-m-d"); //Date Create
    // First name check
    if(preg_match($name_regex,$_SESSION['firstName'])){
        $firstName_result="<span style=' color:green'>Correct Name</span> <br>";
        $firstName_correct=true;
    }else{
        $firstName_result="<span style=' color:red'>InCorrect Name, your first name should contain letters only</span> <br>";
        $firstName_correct=false;
    }
    //Middle name check
    if(preg_match($name_regex,$_SESSION['middleName'])){
        $middleName_result="<span style=' color:green'>Correct Name</span> <br>";
        $middleName_correct=true;
    }else{
        $middleName_result="<span style=' color:red'>InCorrect Name, your middle name should contain letters only</span> <br>";
        $middleName_correct=false;
    }
       //Middle name check
       if(preg_match($name_regex,$_SESSION['lastName'])){
        $lastName_result="<span style=' color:green'>Correct Name</span> <br>";
        $lastName_correct=true;
    }else{
        $lastName_result="<span style=' color:red'>InCorrect Name, your last name should contain letters only</span> <br>";
        $lastName_correct=false;
    }
    //Family Name
    if(preg_match($name_regex,$_SESSION['familyName'])){
        $familyName_result="<span style=' color:green'>Correct Name</span> <br>";
        $familyName_correct=true;
    }else{
        $familyName_result="<span style=' color:red'>InCorrect Name, your family name should contain letters only</span> <br>";
        $familyName_correct=false;
    }
    //Email
    if(preg_match($email_regex,$_SESSION['email'])){
        $email_result="<span style=' color:green'>Correct Email</span> <br>";
        $email_correct=true;
    }
    else{
        $email_result="<span style=' color:red'>Incorrect Email</span> <br>";
        $email_correct=false;
    }
    //Password
    if(preg_match($password_regex,$_SESSION['password'])){
        $password_result="<span style=' color:green'>Correct Password</span> <br>";
        $password_correct=true;
    }
    else{
        $password_result="<span style=' color:red'>Incorrect Password, your password shoud have:<br>1- 8 characters at least<br>2- At least one uppercase English letter<br>3- At least one lowercase English letter<br>4- At least one digit<br>5- At least one special character </span> <br>";
        $paswword_correct=false;
    }
    //Confirm Password
    if(preg_match($password_regex,$_SESSION['confirmPassword'])){
        if ($_SESSION['confirmPassword'] == $_SESSION['password']){
            $password_match=true;
            $confirmPassword_correct=true;
            $confirmPassword_result="<span style=' color:green'>Correct Password</span> <br>";
        }
        else{
            $password_match=false;
            $confirmPassword_result="<span style=' color:red'>Password doesn't match</span> <br>";
        }
        
    }
    else{
        $confirmPassword_result="<span style=' color:red'>Incorrect Password, your password shoud have:<br>1- 8 characters at least<br>2- At least one uppercase English letter<br>3- At least one lowercase English letter<br>4- At least one digit<br>5- At least one special character </span> <br>";
        $confirmPaswword_correct=false;
    }
    //Phone
    if(preg_match($phoneNumber_regex,$_SESSION['phoneNumber'])){
        $phoneNumber_result="<span style=' color:green'>Correct Phone Number</span> <br>";
        $confirmPhone_correct=true;
    }
    else{
        $phoneNumber_result="<span style=' color:red'>Incorrect Phone Number, phone number must consist of 14 digits</span> <br>";
        $confirmPhone_correct=false;
    }
    //Date Of Birth
    if((floor((time() - strtotime($_SESSION['dateOfBirth'])) / 31556926)) >16){
        $dob_result="<span style=' color:green'>Your age is greater than 16</span> <br>";
        $confirmDob_correct=true;
    }
    
    else{
        $dob_result="<span style=' color:red'>Your age is less than 16</span> <br>";
        $confirmDob_correct=false;
    }
    if(
        $firstName_correct && $middleName_correct && $lastName_correct && $familyName_correct && $email_correct && $confirmPassword_correct && $confirmPhone_correct && $confirmDob_correct
    ){
        $_SESSION['array']=array(
            'First Name'=> $_SESSION['firstName'],
            'Middle Name'=> $_SESSION['middleName'],
            'Last Name'=>$_SESSION['lastName'],
            'Family Name'=> $_SESSION['familyName'],
            'Email'=> $_SESSION['email'],
            'Password'=> $_SESSION['password'],
            'Password Confirmation'=> $_SESSION['confirmPassword'],
            'Phone Number'=> $_SESSION['phoneNumber'],
            'Date Of Birth'=>$_SESSION['dateOfBirth']
        );
        // foreach ($_SESSION['array'] as $key => $value) {
        //     echo " $key; $value\n";
        //   }
        header('location:welcome.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <form method="post" class="signUp_form">
            <h1 class="text-center">Sign Up</h1>
            <p class="text-center">Creat an account. It's free!</p>
            <div class="singUp-fields row">
                <div class="col-lg-6 col-md-12">
                <!--Full Name fields-->
                    <label for="fName">First Name</label>
                    <br>
                    <input type="text" name="firstName" id="fName" class="form-control"  placeholder="First Name" required>
                    <br>
                    <?php if(isset($firstName_result)){echo $firstName_result;}?>
                    <br>
                    <label for="mName">Middle Name</label>
                    <br>
                    <input type="text" name="middleName" id="mName"  class="form-control" placeholder="Middle Name" required>
                    <br>
                    <?php if(isset($middleName_result)){echo $middleName_result;}?>
                    <br>
                    <label for="lName">Last Name</label>
                    <br>
                    <input type="text" name="lastName" id="lName"  class="form-control" placeholder="Last Name" required>
                    <br>
                    <?php if(isset($lastName_result)){echo $lastName_result;}?>
                    <br>
                    <label for="family_Name">Family Name</label>
                    <br>
                    <input type="text" name="familyName" id="family_Name"  class="form-control" placeholder="Family Name" required>
                    <br>
                    <?php if(isset($familyName_result)){echo $familyName_result;}?>
                    <br>
                <!--Email Number-->
                    <label for="signUpEmail">Email</label>
                    <br>
                    <input type="email" name="signUpEmail" id="signUpEmail"  class="form-control"  placeholder="Your Email" required>
                    <br>
                    <?php if(isset($email_result)){echo $email_result;}?>
                    <br>
                <!--Password-->
                    <label for="loginPassword">Password</label>
                    <br>
                    <input type="password" name="signUpPassword" id="signUpPassword"  class="form-control"  placeholder="Password" required>
                    <br>
                    <?php if(isset($password_result)){echo $password_result;}?>
                    <br>
                <!--Confirm Password-->
                    <label for="signUpConfirmPassword">Confirm Password</label>
                    <br>
                    <input type="password" name="signUpConfirmPassword" id="signUpConfirmPassword"  class="form-control"  placeholder="Confirm Password" required>
                    <br>
                    <?php if(isset($confirmPassword_result)){echo $confirmPassword_result;}?>
                    <br>
                <!--Phone Number-->
                    <label for="phoneNumber">Phone Number</label>
                    <br>
                    <input type="number" name="phoneNumber" id="phoneNumber" class="form-control"  placeholder="Phone Number" required>
                    <br>
                    <?php if(isset($phoneNumber_result)){echo $phoneNumber_result;}?>
                    <br>
                <!--Date Of Birth-->
                    <label for="DOB">Date Of Birth</label>
                    <br>
                    <input type="date" name="DOB" id="DOB" class="form-control"  placeholder="Date Of Birth" required>
                    <br>
                    <?php if(isset($dob_result)){echo $dob_result;}?>
                    <br>
                    <br>            
                </div>
               
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-outline-danger col-lg-8">
            <div class="have-account">Already have an account? <a href="login.php">Login</a></div>
        </form>
    </div>
</body>
</html>