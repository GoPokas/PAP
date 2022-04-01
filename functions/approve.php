
<?php
include "../user/config.php";
require "../components/FlashMessages.php";

$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if (isset($_POST['approve'])) {
    $sql = "UPDATE marcacao SET idEstadomarcacao = 1 WHERE id = " . $_POST["approve"] . "";
    if (mysqli_query($conn, $sql)) {
        unset($_POST['approve']);
        $msg->success('Marcação aprovada com sucesso!', '../admin_pages/approval.php');
    } else {
        unset($_POST['approve']);
        $msg->error('Erro ao aprovar a marcação!', '../admin_pages/approval.php');
    }
}
if (isset($_POST['disapprove'])) {
    $sql = "UPDATE marcacao SET idEstadomarcacao = 2 WHERE id = " . $_POST["disapprove"] . "";
    if (mysqli_query($conn, $sql)) {
        unset($_POST['disapprove']);
        $msg->success('Marcação reprovada com sucesso!', '../admin_pages/approval.php');
    } else {
        unset($_POST['disapprove']);
        $msg->error('Erro ao reprovar a marcação!', '../admin_pages/approval.php');
    }
}
?>