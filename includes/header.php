<?php
/**
 * Created by PhpStorm.
 * User: aran
 * Date: 23/02/2015
 * Time: 11:10
 */

?>

<div class="navbar navbar-default col-md-12 " role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="<?= $basePath.'index.php' ?>">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if($login_obj->loggedIn()): ?>
					<li><a href="<?= $basePath ?>logout.php">Logout</a></li>
				<?php endif; ?>
				<?php if(!$login_obj->loggedIn()): ?>
					<li><a href="<?= $basePath.'register.php' ?>">Register</a> </li>
					<li><a href="<?= $basePath.'login_obj.php'?>">Login</a> </li>
				<?php endif; ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</div>
<!--	Start flash messages  -->
<div class="row">
	<?php if($_SESSION['flash']!==''): ?>
		<div class='alert alert-warning col-md-12'>
			<ul>
				<?php foreach($_SESSION['flash'] AS $message): ?>
					<li><?= $message ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
		$flash = $_SESSION['flash'];
		$_SESSION['flash'] = '';
	endif;
	?>
</div>
<!--	End flash messages  -->
