<?php
include "../components/footer.php";

$request_id = $_GET['request'];

$requestsql = "SELECT * FROM marcacao WHERE id = '$request_id'";
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
                                <input type="text" name="id" disabled value="<?php echo $requestrow['id']; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/4">
                                <label for="days" class="font-semibold pl-2">Quantidade de dias: </label>
                                <input type="text" name="days" disabled value="<?php if ($days->days == 1) {
                                                                                    echo $days->days . " Dia";
                                                                                } elseif ($days->days > 1 || $days->days == 0) {
                                                                                    echo $days->days . " Dias";
                                                                                }
                                                                                ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/4">
                                <label for="datestart" class="font-semibold pl-2">Data de início da ausência: </label>
                                <input type="text" name="datestart" disabled value="<?php echo $datestartformat; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/4">
                                <label for="dateend" class="font-semibold pl-2">Data de início da ausência: </label>
                                <input type="text" name="dateend" disabled value="<?php echo $dateendformat; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                                <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
                                <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                            </div>
                        </section>
                        <section class="pb-4 mx-4 flex flex-row space-x-4">
                            <div class="flex flex-col w-1/3">
                                <label for="address" class="font-semibold">Morada: </label>
                                <input type="text" name="address" placeholder="Insira a morada..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/3">
                                <label for="postalcode" class="font-semibold">Código Postal: </label>
                                <input type="text" name="postalcode" placeholder="Insira o código postal..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/3">
                                <label for="district" class="font-semibold">Distrito: </label>
                                <input type="text" name="district" placeholder="Insira o distrito..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                        </section>
                        <section class="pb-4 ml-2 flex flex-row space-x-4">
                            <div class="flex flex-col w-1/3 ml-2">
                                <label for="gender" class="font-semibold pl-2">Gênero: </label>
                                <select name="gender" id="gender" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                    <option style="display:none;"></option>
                                </select>
                            </div>
                            <div class="flex flex-col w-1/3 ml-2">
                                <label for="docid" class="font-semibold pl-2">Documento de Identificação: </label>
                                <select name="docid" id="docid" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                    <option style="display:none;"></option>
                                </select>
                            </div>
                            <div class="flex flex-col w-1/3 pr-4">
                                <label for="" class="font-semibold pl-2">Upload de Documento: </label>
                                <input type="file" name="doctype" id="doctype" class="w-[0.1px] h-[0.1px] opacity-0"></input>
                                <label for="doctype" class="cursor-pointer py-1 px-2 text-white font-semibold bg-blue-500 hover:bg-blue-600 rounded ">Escolha o ficheiro...</label>
                            </div>
                        </section>
                        <section class="pb-4 ml-2 flex flex-row space-x-4">
                            <div class="flex flex-col w-1/3 ml-2">
                                <label for="position" class="font-semibold pl-2">Cargo: </label>
                                <select name="position" id="position" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                    <option style="display:none;"></option>
                                </select>
                            </div>
                            <div class="flex flex-col w-1/3 ml-2">
                                <label for="department" class="font-semibold pl-2">Departamento: </label>
                                <select name="department" id="department" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                    <option style="display:none;"></option>
                                </select>
                            </div>
                            <div class="flex flex-col w-1/3 pr-4">
                                <label for="department" class="font-semibold pl-2">Departamento: </label>
                                <select name="department" id="department" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                    <option style="display:none;"></option>
                                </select>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>