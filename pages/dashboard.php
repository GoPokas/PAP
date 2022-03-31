<?php
include "../components/footer.php";
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
            $employeesql = "SELECT * FROM funcionario
                    INNER JOIN genero on funcionario.idGenero = genero.id 
                    WHERE funcionario.id = '{$_SESSION["numFuncionario"]}'";

            $resultemployee = mysqli_query($conn, $employeesql);

            $employee = mysqli_fetch_array($resultemployee);

            if (
                $employee["abreviaturaGenero"] == "M" ||
                $employee["abreviaturaGenero"] == "O"
            ) {
                echo "Bem-vindo, ";
            } elseif ($employee["abreviaturaGenero"] == "F") {
                echo "Bem-vinda, ";
            } ?>
            <?php echo strtok($employee["nomeFuncionario"], " "); ?>
        </span>
        <div class="w-full flex flex-row mt-2 space-x-4">
            <div class="bg-white rounded-lg flex flex-col w-full">
                <div class="bg-white rounded-lg shadow-lg h-[196px]">
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
                                        $requestssql = "SELECT * FROM marcacao
                                                INNER JOIN tiposmarcacao on marcacao.idTiposmarcacao = tiposmarcacao.id
                                                INNER JOIN estadomarcacao on marcacao.idEstadomarcacao = estadomarcacao.id
                                                INNER JOIN funcionario on marcacao.idFuncionario = funcionario.id
                                                WHERE marcacao.idFuncionario = '{$_SESSION["numFuncionario"]}'
                                                AND marcacao.idEstadomarcacao = 0 LIMIT 5";

                                        $resultrequests = mysqli_query($conn, $requestssql);

                                        while ($requests = mysqli_fetch_array($resultrequests)) {
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
                                                    <div class="bg-yellow-300 rounded-xl text-yellow-600 font-bold p-1 w-40 mx-auto"><?php echo $requests["nomeEstadomarcacao"]; ?>
                                                    </div>
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
                <div class="bg-white rounded-lg shadow-lg h-[196px]">
                    <div class="flex items-center justify-between top-2">
                    </div>
                    <div class="p-2 flex bg-cyan-800">
                        <span class="text-lg leading-none font-semibold text-white pb-0 items-center">Dias Gozados</span>
                    </div>
                    <div class="flex items-end pb-1">
                        <div class="rounded-lg w-full">
                            <div>
                                <table class="leading-none text-center pb-0 w-full table-auto">
                                    <thead class="text-lg font-bold text-opacity-85 w-full h-full">
                                        <th class="w-40">Férias</th>
                                        <th class="w-40">Ausências Médicas</th>
                                        <th class="w-40">Outros</th>
                                    </thead>
                                    <tbody>
                                        <tr class="h-8 font-bold text-[100px]">
                                            <td>
                                                <?php

                                                $dayssql = "SELECT * FROM dias
                                                WHERE idFuncionario = '{$_SESSION["numFuncionario"]}'";

                                                $resultsdays = mysqli_query($conn, $dayssql);

                                                while ($days = mysqli_fetch_array($resultsdays)) {
                                                    $daysfreeleaves = $days["diasferiasdisponiveis"];
                                                    $daysusedleaves = $days["diasferiasgozados"];
                                                    $daysusedmedical = $days["diasmedicasgozados"];
                                                    $daysusedother = $days["diasoutrosgozados"];
                                                    if ($daysusedleaves <= 18 && $daysusedleaves >= 7) {
                                                ?>
                                                        <div class="rounded-xl text-yellow-500"><?php echo $daysusedleaves; ?>
                                                        </div>
                                                    <?php
                                                    } elseif ($daysusedleaves > 18) {
                                                    ?>
                                                        <div class="rounded-xl text-red-600"><?php echo $daysusedleaves; ?>
                                                        </div>
                                                    <?php
                                                    } elseif ($daysusedleaves < 7 && $daysusedleaves >= 0) {
                                                    ?>
                                                        <div class="rounded-xl text-green-400"><?php echo $daysusedleaves; ?>
                                                        </div>
                                                <?php   }
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $daysusedmedical;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $daysusedother;
                                                ?>
                                        </tr>
                                        <tr>
                                            <td class="font-semibold">
                                                Dias disponíveis: <?php echo $daysfreeleaves; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>