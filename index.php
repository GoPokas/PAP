<?php
// include "./user/loggedin_verify.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaviFy</title>
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <!-- component -->
    <div class="flex items-center justify-center h-screen">
        <div class="bg-gray-100 flex flex-col w-80 border border-gray-100 rounded-lg px-8 py-10 shadow">
            <div class="text-white">
            </div>
            <form class="flex flex-col space-y-8" action="user/login.php" method="POST">
                <img src="imgs/logo.png" alt="Company Logo" class="w-20 h-20 mx-auto">
                <input type="text" name="numFuncionario" autofocus placeholder="Nº Funcionário" required class="border rounded-lg py-3 px-3 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-300 focus:bg-gray-300 focus:outline-none">
                <input type="password" name="password" placeholder="Password" required class="border rounded-lg py-3 px-3 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-300 focus:bg-gray-300 focus:outline-none">
                <button type="submit" class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold uppercase hover:border-blue-700 hover:bg-blue-700 active:border-blue-900 active:bg-blue-900">login</button>
            </form>
        </div>
        <?php if (isset($_GET["error"])) { ?>
            <div class="absolute bottom-[8rem] w-full rounded-lg border-l-[6px] border-[#F87171] bg-[#F87171] bg-opacity-[15%] px-7 py-8 shadow-md md:p-9 max-w-[500px]">
                <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#F87171]">
                    <svg
                    width="13"
                    height="13"
                    viewBox="0 0 13 13"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z"
                            fill="#ffffff"
                            stroke="#ffffff"></path>
                    </svg>
                </div>
                <div class="flex">
                    <h5 class="mb-3 text-base font-semibold text-[#B45454] text-rig">
                        O seu Nº de funcionário ou password estão incorretos.
                    </h5>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>