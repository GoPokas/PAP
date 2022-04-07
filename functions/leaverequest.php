<?php
include "../user/config.php";
require "../components/FlashMessages.php";

$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if (isset($_POST['submit'])) {
    $obs = $_POST['obs'];
    $leavetype = $_POST['leavetype'];
    $idFuncionario = $_SESSION["numFuncionario"];
    $sql = "INSERT INTO marcacao (diapedidoMarcacao, obs, idTiposmarcacao, idFuncionario, idEstadomarcacao) VALUES (CURRENT_TIMESTAMP, '$obs', '$leavetype', '$idFuncionario', '0')";

    if ($insert = mysqli_query($conn, $sql)) {
        $msg->success('Marcação enviada com sucesso!', '../pages/leaves.php');
    } else {
        $msg->error('Erro ao enviar a marcação!', '../pages/leaves.php');
    }
}
