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
    <!-- <link rel="shortcut icon" href="../imgs/favicon.ico" type="image/x-icon"> -->
</head>

<body class="font-inter">
    <div class="h-full w-[80%] relative overflow-hidden ml-60 top-[3.75rem]">
        <div class="w-[95%]  grid grid-cols-2 gap-4">
            <div class="bg-white rounded-lg p-4">
                <span class="text-2xl sm:text-4xl leading-none text-gray-900 pb-4">Bem-vindo,
                    <?php echo strtok($row['nomeFuncionario'], " ") ?>
                </span>
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between top-2">
                    </div>
                    <div class="p-3 flex items-end">
                        <span class="text-lg leading-none font-semibold text-gray-900 p-2 pb-0">Próximas Ausências</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg p-4">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-white pb-4">.
                </span>
                <div class="bg-white rounded-lg shadow-lg top-60">
                    <div class="flex items-center justify-between top-2">
                    </div>
                    <div class="p-3">
                        <span class="text-lg leading-none font-semibold text-gray-900 p-2 pb-0">Dias Gozados</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>