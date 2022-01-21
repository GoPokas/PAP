<?php
include('../components/footer.php');

$sql = "SELECT * FROM funcionario WHERE id = '{$_SESSION['numFuncionario']}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

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
            <!-- TODO: fix the wrong positioning of the profile 
            -->
            <?php if (!empty($row['avatarFuncionario'])) { ?>
                <div>
                    <img class="rounded-full h-40 w-40 mx-auto shadow" alt="Profile picture" src="../imgs/pfps/<?= $row['avatarFuncionario'] ?>">
                </div>
            <?php } else {?>
                <div>
                    <img class="rounded-full h-40 w-40 mx-auto shadow" alt="Profile picture" src="../imgs/default-avatar.png">
                </div>
            <?php } ?>
            <div class="bg-white rounded-lg p-4">
                <div class="flex mb-2 top-2 w-full text-center">
                    <span class="font-bold text-center w-full text-2xl "><?php echo $row['nomeFuncionario'] ?></span>
                </div>
                <div class="bg-white rounded-lg shadow-lg mx-auto">
                    <button class="pd-10"><a href="edit_perfil.php">Editar</a></button>
                    <table class="leading-none text-justify pb-0 w-full table-auto">
                        <thead class="w-full h-full font-bold">
                            <tr>
                                <th class="text-lg text-center w-1/3">Morada</th>
                                <th class="text-lg text-center w-1/3">Dados Pessoais</th>
                                <th class="text-lg text-center w-1/3">Dados Empresa</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>