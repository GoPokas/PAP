<?php
session_start();
include('user/config.php');

if (empty($_POST['idfunc']) || empty($_POST['password'])) {
    header('Location: pages/dashboard.php');
    exit();
}

$idfunc = mysqli_real_escape_string($conn, $_POST['idfunc']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$nomeFuncionario = mysqli_real_escape_string($conn, $_POST['nomeFuncionario']);

$query = "SELECT * FROM user WHERE idfunc = '{$idfunc}' and password = md5('{$password}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['idfunc'] = $idfunc;
    header('Location: pages/dashboard.php');
    exit();
}
