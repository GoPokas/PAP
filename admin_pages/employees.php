<?php
include "../components/footer.php";

$sql = "SELECT * FROM funcionario";

$result = mysqli_query($conn, $sql);
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
    <div class="h-full w-[80%] relative overflow-hidden lg:ml-60 top-10">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="bg-white rounded-lg p-4 sm:p-6 xl:p-8">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-4">Lista de funcionários</span>
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between mb-4 top-2">
                    </div>
                    <table class="leading-none text-center pb-2 w-full table-auto">
                        <thead class="bg-cyan-600 text-xl font-bold text-white text-opacity-85 w-full h-full">
                            <th></th>
                            <th>Nome</th>
                            <th>Departamento</th>
                            <th>Posição</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php while (
                              $row = mysqli_fetch_array($result)
                            ) { ?>
                                <tr class="odd:bg-white even:bg-gray-100 h-8">
                                    <td class="py-1.5 pl-2"><img class="rounded-full shadow-2xl w-10 h-10 object-cover" src="../imgs/pfps/<?= $row[
                                      "avatarFuncionario"
                                    ] ?>"></td>
                                    <td class="font-semibold"><?= $row[
                                      "nomeFuncionario"
                                    ] ?></td>
                                    <td><?= $row["nomeFuncionario"] ?></td>
                                    <td><?= $row["nomeFuncionario"] ?></td>
                                    <td>
                                        <button class="items-end opacity-70">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>