<?php
include "../components/footer.php";

$sql = "SELECT * FROM funcionario_has_departamento 
    INNER JOIN funcionario ON funcionario_has_departamento.funcionario_id = funcionario.id 
    INNER JOIN departamento ON funcionario_has_departamento.departamento_id = departamento.id
    INNER JOIN funcionario_has_cargos ON funcionario.id = funcionario_has_cargos.funcionario_id
    INNER JOIN cargos ON funcionario_has_cargos.cargos_id = cargos.id
    INNER JOIN genero on funcionario.idGenero = genero.id 
    WHERE funcionario.id = '{$_SESSION["numFuncionario"]}'";

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
            <!-- TODO: New profile
            -->
            <div class="w-[12.5rem] float-left">
                <img class="rounded-full h-[12.5rem] w-[12.5rem] shadow" alt="Profile picture" src="../imgs/pfps/<?= $row[
                  "avatarFuncionario"
                ] ?>">
                <div class="top-2 py-1 text-center">
                    <span class="font-bold text-2xl"><?php
                    $exp = explode(" ", $row["nomeFuncionario"]);
                    echo current($exp) . " " . end($exp);
                    ?>
                    </span>
                    <span class="text-lg"><?php echo $row[
                      "nomeDepartamento"
                    ]; ?>
                    </span>
                </div>
            </div>
            <div class="bg-white rounded-lg pl-4 float-left h-[90%] w-[80%]">
                <div class="bg-white rounded-lg shadow-lg right-10">
                    <button class="pd-10"><a href="edit_perfil.php">Editar</a></button>

                </div>
            </div>
        </div>
    </div>
</body>

</html>