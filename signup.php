<?php 
    session_start();
    include './includes/DbConnection.php';
    $message1="";
    $message2="";
    if(isset($_POST)&& !empty($_POST)){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];
        
        if($pass==$conpass){
            $result = mysqli_query($connection,"INSERT INTO user VALUES('','$name','$email', '$pass', 2)");
            if($result){
                $message2="Account created successfully. Click login to login";    
            }
        }else{
            $message1="Passwords did not match. Please try again";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Welcome to foodorder</title>

        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/signup.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
          <form class="form-signin" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2 class="form-signin-heading">Welcome To FoodOrder</h2>
            <h3 class="form-signin-heading">Signup for the best food in town at your doorstep </h3>
            <input type="text" class="form-control" name="name" placeholder="Full Name" required autofocus>
            <input type="email" class="form-control" name="email" placeholder="Email address" required >
            <input type="password" class="form-control" name="pass" placeholder="Password" required>
            <input type="password" class="form-control" name="conpass" placeholder="Confirm Password" required>
            <span style="color:red"><?= $message1 ?></span>
            <span style="color:green"><?= $message2 ?></span>
            <div class="row">
                <div class="col-md-6"><button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px;">Sign UP</button></div>  
                <div class="col-md-6"><a class="btn btn-lg btn-info btn-block" href="index.php" style="margin-top:20px;">Log in</a></div>  
            </div>  
          </form>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery-1.9.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>