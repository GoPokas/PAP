<?php
session_start();
if ($_SESSION["numFuncionario"] == null) {
  header("Location: ../pages/dashboard.php");
}
session_write_close();
