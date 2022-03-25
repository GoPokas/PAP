<?php
include "../components/footer.php";


if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}
$limite_registos = 10;
$offset = ($pagina - 1) * $limite_registos;

$sql = "SELECT *, marcacao.id as id_marcacao from marcacao
        INNER JOIN tiposmarcacao on marcacao.idTiposmarcacao = tiposmarcacao.id
        INNER JOIN estadomarcacao on marcacao.idEstadomarcacao = estadomarcacao.id
        INNER JOIN funcionario on marcacao.idFuncionario = funcionario.id
        WHERE marcacao.idEstadomarcacao = 0
        ORDER BY marcacao.idEstadomarcacao LIMIT " . $offset . ", " . $limite_registos . ";";

$result = mysqli_query($conn, $sql);
$total_rows = mysqli_fetch_array($result)[0];
var_dump($total_rows);
$paginas_total = ceil($total_rows / ($limite_registos));
var_dump($paginas_total);

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
    <div class="h-full w-[80%] relative overflow-hidden lg:ml-60 top-14">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="rounded-lg p-4 sm:p-6 xl:p-8">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900">Aprovações</span>
                <div class="rounded-lg shadow-lg pt-2">
                    <div>
                        <table class="leading-none text-center pb-0 w-full gap-4 table-auto">
                            <thead class="bg-cyan-600 text-xl font-bold text-white text-opacity-85 w-full h-full">
                                <th class="w-10"></th>
                                <th class="w-40">Funcionário</th>
                                <th class="w-40">Tipo</th>
                                <th class="w-40">Quantidade Dias</th>
                                <th class="w-40">Início</th>
                                <th class="w-40">Dia Pedido</th>
                                <th class="w-10"></th>
                            </thead>
                            <tbody class="">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <?php var_dump($row); ?>
                                    <tr class="odd:bg-white even:bg-gray-100 h-9">
                                        <td class="w-10"><img class="rounded-full shadow-2xl w-10 h-10 object-cover p-1" alt="Profile picture" src="../imgs/pfps/<?= $row["avatarFuncionario"] ?>"></td>
                                        <td class="font-bold"><?php echo $row["nomeFuncionario"]; ?></td>
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

                                        <td>
                                            <form method="POST">
                                                <?php echo $row['id'] ?>
                                                <button type="submit" class="items-end opacity-70 hover:opacity-100" name="approve" value="<?php $row['id'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#00FF00">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button type="submit" class="items-end opacity-70 hover:opacity-100" name="disapprove" value="<?php $row['id'] ?>">
                                                    <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#FF0000">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <?php
                                    if (isset($_POST['approve'])) {
                                        $sql = "UPDATE marcacao SET idEstadomarcacao = 1 WHERE id = " . $_POST["approve"] . "";
                                        var_dump($sql);
                                        die;
                                        if (mysqli_query($conn, $sql)) {
                                            echo "<script>alert('Marcação aprovada com sucesso!');</script>";
                                            unset($_POST['approve']);
                                        } else {
                                            echo "<script>alert('Erro ao aprovar marcação!');</script>";
                                            unset($_POST['approve']);
                                        }
                                    }
                                    if (isset($_POST['disapprove'])) {
                                        var_dump($sql);
                                        die;
                                        $sql = "UPDATE marcacao SET idEstadomarcacao = 2 WHERE id = " . $_POST["disapprove"] . "";
                                        if (mysqli_query($conn, $sql)) {
                                            echo "<script>alert('Marcação reprovada com sucesso!');</script>";
                                            unset($_POST['disapprove']);
                                        } else {
                                            echo "<script>alert('Erro ao reprovar marcação!');</script>";
                                            unset($_POST['disapprove']);
                                        }
                                    }
                                    ?>
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
<script>
    $("button").click(function() {
        var fired_button = $(this).val();
    });
</script>

</html>