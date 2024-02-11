<?php

$sucess = 0;
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include 'connect.php';
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// $sql = "insert into 'signup'(username,email,password)
	// values('$username','$email','$password')";

	// $result = mysqli_query($con, $sql);

	// if ($result){
	// 	echo "Data Inserted Successfully";
	// }
	// else {
	// 	die(mysqli_error($con)); 
	// }


	$sql = "SELECT * FROM signup WHERE username = '$username'";

	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "username already exists";
		$user = 1;
	} else {
		$sql = "INSERT INTO `signup` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($con, $sql);
		if ($result) {
			// echo "Sign Up Successfully";
			$sucess = 1;
		} else {
			die(mysqli_error($con));
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="./styles/sign-up.css" />
</head>

<body>
	<div class="container-box">
		<div class="sign_contact_col-2">
			<div class="sign_form-box" id="sign-in">
				<h1>Sign Up</h1>
				<form action="sign-up.php" method="post">
					<div class="input-group">
						<div class="input-field">
							<i class="fa-solid fa-user"></i>
							<input type="text" name="username" id="" placeholder="Enter Your username" />
						</div>
						<div class="input-field">
							<i class="fa-solid fa-envelope"></i>
							<input type="email" name="email" id="" placeholder="Enter Your email" />
						</div>
						<div class="input-field">
							<i class="fa-solid fa-lock"></i>
							<input type="password" name="password" id="" placeholder="Enter Your password" />
						</div>
					</div>
						<div class="comment-box">
							<?php
							if ($user == 1) {
							echo "<div class='comment-warn'>User already exists</div>";
							}
							
                            if ($sucess == 1) {
                                echo "<div class='comment-succ'>Sign Up Successfully</div>";
                            }
                            ?>
                		</div>
					<div class="btn-field">
						<button type="submit">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/62713cab29.js" crossorigin="anonymous"></script>
</body>

</html>