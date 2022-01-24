<?php
include "../components/footer.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/myIcon.ico" type="image/x-icon">
</head>

<body class="font-inter">
    <div class="h-full w-[80%] relative overflow-hidden lg:ml-60 top-10">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="bg-white rounded-lg p-4 sm:p-6 xl:p-8">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-4">Histórico de Pedidos</span>
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="pb-2">
                        <table class="leading-none text-center pb-0 w-full gap-4 table-auto">
                            <thead class="bg-cyan-600 text-xl font-bold text-white text-opacity-85 w-full h-full">
                                <th>Tipo</th>
                                <th>Dias</th>
                                <th>Início</th>
                                <th>Estado</th>
                                <th></th>
                            </thead>
                            <tbody class="">
                                <tr class="odd:bg-white even:bg-gray-100 h-8">
                                    <td class="">Férias
                                    </td>
                                    <td class="">4 dias</td>
                                    <td class="">Dentro de 4 dias</td>
                                    <td class="">
                                        <div class="bg-red-300 rounded-xl text-red-500 font-bold p-1">Recusado</div>
                                    </td>
                                    <td>
                                        <button class="items-end opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>