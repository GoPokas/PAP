<?php
include "../components/footer.php";


if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}
$limite_registos = 10;
$offset = ($pagina - 1) * $limite_registos;

$sql = "SELECT * FROM marcacao
        INNER JOIN tiposmarcacao on marcacao.idTiposmarcacao = tiposmarcacao.id
        INNER JOIN estadomarcacao on marcacao.idEstadomarcacao = estadomarcacao.id
        INNER JOIN funcionario on marcacao.idFuncionario = funcionario.id 
        WHERE marcacao.idFuncionario = '{$_SESSION["numFuncionario"]}'
        ORDER BY marcacao.idEstadomarcacao";

$result = mysqli_query($conn, $sql);
$total_rows = mysqli_fetch_array($result)[0];
$paginas_total = ceil($total_rows / ($limite_registos));

$sql = "SELECT * FROM marcacao
        INNER JOIN tiposmarcacao on marcacao.idTiposmarcacao = tiposmarcacao.id
        INNER JOIN estadomarcacao on marcacao.idEstadomarcacao = estadomarcacao.id
        INNER JOIN funcionario on marcacao.idFuncionario = funcionario.id 
        WHERE marcacao.idFuncionario = '{$_SESSION["numFuncionario"]}'
        ORDER BY marcacao.idEstadomarcacao LIMIT " . $offset . ", " . $limite_registos . ";";

$resultrequests = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/myIcon.ico" type="image/x-icon">
</head>

<body class="font-inter">
    <div class="h-full w-[88%] relative overflow-hidden lg:ml-60 top-14">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="rounded-lg p-4 sm:p-6 xl:p-8">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-4">Histórico de Pedidos</span>
                <div class="rounded-lg shadow-lg">
                    <div class="h-[450px]">
                        <table class="leading-none text-center pb-0 w-full gap-4 table-auto">
                            <thead class="bg-cyan-600 text-xl font-bold text-white text-opacity-85 w-full h-full">
                                <th class="w-40">Tipo</th>
                            </thead>
                            <tbody class="">
                                <?php
                                while ($row = mysqli_fetch_array($resultrequests)) {
                                ?>
                                    <tr class="odd:bg-white even:bg-gray-100 h-9">
                                        <td class=""><?php echo $row["nomeTiposmarcacao"]; ?></td>
                                        <td class="">
                                            <?php
                                            $datestartformat = date('d/m/Y', strtotime($row["diainicioMarcacao"]));
                                            $dateendformat = date('d/m/Y', strtotime($row["diafimMarcacao"]));
                                            $daterequestformat = date('d/m/Y', strtotime($row["diapedidoMarcacao"]));
                                            $datestart = new DateTime($row["diainicioMarcacao"]);
                                            $dateend = new DateTime($row["diafimMarcacao"]);
                                            $days = $datestart->diff($dateend);
                                            if ($days->days == 1) {
                                                echo $days->days . " Dia";
                                            } elseif ($days->days > 1 || $days->days == 0) {
                                                echo $days->days . " Dias";
                                            }
                                            ?>
                                        </td>
                                        <td class=""><?php echo $datestartformat; ?></td>
                                        <td class=""><?php echo $daterequestformat; ?></td>
                                        <td class="">
                                        </td>
                                        <td>
                                            <button class="items-end opacity-70 hover:opacity-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                <?php    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex mt-2 justify-end">
                    <div class="<?php if ($pagina <= 1) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pagina <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pagina=" . ($pagina - 1);
                                    } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg></a>
                    </div>
                    <div class="font-semibold text-lg"><?php echo $pagina ?></div>
                    <div class="<?php if ($pagina >= $paginas_total) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pagina >= $paginas_total) {
                                        echo '#';
                                    } else {
                                        echo "?pagina=" . ($pagina + 1);
                                    } ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>