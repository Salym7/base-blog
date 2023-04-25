<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">
</head>

<body>
	<header class="site-header">
		<div class="container">
			<div class="logo">
				<div class="logo__title h3">My site</div>
				<div class="logo__subtitle h6">About some themes</div>
			</div>
		</div>
	</header>
	<nav class="site-nav">
		<div class="container">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= BASE_URL ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= BASE_URL ?>cats">Cats</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= BASE_URL ?>contacts">Contacts</a>
				</li>
				<? if ($user !== null) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>article/add">Add</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>admin">Admin</a>
					</li>
				<? endif ?>
				<? if ($user === null) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>/auth/login">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>/auth/reg">Registration</a>
					</li>
				<? else : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= BASE_URL ?>/auth/logout">Logout</a>
					</li>
				<? endif ?>
			</ul>
		</div>
	</nav>
	<div class="site-content">
		<div class="container">
			<?= $content ?>
		</div>
	</div>
	<footer class="site-footer">
		<div class="container">
			&copy; site about all
		</div>
	</footer>
</body>

</html>