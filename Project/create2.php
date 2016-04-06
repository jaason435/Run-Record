<?php session_start(); 
?>
<html>
<head>
	<title>Create Account</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/bootstrap.formhelpers/1.8.2/js/bootstrap-formhelpers-countries.en_US.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/bootstrap.formhelpers/1.8.2/js/bootstrap-formhelpers-countries.js" type="text/javascript"></script>

	<?php
		  include_once "db/db.php";
		  include_once "includes/states.php";
	?>
</head>

<body>
	<?php include("navbar.php");
	<div class="header">
		<a href="main.php"><img width="100" height="100" alt="" src="images/logo.png"></a>
		<h1><b>Create Account</b></h1>
	</div>
	<div class="container">
		<div class="row">
		</div>
		<div class="col-md-5">
			<div id="userInformation">
				<form class="form-inline" method="post" action="db/createUser2.php">
				
					<h3><b>Account Information</b></h3>

					<label for="usernameInput">Username<span style="color:red">*<span></label>
					<div class="control-group">
						<input type="text" class="form-control <?php errorOutline("failedUsername"); ?>" name="username" maxlength="20" <?php rememberField("username") ?>>
						<?php errorMessage("failedUsername"); ?>
					</div>
					<br>

					<label for="passwordInput">Password<span style="color:red">*<span></label>
					<div class="control-group">
	                  	<input type="password" class="form-control <?php errorOutline("failedPassword"); ?>" name="password" maxlength="20">
					 	<?php errorMessage("failedPassword"); ?>
					</div>
					<br>

					<label for="verifyPasswordInput">Verify Password<span style="color:red">*<span></label>
					<div class="control-group">
                  		<input type="password" class="form-control <?php errorOutline("failedVerifyPassword"); ?>" name="verifyPassword" maxlength="20">
                  		<?php errorMessage("failedVerifyPassword"); ?>
					</div>
					<br>

					<h3><b>Contact Information</b></h3>

					<label for="firstNameInput">First Name<span style="color:red">*<span></label>
					<div class="control-group">
						<input type="text" class="form-control <?php errorOutline("failedFirstName"); ?>" name="firstName" maxlength="20" <?php rememberField("firstName") ?>>
						<?php errorMessage("failedFirstName"); ?>
					</div>
					<br>


					<label for="lastNameInput">Last Name<span style="color:red">*<span></label>
					<div class="control-group">
						<input type="text" class="form-control <?php errorOutline("failedLastName"); ?>" name="lastName" maxlength="20" <?php rememberField("lastName") ?>>
						<?php errorMessage("failedLastName"); ?>
					</div>
					<br>

					<input type="submit" name="submit">
				</form>
	        </div>
	   </div>
	</div>
</body>
</html>

<?php
// echos out the error message
// must pass in the $_SESSION parameter to check for
// Sample Usage: errorMessage("failedUsername");
function errorMessage($failedType) {
	if(!empty($_SESSION[$failedType])) {
		echo $_SESSION[$failedType];
		unset($_SESSION[$failedType]);
	}
}

// outputs "error" into the class of an input box
// this will put a red line around the input box
// Sample Usage: errorMessage("failedUsername");
function errorOutline($failedType) {
	if(!empty($_SESSION[$failedType])) {
		echo "error";
	}
}

// remembers the field accross submits
// for example if a user types in their name
// as "Bob", it will not ask them to re-enter
// remember to save the session variable first in createUser.php
// Sample Usage: errorMessage("firstName");
function rememberField($fieldType) {
	if(isset($_SESSION[$fieldType])) {
		echo 'value="'. $_SESSION[$fieldType] . '"';
	}
}
?>
