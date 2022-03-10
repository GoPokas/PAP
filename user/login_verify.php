<?php
session_start();
if ($_SESSION["numFuncionario"] == "") {
  header("location: ../index.php");
  exit();
}
