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

<body>
    <div class="h-full w-[88%] relative overflow-hidden lg:ml-60 top-14">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="p-4">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-1 pr-3">Configurações</span>
            </div>
            <div class="bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4 top-2">
                </div>
                <form class="space-y-2 flex flex-col" enctype="multipart/form-data" autocomplete="off">
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/2">
                            <label for="leavetype" class="font-semibold pl-2">Adicionar um novo tipo de marcação:</label>
                            <input type="text" name="leavetype" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                        </div>
                        <button type="submit" class="justify-center opacity-70 hover:opacity-100" name="leavetype">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#00FF00">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="flex flex-col w-1/2">
                            <label for="docid" class="font-semibold pl-2">Adicionar um novo tipo de documento de Identificação:</label>
                            <input type="text" name="docid" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                        </div>
                        <button type="submit" class="justify-center opacity-70 hover:opacity-100" name="docid">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#00FF00">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </section>
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/2">
                            <label for="department" class="font-semibold pl-2">Adicionar um novo departamento:</label>
                            <input type="text" name="department" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                        </div>
                        <button type="submit" class="justify-center opacity-70 hover:opacity-100" name="department">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#00FF00">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="flex flex-col w-1/2">
                            <label for="position" class="font-semibold pl-2">Adicionar um novo cargo:</label>
                            <input type="text" name="position" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                        </div>
                        <button type="submit" class="justify-center opacity-70 hover:opacity-100" name="position">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#00FF00">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = form.serialize();
            $.ajax({
                type: 'POST',
                url: '../functions/adddata.php',
                data: formData,
                success: function(data) {
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });
    });
</script>

</html>