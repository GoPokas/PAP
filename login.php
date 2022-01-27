<?php
session_start();
include "user/config.php";

$numFuncionario = mysqli_real_escape_string($conn, $_POST["numFuncionario"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

$query = "SELECT * FROM user WHERE numFuncionario = '{$numFuncionario}' and password = md5('{$password}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
  $_SESSION["numFuncionario"] = $numFuncionario;
  header("Location: pages/dashboard.php");
  exit();
} else {
  header("Location: index.php?error=1");
  exit();
}
