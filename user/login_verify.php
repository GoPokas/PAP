<?php
session_start();
if (!$_SESSION['idfunc']) {
    header("location:../index.php");
    exit;
}
