<?php
require_once('../user/login_verify.php');
require('../user/config.php');
$sql = "SELECT * FROM user WHERE numFuncionario = '{$_SESSION['numFuncionario']}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

    $target_dir = "../imgs/pfps/";
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 10000000) {
        } else {

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = "PFP-" . $_SESSION['numFuncionario'] . '.' . $img_ex_lc;
                    if(file_exists($target_dir. "PFP-" . $_SESSION['numFuncionario'] . '.' . 'jpg')){
                       unlink($target_dir . "PFP-" . $_SESSION['numFuncionario'] . '.jpg');
                    } else if(file_exists($target_dir. "PFP-" . $_SESSION['numFuncionario'] . '.' . 'jpeg')){
                       unlink($target_dir . "PFP-" . $_SESSION['numFuncionario'] . '.jpeg');
                    } else if(file_exists($target_dir. "PFP-" . $_SESSION['numFuncionario'] . '.' . 'png')){
                       unlink($target_dir . "PFP-" . $_SESSION['numFuncionario'] . '.png');
                    }
                $img_upload_path = $target_dir . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                    // Insert into Database
                    $sql = "UPDATE funcionario SET avatarFuncionario = '$new_img_name' WHERE idUser = '{$_SESSION['numFuncionario']}'";
                    mysqli_query($conn, $sql);
                    header('Location: ../pages/perfil.php');
            }
        }
    }
}
?>