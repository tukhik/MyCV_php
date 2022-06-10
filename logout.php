<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: /mycv/login.php');
exit;