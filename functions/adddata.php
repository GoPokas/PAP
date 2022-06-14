<?php
include "../user/config.php";
require "../components/FlashMessages.php";

$leavetype = $_POST['leavetype'];
$docid = $_POST['docid'];
$department = $_POST['department'];
$position = $_POST['position'];

if (isset($leavetype)) {
    if (mysqli_query($conn, "INSERT INTO tiposmarcacao(nomeTiposmarcacao) VALUES ('$leavetype')")) {
        echo "Novo tipo de marcação criado com sucesso!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($docid)) {
    if (mysqli_query($conn, "INSERT INTO docidentificacao(nomeDocidentificacao) VALUES ('$docid')")) {
        echo "Novo tipo de documento criado com sucesso!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($department)) {
    if (mysqli_query($conn, "INSERT INTO departamento(nomeDepartamento) VALUES ('$department')")) {
        echo "Novo departamento criado com sucesso!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($position)) {
    if (mysqli_query($conn, "INSERT INTO cargos(nomeCargos) VALUES ('$position')")) {
        echo "Novo cargo criado com sucesso!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
