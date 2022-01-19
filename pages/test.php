<?php
session_start();
clearstatcache();
// include('../components/footer.php');

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    include('../user/config.php');


    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 10000) {
            $em = "Sorry, your file is too large.";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../imgs/pfps/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "UPDATE funcionario SET avatarFuncionario = '$new_img_name' WHERE id = '{$_SESSION['idfunc']}'";
                mysqli_query($conn, $sql);
                header('Location: ../pages/dashboard.php');
            } else {
                $em = "You can't upload files of this type";
            }
        }
    } else {
        $em = "unknown error occurred!";
    }
} else {
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Image Upload Using PHP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <?php if (isset($_GET['error'])) : ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
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