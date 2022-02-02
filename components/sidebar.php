<?php
require "../user/config.php";

$sql = "SELECT * FROM user WHERE numFuncionario = '{$_SESSION["numFuncionario"]}'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-inter">
    <!-- component -->
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
    <div class="md:flex flex-col md:flex-row md:min-h-screen h-full absolute z-30">
        <div class="flex flex-col w-full md:w-48 text-gray-700 bg-sky-800 flex-shrink-0">
            <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                <a href="dashboard.php" class="rounded-lg focus:outline-none focus:shadow-outline"><img src="../imgs/logo.png" alt="Logo" class="w-1/2 ml-auto mr-auto block"></a>
            </div>
            <nav class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto font-sans flex-row">
                <a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg focus:text-gray-900 hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../pages/dashboard.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>Dashboard</a>
                <a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg focus:text-gray-900 hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../pages/leaves.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>Marcações</a>
                <a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg focus:text-gray-900 hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../pages/requests.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>Meus Pedidos</a><?php if ($row["group"] == 1) {
                      echo '<a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../admin_pages/requests_calendar.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[23px] w-[23px]" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <p class="-ml-[15px]">Calendário Marcações</p>
                    </a>
                    <a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg focus:text-gray-900 hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../admin_pages/employees.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>Funcionários</a>
                    <a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg focus:text-gray-900 hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../admin_pages/aproval.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>Aprovações</a>
                    <a class="flex items-center block px-4 py-2 mt-2 text-sm font-bold text-blue-300 bg-transparent rounded-lg focus:text-gray-900 hover:text-gray-900 text-blue-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-center" href="../admin_pages/settings.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>Configurações</a>
                    </a>';
                    } ?>
            </nav>
        </div>
    </div>
</body>

</html>