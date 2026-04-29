
<?php 
    include "oop.php";
    $oop = new OOP();

    $pass="";
    $email="";

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
	<title>DisasterWatch</title>
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height:100vh;">
                <div class="card" style="width:30rem">
                    <div class="d-flex justify-content-center">
                        <img src="images/logo.png" alt="logo" class="logo">                    
                    </div>
                    <h3 class="brand">DisasterWatch</h3>    

                    <form method="Post">
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="yourname@gmail.com" autocomplete="off" style="color:white">
                        </div>
                        <br>
                        <div style="display:flex;flex-direction:column;gap:0.3rem">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="Enter your password" autocomplete="off" style="color:white">
                        </div>

                        <button class="login" name="login" onclick="retainValue()">Login</button>
                         <?php 

                            if(isset($_POST['login'])){
                                $email = $_POST['email'];
                                $pass = $_POST['password'];

                                echo "<h3 style='color:white;font-size:1rem;text-align:center; background-color: #1a243b; padding:8px;'>".$oop->login($email,$pass)."</h3>";
                            }

                         ?>
                        <hr>
                        <h3 class="dont">Don't have an account? <span class="create"><a href="register.php">Sign up here</a></span></h3>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</html>