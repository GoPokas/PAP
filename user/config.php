<?php
/* Database credentials. Assuming you are running MySQL
 server with default setting (user 'root' with no password) */
// define('DB_SERVER', );
// define('DB_USERNAME', );
// define('DB_PASSWORD', );
// define('DB_NAME', );

($conn = mysqli_connect("localhost", "root", "", "demo")) or
  die("Connection failed: " . mysqli_connect_error());
