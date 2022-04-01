<?php
if ($_SESSION["numFuncionario"] == "") {
  header("location: ../index.php");
  exit();
}
