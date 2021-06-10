<?php 

include '../utils/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../homepageuser/homepageuser.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		header("Location: ../homepageuser/homepageuser.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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

    <link rel="stylesheet" href="./login.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="login">
        <img src="../img/logo.png" class="ml-5" style="width: 400px;" alt="">
        <div class="login-form" style="margin-top: 120px;">
            <div class="container">
                <form action="" method="POST" class="login-email">
                    <p>Email Address</p>
                    <div class="input-group">
                        <input class="w-100" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <p>Password</p>
                    <div class="input-group">
                        <input class="w-100" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="input-group d-flex justify-content-center">
                        <button name="submit" class="btn">Login</button>
                    </div>
                    <p class="login-register-text">Don't have an account? <a href="../register/register.php">Register Here</a></p>
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