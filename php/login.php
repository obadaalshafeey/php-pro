<?php
session_start();

if (isset($_POST['submit'])){
     
    $_SESSION['loginEmail']=$_POST['loginEmail'];
    $_SESSION['loginPassword']=$_POST['loginPassword'];
    $adminEmail_correct=true;
    $adminPass_correct=true;

    foreach ($_SESSION['array'] as $key=> $value) {
        //Check Email
      
            if($_SESSION['loginEmail']==($value['Email'])){
                $loginEmail_result="<span style=' color:green'>Correct Email</span><br>";
                $loginEmail_correct=true;
                        //Check Password
        
            if(($_SESSION['loginPassword']==$value['Password'])){
                $loginPassword_result="<span style=' color:red'>Incorrect Password</span><br>";;
                $loginPassword_correct=true;
            }else{
                $loginPassword_result="<span style=' color:red'>Incorrect Password</span><br>";
                $loginPassword_correct=false;
            }
            }else{
                $loginEmail_result="<span style=' color:red'>Incorrect Email</span><br>";
                $loginEmail_correct=false;
            }
    
        }
    
    if($loginEmail_correct && $loginPassword_correct)
    {
        header('location:welcome.php');
        $_SESSION["array"][$key]["Last-Login-Date"]= date("d-m-Y - h:i:sa");
        $_SESSION["array"];
    }else
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")'; 
    echo '</script>';
     
    // cHeck Admin information 
    if($_SESSION['loginEmail']=="admin@gmail.com"){
		if($_SESSION['loginPassword']== "Admin*1234"){
            $loginEmail_result="<span style=' color:green'>Correct Email</span><br>";
			$adminEmail_correct=true;
			$adminPass_correct=true;
	
		}else{
			$loginPassword_result="<span style=' color:red'>Incorrect Password</span><br>";
	    	$adminPass_correct=false;
		}
	}else{
		$loginEmail_result="<span style=' color:red'>Incorrect Email or Password</span><br>";
		$adminEmail_correct=false;
	}
	if ($adminEmail_correct && $adminPass_correct ){
		header('location:admin.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <form method="post" class="login_form">
            <div class="login-fields">
                <h1 class="text-center">Login</h1>
                <p class="text-center">Welcome back! Login with your credentials</p>
                <label for="loginEmail">Email</label>
                <br>
                <!--Email-->
                <input type="email" name="loginEmail" id="loginEmail" class="form-control"  placeholder="Your Email" required>
                <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>
                <br>
                <!--Password-->
                <label for="loginPassword">Password</label>
                <br>
                <input type="password" name="loginPassword" id="loginPassword" class="form-control"  placeholder="Password" required>
                <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>
                <br>
                <input type="submit" value="Submit" name="submit" class="login-btn btn btn-outline-primary col-lg-12">
                <div class="have_no_account text-center">Don't have an account? <a href="signUp.php">Sign Up</a></div>
            </div>
        </form>
        <video src="https://www.youtube.com/watch?v=mBL9Athx7ms" type="video/mp4"></video>
    </div>
</body>
</html>