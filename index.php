<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CV Tukhik Gharagyozan</title>
	<meta name="description" content="CV">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

$conn = new mysqli('localhost', 'root', '', 'lesson');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result_skills = mysqli_query($conn, "SELECT * FROM skills");
$result_edu = mysqli_query($conn, "SELECT * FROM edu");
$result_exp = mysqli_query($conn, "SELECT * FROM exp");
$result_contact = mysqli_query($conn, "SELECT * FROM contact");
$result_about = mysqli_query($conn, "SELECT * FROM aboutyou");
$result_soctial = mysqli_query($conn, "SELECT * FROM socialinfo");
$result_user = mysqli_query($conn, "SELECT * FROM user");

$conn->close();
?>

<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<img src="images/profile.jpg" class="img-responsive img-circle tm-border" alt="CV">
				<hr>
				<h1 class="tm-title bold shadow">
				<?php
  if(mysqli_num_rows($result_user) > 0) {
  $i = 0;
 $user = mysqli_fetch_array($result_user)
?>
<h1 class="tm-title bold shadow"><?= $user['name']; ?></h1>
<h1 class="white bold shadow"><?= $user['prof']; ?></h1>
<?php

}else {
    echo "";
  }
  ?>

			</div>
		</div>
	</div>
</header>

<section class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="about">
				<h3>About me</h3>
					<?php
  if(mysqli_num_rows($result_about) > 0) {
  $i = 0;
  while($about = mysqli_fetch_array($result_about)) {
?>
<p><?= $about['about']; ?></p>
<?php
  $i++;
  }
}else {
    echo "";
  }
  ?>

			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="skills">
				<h2 class="white">Skills</h2>
				<?php
  if(mysqli_num_rows($result_skills) > 0) {
  $i = 0;
  while($skill = mysqli_fetch_array($result_skills)) {
?>
<div>
	<strong><?= $skill['name']; ?></strong>
	<span class="pull-right"><?= $skill['percent'] . '%'; ?></span>
	<div class="progress">
	<div class="progress-bar progress-bar-primary" role="progressbar"
	aria-valuenow="<?= $skill['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $value['percent'] . '%'; ?>;"></div>
	</div>
</div>
<?php
  $i++;
  }
}else {
    echo "";
  }
  ?>
</section>

<section class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="education">
				<h2 class="white">Education</h2>
				<div class="education-content">

					<?php
  if(mysqli_num_rows($result_edu) > 0) {
  $i = 0;
  while($edu = mysqli_fetch_array($result_edu)) {
?>
<div>
						<h4 class="education-title accent"><?=$edu['language']; ?></h4>
							<div class="education-school">
								<h5><?= $edu['center']; ?></h5><span></span>
							</div>
						</div>
<?php
  $i++;
  }
}else {
    echo "";
  }
  ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="container">
	<div class="row">
		<div class="col-md-4 col-sm-12">
			<div class="contact">
				<h2>Contact</h2>
				<?php if(mysqli_num_rows($result_contact) > 0) {
  $i = 0;
  while($contact = mysqli_fetch_array($result_contact)) { ?>
					<p><i class="<?= $contact['class']; ?>" ></i><?= $contact['data']; ?></p>
					<?php
  $i++;
  }
}else {
    echo "";
  }
  ?>
			</div>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="experience">
				<h2 class="white">Experiences</h2>
				<?php if(mysqli_num_rows($result_exp) > 0) {
  $i = 0;
  while($exp = mysqli_fetch_array($result_exp)) { ?>
					<div class="experience-content">
							<h4 class="experience-title accent"><?= $exp['profession']; ?></h4>
							<h5><?= $exp['company']; ?></h5><span></span>
						</div>
						<?php
  $i++;
  }
}else {
    echo "";
  }
  ?>
			</div>
		</div>
	</div>
</section>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>&copy; 2022 My CV</p>
				<ul class="social-icons">
				<?php
  if(mysqli_num_rows($result_soctial) > 0) {
  $i = 0;
  while($social = mysqli_fetch_array($result_soctial)) {
?>
					<li><a href="<?= $social['href']; ?>" class="<?= $social['icon']; ?>"></a></li>
					<?php
  $i++;
  }
}else {
    echo "";
  }
  ?>
				</ul>
			</div>
		</div>
	</div>
</footer>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/jquery-3.6.0.min.js"></script> -->
<script src="js/custom.js"></script>

</body>
</html>