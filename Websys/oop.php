<?php 

	session_start();

	class OOP{
		private $host="localhost";
		private $dbname="disasterapp";
		private $charset="utf8mb4";
		private $user="root";
		private $pass="";
		private $options = [
			PDO:: ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO:: ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO:: ATTR_EMULATE_PREPARES=>false
		];
		private $conn;
		function __construct(){
			try{
				$dsn="mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
				$this->conn=new PDO($dsn,$this->user,$this->pass,$this->options);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}


		function register($name,$email,$password,$acctype,$location){
			$insert = "INSERT INTO users(FullName,email,password,type,location) VALUES(?,?,?,?,?)";
			$result = $this->conn->prepare($insert);
			$result->execute([
				$name,
				$email,
				$password,
				$acctype,
				$location

			]);

			if($result){
				echo "<script>
				alert('Successfully Created Account! Please login to access your dashboard...');
				window.location.href='login.php';
				</script>";
			}
		}

		function login($email, $password) {
		    $sql = "SELECT * FROM users WHERE email = ?";
		    $stmt = $this->conn->prepare($sql);

		    $stmt->execute([$email]);

		    $user = $stmt->fetch();

		    if ($user) {
		        if (password_verify($password, $user['password'])) {

		            if ($user['type'] == "Resident") {
		            	$_SESSION['name']=$user['FullName'];
		            	$_SESSION['email']=$user['email'];
		                echo "<script>
							alert('Login Successful!');
							window.location.href='index.php';
							</script>";
		            } else if ($user['type'] == "Responder") {
		            	$_SESSION['name']=$user['FullName'];
		            	$_SESSION['email']=$user['email'];
		                echo "<script>alert('Login Successful!');
							window.location.href='index.php';</script>";
		            }else{
		            	$_SESSION['name']=$user['FullName'];
		            	$_SESSION['email']=$user['email'];
		            	echo "<script>alert('Login Successful!');
							window.location.href='index.php';</script>";
		            }

		        } else {
		        	$error = "Invalid Password. Try again...";
		            return $error;
		        }
		    } else {
		    	$error = "Email not found. Try again...";
		        return $error;
		    }
		}
	}

 ?>