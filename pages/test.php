<?php
include "../components/footer.php";

$sql = "SELECT * FROM funcionario WHERE id = '{$_SESSION["numFuncionario"]}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST["submit"]) && isset($_FILES["my_image"])) {
  $target_dir = "../imgs/pfps/";
  $img_name = $_FILES["my_image"]["name"];
  $img_size = $_FILES["my_image"]["size"];
  $tmp_name = $_FILES["my_image"]["tmp_name"];
  $error = $_FILES["my_image"]["error"];

  if ($error === 0) {
    if ($img_size > 10000000) {
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = ["jpg", "jpeg", "png"];
      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = "PFP-" . $_SESSION["numFuncionario"] . "." . $img_ex_lc;
        if (
          file_exists(
            $target_dir . "PFP-" . $_SESSION["numFuncionario"] . "." . "jpg"
          )
        ) {
          unlink($target_dir . "PFP-" . $_SESSION["numFuncionario"] . ".jpg");
        } elseif (
          file_exists(
            $target_dir . "PFP-" . $_SESSION["numFuncionario"] . "." . "jpeg"
          )
        ) {
          unlink($target_dir . "PFP-" . $_SESSION["numFuncionario"] . ".jpeg");
        } elseif (
          file_exists(
            $target_dir . "PFP-" . $_SESSION["numFuncionario"] . "." . "png"
          )
        ) {
          unlink($target_dir . "PFP-" . $_SESSION["numFuncionario"] . ".png");
        }
        $img_upload_path = $target_dir . $new_img_name;
        $finalimage = imagecreate(100, 100, $new_img_name);
        imagepng($finalimage, $img_upload_path);
        $sql = "UPDATE funcionario SET avatarFuncionario = '$new_img_name' WHERE idUser = '{$_SESSION["numFuncionario"]}'";
        mysqli_query($conn, $sql);
        header("Location: ../pages/perfil.php");
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Image Upload Using PHP</title>

</head>

<body>
  <?php if (isset($_GET["error"])) : ?>
    <p><?php echo $_GET["error"]; ?></p>

  <?php endif; ?>
  <form action="" method="post" enctype="multipart/form-data">

    <input type="file" name="my_image">

    <input type="submit" name="submit" value="Upload">

  </form>
</body>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

</html>