<?php
if($_SESSION['logged']){
    header('Location: admin.php');
    exit;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CV Tukhik Gharagyozan</title>
	<meta name="description" content="CV">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<main>
<div class="form">
    <form action="admin.php" method="post" class="madminForm">
    <div class="loginAdmin">Login ADMIN</div>
    <div>
        <div>
            <input type="email" required name="email" placeholder="Email">
        </div>
        <dev>
            <input type="password" required name="password" id="" placeholder="Password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </div>
    </form>
</div>
</main>
</body>
</html>
