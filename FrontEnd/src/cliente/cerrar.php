<?php

session_start();

unset($_SESSION['cliente']);

$url_inicio = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
header("Location: $url_inicio/index.php");