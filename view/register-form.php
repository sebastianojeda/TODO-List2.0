<!--This require_once is conecting my config.php to my form.php-->
<?php
	require_once(__DIR__ . "/../model/config.php");
?>
<h1 class="h1">Register</h1>

<form class="register" method="post" action="<?php echo $path . "controller/create-user.php";?>">
	<div>
		<label for="email">Email:</label>
		<input type="text" name="email" />
	</div>

	<div>
		<label for="username">Username:</label>
		<input type="text" name="username" />
	</div>

	<div>
		<label for="password">Password:</label>
		<input type="password" name="password" />
	</div>

	<div>
		<button type="submit">Submit</button>
	</div>

</form>