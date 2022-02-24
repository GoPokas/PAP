<?php
include "../components/footer.php";

$sql = "SELECT * FROM funcionario
        INNER JOIN genero on funcionario.idGenero = genero.id 
        WHERE funcionario.id = '{$_SESSION["numFuncionario"]}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="font-inter">
    <div class="h-full w-[80%] relative overflow-hidden ml-60 top-[3.75rem] align-middle">
        <span class="text-2xl sm:text-4xl text-gray-900">
            <?php if (
              $row["abreviaturaGenero"] == "M" ||
              $row["abreviaturaGenero"] == "O"
            ) {
              echo "Bem-vindo, ";
            } elseif ($row["abreviaturaGenero"] == "F") {
              echo "Bem-vinda, ";
            } ?>
            <?php echo strtok($row["nomeFuncionario"], " "); ?>
        </span>
        <div class="w-full flex flex-row mt-2 space-x-4">
            <div class="bg-white rounded-lg flex flex-col w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between top-2">
                    </div>
                    <div class="p-2 flex bg-cyan-800">
                        <span class="text-lg leading-none font-semibold text-white pb-0 items-center">Pedidos</span>
                    </div>
                    <div class="p-3 flex items-end pb-1">
                        aaaa
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg flex flex-col w-full">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between top-2">
                    </div>
                    <div class="p-2 flex bg-cyan-800">
                        <span class="text-lg leading-none font-semibold text-white pb-0 items-center">Dias Gozados</span>
                    </div>
                    <div class="p-3 flex items-end pb-1">
                        aaaa
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>