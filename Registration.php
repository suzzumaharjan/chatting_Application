
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="signup.css">
	</head>
	</head>
	<body>
		<div class="box1">
			<div class="para">Let's Get Started</div> 
			<p>Sign up and we will continue</p>
			<form method="post" action="http://localhost/chatting/userinsert.php">
				Fullname<br/>
				<input type="text" name="full_name" ></br>
				Address<br/>
				<input type="text" name="address" ></br>
                Phone Number<br/>
				<input type="number" name="phone" ></br>
				Date Of Birth<br/>
				<input type="date" name="date_of_birth" ></br>
				Email<br/>
				<input type="text"  placeholder="suja@gmail.com" name="email" ></br>
				Password<br/>
				<input type="password" name="password" ></br>
				<input type="Submit" name="submit" value="Sign Up">
			</form>
		</div>
		
				
	</body>
</html>