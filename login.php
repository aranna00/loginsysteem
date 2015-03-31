<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 27/03/2015
 * Time: 13:17
 */

	require_once('core\init.php');
	require_once($basePath.'includes/assets.php');

?>

<html>
<head>
	<title>home</title>
</head>
<body>
<div class="container-fluid">
	<?php include_once('includes/header.php'); ?>
	<!--	Start main body -->
	<div class="row">
		<form action="<?= $basePath ?>login\login.php" method="post">
			<div class="form-group <?php if(isset($flash['username'])):?> has-error <?php endif; ?>">
				<label class="control-label" for="username">Username:</label>
				<input id="username" placeholder="Username" type="text" class="form-control" name="username">
				<span class="help-block"><?php if(isset($flash['username'])): echo $flash['username']; endif; ?></span>
			</div>
			<div class="form-group <?php if(isset($flash['password'])):?> has-error <?php endif; ?>">
				<label class="control-label" for="password">Password:</label>
				<input id="password" placeholder="Password" type="password" class="form-control" name="password">
				<span class="help-block"><?php if(isset($flash['password'])): echo $flash['password']; endif; ?></span>
			</div>
			<div class="form-actions">
				<a class="btn btn-default" href="<?= $basePath ?>index.php">Terug</a>
				<input type="submit" value="Login" class="btn btn-default">
			</div>
		</form>
	</div>
	<!--	end main body -->
	<?php include_once('includes/footer.php') ?>
</div>
</body>
</html>