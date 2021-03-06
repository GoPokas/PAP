<?php
include "../components/footer.php";

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}
$limite_registos = 10;
$offset = $limite_registos * $pagina - $limite_registos;
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
    <div class="h-full w-[88%] relative overflow-hidden ml-60 top-14">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="rounded-lg p-4 sm:p-6 xl:p-8">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-1 pr-3">Lista de funcionários</span>
                <button class="bg-blue-500 p-2 rounded-full text-white font-bold mb-2">
                    <a href="user_create.php">
                        <div class="p-1 pr-2 flex w-full items-center mx-auto uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>novo funcionário
                        </div>
                    </a>
                </button>
                <div class="bg-white rounded-lg shadow-lg h-[450px]">
                    <div class="flex items-center justify-between">
                    </div>
                    <table class="leading-none text-center pb-0 w-full table-auto">
                        <thead class="bg-cyan-600 text-xl font-bold text-white text-opacity-85 w-full h-full">
                            <th></th>
                            <th>Nome</th>
                            <th>Departamento</th>
                            <th>Cargo</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM funcionario_has_departamento 
                                    INNER JOIN funcionario ON funcionario_has_departamento.funcionario_id = funcionario.idFuncionario
                                    INNER JOIN departamento ON funcionario_has_departamento.departamento_id = departamento.id
                                    INNER JOIN funcionario_has_cargos ON funcionario.idFuncionario = funcionario_has_cargos.funcionario_id
                                    INNER JOIN cargos ON funcionario_has_cargos.cargos_id = cargos.id
                                    INNER JOIN genero on funcionario.idGenero = genero.id
                                    ORDER BY funcionario.nomeFuncionario DESC";

                            $result = mysqli_query($conn, $sql);
                            $total_rows = mysqli_num_rows($result);
                            $paginas_total = ceil($total_rows / $limite_registos);

                            $sql =
                                "SELECT * FROM funcionario_has_departamento
                                    INNER JOIN funcionario ON funcionario_has_departamento.funcionario_id = funcionario.idFuncionario
                                    INNER JOIN departamento ON funcionario_has_departamento.departamento_id = departamento.id
                                    INNER JOIN funcionario_has_cargos ON funcionario.idFuncionario = funcionario_has_cargos.funcionario_id
                                    INNER JOIN cargos ON funcionario_has_cargos.cargos_id = cargos.id
                                    INNER JOIN genero on funcionario.idGenero = genero.id
                                    ORDER BY funcionario.nomeFuncionario DESC";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($result)) { ?>
                                <tr class="odd:bg-white even:bg-gray-100 h-10">
                                    <td class="w-10"><img class="rounded-full shadow-2xl w-10 h-10 object-cover p-1" src="../imgs/pfps/<?= $row["avatarFuncionario"] ?>"></td>
                                    <td class="font-semibold"><?php
                                                                $exp = explode(
                                                                    " ",
                                                                    $row["nomeFuncionario"]
                                                                );
                                                                echo current($exp) . " " . end($exp);
                                                                ?></td>
                                    <td><?= $row["nomeDepartamento"] ?></td>
                                    <td><?= $row["nomeCargo"] ?></td>
                                    <td>
                                        <a class="items-end opacity-70 hover:opacity-100" href="../pages/perfil.php?id=<?php echo $row['idFuncionario']; ?>">
                                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
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