<?php 

include '../config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if (strlen($_POST['password']) < 6) echo "<script>alert('Password must has at least 6 characters !!!.')</script>";
	else{
		if ($password == $cpassword)
		{
			$sql = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($conn, $sql);
			if (!$result->num_rows > 0) // Checking Used Username
			{
				$sql = "SELECT * FROM users WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				if (!$result->num_rows > 0) // Checking Used Email
				{
					$sql = "INSERT INTO users (username, email, password)
							VALUES ('$username', '$email', '$password')";
					$result = mysqli_query($conn, $sql);
					if ($result)
					{
						echo "<script>alert('Wow! User Registration Completed.')</script>";
						$username = "";
						$email = "";
						$_POST['password'] = "";
						$_POST['cpassword'] = "";
					}
                    else {
						echo "<script>alert('Woops! Something Wrong Went.')</script>";
					}
				}else{
					echo "<script>alert('Woops! Email Already Exists.')</script>";
				}
			}else{
				echo "<script>alert('Woops! Username Already Used.')</script>";
			}
			
		} else {
			echo "<script>alert('Password Not Matched.')</script>";
		}
	}
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./register.css">
    </head>

<body>
    <div class="login">
        <img src="../img/logo.png" class="ml-5" style="width: 400px;" alt="">
        <div class="login-form" style="margin-top: 50px;">
            <div class="container">
                <form action="" method="POST" class="login-email">
                    <p>Username</p>
                    <div class="input-group">
                        <input class="w-100" type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                    </div>
                    <p>Email Address</p>
                    <div class="input-group">
                        <input class="w-100" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <p>Password</p>
                    <div class="input-group">
                        <input class="w-100" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <p>Confirm Password</p>
                    <div class="input-group">
                        <input class="w-100" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                    </div>
                    <div class="input-group d-flex justify-content-center">
                        <button name="submit" class="btn">Register</button>
                    </div>
                    <p class="login-register-text">Have an account? <a href="../login/login.php">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>