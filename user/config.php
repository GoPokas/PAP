<?php
($conn = mysqli_connect("127.0.0.1", "root", "", "leavify")) or
  die("Connection failed: " . mysqli_connect_error());

$conn->query("SET NAMES utf8");
