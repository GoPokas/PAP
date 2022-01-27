<?php
session_start();
if ($_SESSION["numFuncionario"]) {
  header("Location: ../pages/dashboard.php");
}
session_write_close();
