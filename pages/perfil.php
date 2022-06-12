<?php

include "../components/footer.php";

$sql = "SELECT * FROM funcionario
        INNER JOIN user on funcionario.idFuncionario = user.numFuncionario
        WHERE numFuncionario = '{$_SESSION["numFuncionario"]}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if ($_REQUEST["id"] == $_SESSION["numFuncionario"] || $row["group"] == "1") {

    $sql = "SELECT * FROM funcionario_has_departamento 
    INNER JOIN funcionario ON funcionario_has_departamento.funcionario_id = funcionario.idFuncionario
    INNER JOIN departamento ON funcionario_has_departamento.departamento_id = departamento.id
    INNER JOIN funcionario_has_cargos ON funcionario.idFuncionario = funcionario_has_cargos.funcionario_id
    INNER JOIN cargos ON funcionario_has_cargos.cargos_id = cargos.id
    INNER JOIN genero on funcionario.idGenero = genero.id
    WHERE funcionario.idFuncionario = '{$_REQUEST["id"]}'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">
    </head>


    <body class="font-inter">
        <div class="h-full w-[85%] relative ml-60 top-[3rem]">
            <div class="w-[95%] gap-4">
                <div class="w-[12.5rem] float-left">
                    <img class="rounded-full h-[12.5rem] w-[12.5rem] shadow object-cover" alt="Profile picture" src="../imgs/pfps/<?= $row["avatarFuncionario"] ?>">
                    <div class="top-2 py-1 text-center">
                        <span class="font-bold text-2xl"><?php
                                                            $exp = explode(" ", $row["nomeFuncionario"]);
                                                            echo current($exp) . " " . end($exp);
                                                            ?>
                        </span>
                        <span class="text-lg font-semibold"><?php echo $row["nomeCargo"]; ?>
                            em <?php echo $row["nomeDepartamento"]; ?>
                        </span>
                    </div>
                </div>
                <span class="pl-10 text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-4 ">Perfil</span>
                <div class="bg-white rounded-lg pl-4 float-left h-[90%] w-[80%]">
                    <div class="bg-white rounded-lg shadow-lg right-10">
                        <label for="email" class="font-semibold pl-2">Email: </label>
                        <input type="text" name="email" disabled value="<?php echo $row["emailFuncionario"]; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none text-slate-500 m-2 w-96">
                        <label for="email" class="font-semibold pl-2">Data de Nascimento: </label>
                        <input type="text" name="birthdate" disabled value="<?php echo $row["dataNascimentoFuncionario"]; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none text-slate-500 m-2 w-80">
                        <label for="email" class="font-semibold pl-2">Morada: </label>
                        <input type="text" name="email" disabled value="<?php echo $row["moradaFuncionario"]; ?>" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none text-slate-500 m-2 w-80">
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
?>
    <script type="text/javascript">
        window.location.href = '../pages/perfil.php?id=<?php echo $_SESSION["numFuncionario"] ?>';
    </script>
<?php
}
?>