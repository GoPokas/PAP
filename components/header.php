<?php
require "../user/config.php";

$sql = "SELECT * FROM funcionario WHERE id = '{$_SESSION["numFuncionario"]}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="font-inter overflow-hidden z-50">
    <div class="bg-white float-right">
        <div class="ml-auto container flex w-full items-end justify-end">
            <div class="flex items-center flex-row justify-end">
                <span class="font-semibold"><?php echo $row["nomeFuncionario"]; ?> </span>
                <div class="group inline-block float-none p-4">
                    <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" type="button" class="z-50">
                        <img class="rounded-full shadow-2xl w-10 h-10 object-cover" alt="Profile picture" src="../imgs/pfps/<?= $row["avatarFuncionario"] ?>">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownInformation" class="hidden z-10 w-50 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                        <div class="py-3 px-4 text-gray-900">
                            <span class="block text-sm font-semibold"><?php echo $row["emailFuncionario"]; ?></span>
                        </div>
                        <ul class="py-1" aria-labelledby="dropdownInformationButton">
                            <li>
                                <a href="../pages/perfil.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Perfil</a>
                            </li>
                            <div>
                                <a href="../user/logout.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

</html>