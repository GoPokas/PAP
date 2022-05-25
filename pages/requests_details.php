<?php
include "../components/footer.php";

$request_id = $_GET['request'];

$requestsql = "SELECT * FROM marcacao
                INNER JOIN funcionario ON marcacao.idFuncionario = funcionario.id
                INNER JOIN tiposmarcacao ON marcacao.idTiposmarcacao = tiposmarcacao.id
                INNER JOIN estadomarcacao ON marcacao.idEstadomarcacao = estadomarcacao.id
                WHERE marcacao.id = '$request_id'";
$requestresult = mysqli_query($conn, $requestsql);
$requestrow = mysqli_fetch_array($requestresult);

$datestartformat = date('d/m/Y', strtotime($requestrow["diainicioMarcacao"]));
$dateendformat = date('d/m/Y', strtotime($requestrow["diafimMarcacao"]));
$daterequestformat = date('d/m/Y', strtotime($requestrow["diapedidoMarcacao"]));
$datestart = new DateTime($requestrow["diainicioMarcacao"]);
$dateend = new DateTime($requestrow["diafimMarcacao"]);
$days = $datestart->diff($dateend);

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
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-4">Detalhes do pedido</span>
                <div class="rounded-lg shadow-lg">
                    <div class="h-[450px]">
                        <section class="pb-4 mx-4 flex flex-row space-x-4">
                            <div class="flex flex-col w-1/4">
                                <label for="id" class="font-semibold pl-2">ID do Pedido: </label>
                                <input type="text" name="id" disabled value="<?php echo $request_id; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/4">
                                <label for="days" class="font-semibold pl-2">Quantidade de dias: </label>
                                <input type="text" name="days" disabled value="<?php if ($days->days == 1) {
                                                                                    echo $days->days . " Dia";
                                                                                } elseif ($days->days > 1 || $days->days == 0) {
                                                                                    echo $days->days . " Dias";
                                                                                }
                                                                                ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none text-slate-500">
                            </div>
                            <div class="flex flex-col w-1/4">
                                <label for="datestart" class="font-semibold pl-2">Data de início da ausência: </label>
                                <input type="text" name="datestart" disabled value="<?php echo $datestartformat; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none text-slate-500">
                            </div>
                            <div class="flex flex-col w-1/4">
                                <label for="dateend" class="font-semibold pl-2">Data de início da ausência: </label>
                                <input type="text" name="dateend" disabled value="<?php echo $dateendformat; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                            </div>
                        </section>
                        <section class="pb-4 mx-4 flex flex-row space-x-4">
                            <div class="flex flex-col w-1/2">
                                <label for="employee" class="font-semibold">Funcionário: </label>
                                <input type="text" name="employee" disabled value="<?php echo $requestrow["nomeFuncionario"] ?>" class="font-bold border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="state" class="font-semibold pl-2">Estado do pedido: </label>
                                <input type="text" name="state" disabled value="<?php echo $requestrow["nomeEstadomarcacao"]; ?>" class="<?php
                                                                                                                                            if ($requestrow["idEstadomarcacao"] == 0) {
                                                                                                                                            ?>
                                                                                                                                        bg-yellow-300 text-yellow-600 font-bold rounded-lg py-1 px-2 focus:outline-none

                                                                                                                                        <?php
                                                                                                                                            } elseif ($requestrow["idEstadomarcacao"] == 1) {
                                                                                                                                        ?>
                                                                                                                                        bg-green-300 text-green-500 font-bold rounded-lg py-1 px-2 focus:outline-none

                                                                                                                                        <?php
                                                                                                                                            } elseif ($requestrow["idEstadomarcacao"] == 2) {
                                                                                                                                        ?>
                                                                                                                                        bg-red-300 text-red-500 font-bold rounded-lg py-1 px-2 focus:outline-none

                                <?php } ?>">
                            </div>
                        </section>
                        <section class="pb-4 mx-4 flex flex-row space-x-4">
                            <div class="flex flex-col w-full">
                                <label for="obs" class="font-semibold">Obs: </label>
                                <textarea type="text" name="obs" disabled class="resize-none h-40 border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none"><?php echo $requestrow["obs"] ?></textarea>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>