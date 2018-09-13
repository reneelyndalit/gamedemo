<?php 
// ini_set('display_errors',1);
// error_reporting(E_ALL);
include 'header_include.html'; 
include 'connection.php'; 
$checked = null;
if($_SESSION['user'] != null){
	header('Location: /');
}
if (isset($_POST['login'])) {
	if (empty($_POST['user']) || empty($_POST['password'])) {
		echo "<script> alert(\"Username or Password is empty.\"); location.assign('/login.php'); </script>";
	}
	else
	{
		$username = htmlspecialchars($_POST["user"],ENT_QUOTES);
		$password = htmlspecialchars($_POST["password"],ENT_QUOTES);

		$sql = "SELECT *
				FROM users
				WHERE username = '$username'
				AND password = '$password'
				OR email = '$username'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
	       		$username = $row["username"];
	       		$password = $row["password"];

	       		$_SESSION['user'] = $username;
   	 		}
   	 		header('Location: /');
		}else{
			echo "<script> alert(\"Username or Password doesn't exist.\"); location.assign('/login.php'); </script>";
		}	
	}
}
if(isset($_REQUEST["sign_up"])){
	$checked = $_REQUEST["sign_up"];
}
if(isset($_POST["sign_up"])){	
	$username = htmlspecialchars($_POST["user"],ENT_QUOTES);
	$password = htmlspecialchars($_POST["pass"],ENT_QUOTES);
	$repassword = htmlspecialchars($_POST["repass"],ENT_QUOTES);
	$email = htmlspecialchars($_POST["email"],ENT_QUOTES);

	$sql = "SELECT *
			FROM users
			WHERE username = '$username'
			AND email = '$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<script> alert(\"Username or email exists.\"); location.assign('/login.php?sign_up=me'); </script>";
	}
	if (empty($username) || empty($password) || empty($email)) {
		echo "<script> alert(\"Fields Required.\"); location.assign('/login.php?sign_up=me'); </script>";
	}else{
		if($password == $repassword)
		{
			$sql = "INSERT INTO
					users
					(username,
					password,
					email)
					VALUES
					('$username',
					'$password',
					'$email')";
			$result = mysqli_query($conn, $sql);
			$_SESSION['user'] = $username;
			echo "<script> alert(\"You are successfully registered.\"); location.assign('/'); </script>";
		}else{
			echo "<script> alert(\"Password not match.\"); location.assign('/login.php?sign_up=me'); </script>";
		}
	}
	
}
?>
<link rel="stylesheet" href="/css/login.css?b">
<div class="wrapper">
	<div class="backleft"><a href="/"><span class="fas fa-chevron-left"></span></a></div>
	<div class="container">
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" <?php if($checked == null) {echo 'checked';}?>><label for="tab-1" class="tab">Sign In</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up" <?php if($checked == 'me') {echo 'checked';}?> ><label for="tab-2" class="tab">Sign Up</label>
				<div class="login-form">
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="sign-in-htm">
						<div class="group">
							<label for="loginuser" class="label">Username / Email</label>
							<input id="loginuser" type="text" class="input" name="user">
						</div>
						<div class="group">
							<label for="loginpass" class="label">Password</label>
							<input id="loginpass" type="password" class="input" data-type="password" name="password">
						</div>
						<!-- <div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Keep me Signed in</label>
						</div> -->
						<br><br>
						<div class="group">
							<input type="submit" class="button" value="Sign In" name="login">
						</div>
						<div class="hr"></div>
						<!-- <div class="foot-lnk">
							<a href="#forgot">Forgot Password?</a>
						</div> -->
					</div>
				</form>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>?sign_up=me">
					<div class="sign-up-htm">
						<div class="group">
							<label for="user" class="label">Username</label>
							<input id="user" type="text" class="input" name="user">
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input id="pass" type="password" class="input" data-type="password" name="pass">
						</div>
						<div class="group">
							<label for="repass" class="label">Repeat Password</label>
							<input id="repass" type="password" class="input" data-type="password" name="repass">
						</div>
						<div class="group">
							<label for="email" class="label">Email Address</label>
							<input id="email" type="email" class="input" name="email">
						</div>
						<div class="group">
							<input type="submit" class="button" value="Sign Up" name="sign_up">
						</div>
						<div class="hr"></div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
