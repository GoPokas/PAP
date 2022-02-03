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
        move_uploaded_file($tmp_name, $img_upload_path);
        // Insert into Database
        $sql = "UPDATE funcionario SET avatarFuncionario = '$new_img_name' WHERE idUser = '{$_SESSION["numFuncionario"]}'";
        mysqli_query($conn, $sql);
        header("Location: ../pages/perfil.php");
      }
    }
  }
}
?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">
</head>

<body class="font-inter">
    <div class="h-full w-[85%] relative ml-60 top-10">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <?php if (!empty($row["avatarFuncionario"])) { ?>
                <div>
                    <img class="rounded-full h-40 w-40 mx-auto shadow" alt="Profile picture" src="../imgs/pfps/<?= $row[
                      "avatarFuncionario"
                    ] ?>">
                        <form action="" method="" enctype="multipart/form-data">
                            <label for="files" class="btn">Select Image</label>
                            <input type="file" class="rounded-full text-transparent w-[5.8rem] hidden" name="my_image" id="my_image" placeholder=" " title=" "/>
                            <!-- <input type="submit" style=""> -->
                        </form>
                </div>
            <?php } else { ?>
                <div>
                    <img class="rounded-full h-40 w-40 mx-auto shadow" alt="Profile picture" src="../imgs/default-avatar.png">
                </div>
            <?php } ?>
            <div class="bg-white rounded-lg p-4">
                <div class="flex mb-2 top-2 w-full text-center">
                    <span class="font-bold text-center w-full text-2xl "><?php echo $row[
                      "nomeFuncionario"
                    ]; ?></span>
                </div>
                <div class="bg-white rounded-lg shadow-lg mx-auto">
                    <table class="leading-none text-justify pb-0 w-full table-auto">
                        <thead class="w-full h-full font-bold">
                            <tr>
                                <th class="text-lg text-center w-1/3">Morada</th>
                                <th class="text-lg text-center w-1/3">Dados Pessoais</th>
                                <th class="text-lg text-center w-1/3">Dados Empresa</th>
                                <form action="" method="POST">
                                    <input type="submit" name="submit" id="submit">
                                </form>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById('my_image_alt').onclick = function() {
        document.getElementById('my_image').click();
    };
</script>
</html>