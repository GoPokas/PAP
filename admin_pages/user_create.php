<?php
include "../components/footer.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="h-full w-[80%] relative overflow-hidden lg:ml-60 top-14">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="p-8">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-1 pr-3">Criação de funcionário</span>
            </div>
            <div class="bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4 top-2">
                </div>
                <form class="space-y-2 flex flex-col" action="user_create.php" method="POST" enctype="multipart/form-data">
                    <section class="pb-4 ml-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-full">
                            <img src="../imgs/pfps/default-avatar.png" alt="Profile Picture" id="profileDisplay" onclick="triggerClick()" class="w-40 h-40 rounded-full shadow mx-auto hover:brightness-75 cursor-pointer">
                            <input type="file" name="profilePicture" onchange="displayImage(this)" id="profilePicture" class="hidden"></input>
                        </div>
                    </section>
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-2/4">
                            <label for="name" class="font-semibold pl-2">Nome Completo: </label>
                            <input type="text" name="name" placeholder="Insira o nome..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-2/4">
                            <label for="email" class="font-semibold pl-2">E-mail: </label>
                            <input type="email" name="email" placeholder="Insira o e-mail..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                    </section>
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-3/6">
                            <label for="address" class="font-semibold pl-2">Morada: </label>
                            <input type="text" name="address" placeholder="Insira a morada..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="w-1/2 flex flex-row">
                            <div class="flex flex-col w-1/2 mr-2">
                                <label for="postalCode" class="font-semibold pl-2">Código Postal: </label>
                                <input type="text" name="postalCode" placeholder="Insira o código postal..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/2 mx-2">
                                <label for="district" class="font-semibold pl-2">Distrito: </label>
                                <input type="text" name="district" placeholder="Insira o distrito..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                        </div>
                    </section>
                    <div class="text-right mr-4">
                        <button type="submit" class="p-2 border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold uppercase hover:border-blue-700 hover:bg-blue-700 active:border-blue-900 active:bg-blue-900">criar funcionário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="../js/imagepreview.js"></script>

</html>