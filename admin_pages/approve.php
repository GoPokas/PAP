
<?php
include "../user/config.php";
if (isset($_POST['approve'])) {
    $sql = "UPDATE marcacao SET idEstadomarcacao = 1 WHERE id = " . $_POST["approve"] . "";
    if (mysqli_query($conn, $sql)) {
        unset($_POST['approve']);
        header("Location: approval.php");
    } else {
        unset($_POST['approve']);
        header("Location: approval.php");
    }
}
if (isset($_POST['disapprove'])) {
    $sql = "UPDATE marcacao SET idEstadomarcacao = 2 WHERE id = " . $_POST["disapprove"] . "";
    if (mysqli_query($conn, $sql)) {
        unset($_POST['disapprove']);
        header("Location: approval.php");
    } else {
        unset($_POST['disapprove']);
        header("Location: approval.php");
    }
}
?>