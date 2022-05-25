<?php
require "../user/config.php";

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$startingdate = mysqli_real_escape_string($conn, $_POST["startingdate"]);
$endingdate = mysqli_real_escape_string($conn, $_POST["endingdate"]);
$leavetype = mysqli_real_escape_string($conn, $_POST["leavetype"]);
$obs = mysqli_real_escape_string($conn, $_POST['obs']);

if (mysqli_query($conn, "INSERT INTO marcacao(diainicioMarcacao, diafimMarcacao, diapedidoMarcacao, obs, idTiposmarcacao, idFuncionario, idEstadomarcacao) VALUES('$startingdate', '$endingdate', CURRENT_TIMESTAMP, '$obs', '$leavetype', '$id', '0')")) {
    echo "Records added successfully.";
    header("Refresh:0; url=../pages/dashboard.php");
} else {
    echo "ERROR: Could not execute sql: " . mysqli_error($conn);
}
