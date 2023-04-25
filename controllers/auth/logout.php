<?php
unset($_SESSION['token']);
unset($_COOKIE['token']);
setcookie('token', '', time() - 1, BASE_URL);

$token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;

header('Location: ' . BASE_URL);
