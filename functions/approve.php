
<?php
include "../user/config.php";
require "../components/FlashMessages.php";

$request_id = $_POST['approve'];

$requestsql = "SELECT * FROM marcacao
                WHERE marcacao.id = '$request_id'";
$requestresult = mysqli_query($conn, $requestsql);
$requestrow = mysqli_fetch_array($requestresult);

$datestart = new DateTime($requestrow["diainicioMarcacao"]);
$dateend = new DateTime($requestrow["diafimMarcacao"]);
$days = $datestart->diff($dateend);

$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if (isset($_POST['approve'])) {
    $state = "UPDATE marcacao SET idEstadomarcacao = 1 WHERE id = " . $_POST["approve"] . "";
    $employee = "SELECT idFuncionario FROM marcacao WHERE id = " . $_POST["approve"] . "";
    $employeeresult = mysqli_query($conn, $employee);
    $employeerow = mysqli_fetch_array($employeeresult);
    $employeeid = $employeerow["idFuncionario"];
    $days = "UPDATE funcionario SET diasGozados = diasGozados + $days->days WHERE idFuncionario = $employeeid";
    if (mysqli_query($conn, $state) && mysqli_query($conn, $days)) {
        unset($_POST['approve']);
        $msg->success('Marcação aprovada com sucesso!', '../admin_pages/approval.php');
    } else {
        unset($_POST['approve']);
        $msg->error('Erro ao aprovar a marcação!', '../admin_pages/approval.php');
    }
}
if (isset($_POST['disapprove'])) {
    $state = "UPDATE marcacao SET idEstadomarcacao = 2 WHERE id = " . $_POST["disapprove"] . "";
    if (mysqli_query($conn, $state)) {
        unset($_POST['disapprove']);
        $msg->success('Marcação reprovada com sucesso!', '../admin_pages/approval.php');
    } else {
        unset($_POST['disapprove']);
        $msg->error('Erro ao reprovar a marcação!', '../admin_pages/approval.php');
    }
}
?>