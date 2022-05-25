<?php
require "../user/config.php";

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$postalcode = mysqli_real_escape_string($conn, $_POST['postalcode']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$docid = mysqli_real_escape_string($conn, $_POST['docid']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$department = mysqli_real_escape_string($conn, $_POST['department']);

if (
    mysqli_query($conn, "INSERT INTO codigopostal(codigoPostal, localidade) VALUES ('$postalcode', '$district')")
    && mysqli_query($conn, "INSERT INTO funcionario(id, nomeFuncionario, moradaFuncionario, dataNascimentoFuncionario, emailFuncionario, idGenero) VALUES ('$id', '$name', '$address', '$birthdate', '$email', '$gender')")
    && mysqli_query($conn, "INSERT INTO funcionario_has_docidentificacao(funcionario_id, docidentificacao_id) VALUES ('$id', '$docid')")
    && mysqli_query($conn, "INSERT INTO funcionario_has_departamento(funcionario_id, departamento_id) VALUES ('$id', '$department')")
    && mysqli_query($conn, "INSERT INTO funcionario_has_cargos(funcionario_id, cargos_id) VALUES ('$id', '$position')")
    && mysqli_query($conn, "INSERT INTO user(numFuncionario, password) VALUES ('$id', md5($password))")
) {
    echo "Records added successfully.";
    header("Refresh:0; url=../pages/dashboard.php");
} else {
    echo "ERROR: Could not execute sql: " . mysqli_error($conn);
}
