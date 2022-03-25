<?php
include "../components/footer.php";

$sql = "SELECT * FROM marcacao
        INNER JOIN tiposmarcacao on marcacao.idTiposmarcacao = tiposmarcacao.id
        INNER JOIN estadomarcacao on marcacao.idEstadomarcacao = estadomarcacao.id
        INNER JOIN funcionario on marcacao.idFuncionario = funcionario.id
        WHERE marcacao.idFuncionario = '{$_SESSION["numFuncionario"]}'
        AND marcacao.idEstadomarcacao = 0";

$resultrequests = mysqli_query($conn, $sql);

$requests = mysqli_fetch_assoc($resultrequests);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="font-inter">
    <div class="h-full w-[80%] relative overflow-hidden ml-60 top-[3.75rem] align-middle">
        <span class="text-2xl sm:text-4xl text-gray-900 font-bold">
            <?php
            $sql = "SELECT * FROM funcionario
                    INNER JOIN genero on funcionario.idGenero = genero.id 
                    WHERE funcionario.id = '{$_SESSION["numFuncionario"]}'";

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);

            if (
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
                    <div class="flex items-end pb-1">
                        <div class="rounded-lg w-full">
                            <div>
                                <table class="leading-none text-center pb-0 w-full gap-4 table-auto">
                                    <thead class="text-lg font-bold text-opacity-85 w-full h-full">
                                        <th class="w-40">Tipo</th>
                                        <th class="w-40">Quantidade Dias</th>
                                        <th class="w-40">Estado</th>
                                        <th class="w-10 justify-end"></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($requests = mysqli_fetch_assoc($resultrequests)) {
                                        ?>
                                            <tr class="h-8 text-sm">
                                                <td><?php echo $requests["nomeTiposmarcacao"]; ?></td>
                                                <td>
                                                    <?php
                                                    $datestartformat = date('d/m/Y', strtotime($requests["diainicioMarcacao"]));
                                                    $dateendformat = date('d/m/Y', strtotime($requests["diafimMarcacao"]));
                                                    $daterequestformat = date('d/m/Y', strtotime($requests["diapedidoMarcacao"]));
                                                    $datestart = new DateTime($requests["diainicioMarcacao"]);
                                                    $dateend = new DateTime($requests["diafimMarcacao"]);
                                                    $days = $datestart->diff($dateend);
                                                    if ($days->days == 1) {
                                                        echo $days->days . " Dia";
                                                    } elseif ($days->days > 1 || $days->days == 0) {
                                                        echo $days->days . " Dias";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($requests["idEstadomarcacao"] == 0) {
                                                    ?>
                                                        <div class="bg-yellow-300 rounded-xl text-yellow-600 font-bold p-1 w-40 mx-auto"><?php echo $requests["nomeEstadomarcacao"]; ?>
                                                        </div>
                                                    <?php
                                                    } elseif ($requests["idEstadomarcacao"] == 1) {
                                                    ?>
                                                        <div class="bg-green-300 rounded-xl text-green-500 font-bold p-1 w-40 mx-auto"><?php echo $requests["nomeEstadomarcacao"]; ?>
                                                        </div>
                                                    <?php
                                                    } elseif ($requests["idEstadomarcacao"] == 2) {
                                                    ?>
                                                        <div class="bg-red-300 rounded-xl text-red-500 font-bold p-1 w-40 mx-auto"><?php echo $requests["nomeEstadomarcacao"]; ?>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button class="items-end opacity-70 hover:opacity-100">
                                                        <a href="requests.php">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                        <div class="w-[95%] grid grid-cols-1 gap-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>