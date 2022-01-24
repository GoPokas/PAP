<?php
session_start();
if ($_SESSION["idfunc"]) {
  header("Location: pages/dashboard.php");
}
session_write_close();
