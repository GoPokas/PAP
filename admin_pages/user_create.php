<?php
include "../components/footer.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="h-full w-[88%] relative overflow-hidden lg:ml-60 top-14">
        <div class="w-[95%] grid grid-cols-1 gap-4">
            <div class="p-4">
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-1 pr-3">Criação de funcionário</span>
            </div>
            <div class="bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4 top-2">
                </div>
                <form class="space-y-2 flex flex-col" enctype="multipart/form-data" autocomplete="off">
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/6">
                            <label for="id" class="font-semibold pl-2">Nº Funcionario: </label>
                            <input type="text" id="id" name="id" placeholder="Insira o Nº Funcionario..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/6">
                            <label for="group" class="font-semibold pl-2">Chefe? </label>
                            <select name="group" id="group" id="group" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/5">
                            <label for="name" class="font-semibold pl-2">Nome Completo: </label>
                            <input type="text" id="name" name="name" placeholder="Insira o nome..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/5">
                            <label for="password" class="font-semibold pl-2">Password: </label>
                            <input type="password" id="password" name="password" placeholder="Insira a password..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/5">
                            <label for="email" class="font-semibold pl-2">E-mail: </label>
                            <input type="email" id="email" name="email" placeholder="Insira o e-mail..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/5">
                            <label for="birthdate" class="font-semibold pl-2">Data de Nascimento: </label>
                            <input type="text" id="birthdate" name="birthdate" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                            <script type="text/javascript">
                                $(function() {
                                    $('input[name="birthdate"]').daterangepicker({
                                        singleDatePicker: true,
                                        showDropdowns: true,
                                        autoUpdateInput: false,
                                        opens: "center",
                                        drops: "auto",
                                        locale: {
                                            cancelLabel: 'Cancel'
                                        },
                                    });

                                    $('input[name="birthdate"]').on('apply.daterangepicker', function(ev, picker) {
                                        $(this).val(picker.startDate.format('YYYY/MM/DD'));
                                    });

                                    $('input[name="birthdate"]').on('cancel.daterangepicker', function(ev, picker) {
                                        $(this).val('');
                                    });
                                });
                            </script>
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                        </div>
                    </section>
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-3/6">
                            <label for="address" class="font-semibold pl-2">Morada: </label>
                            <input type="text" id="address" name="address" placeholder="Insira a morada..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="w-1/2 flex flex-row">
                            <div class="flex flex-col w-1/2 mr-2">
                                <label for="postalcode" class="font-semibold pl-2">Código Postal: </label>
                                <input type="text" id="postalcode" name="postalcode" placeholder="Insira o código postal..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/2 ml-2">
                                <label for="district" class="font-semibold pl-2">Distrito: </label>
                                <input type="text" id="district" name="district" placeholder="Insira o distrito..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                        </div>
                    </section>
                    <section class="pb-4 ml-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/2 ml-2">
                            <label for="gender" class="font-semibold pl-2">Gênero: </label>
                            <select name="gender" id="gender" id="gender" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option style="display:none;"></option>
                                <?php
                                $gender = "SELECT * FROM genero";
                                $gender = mysqli_query($conn, $gender);
                                while ($gen = mysqli_fetch_assoc($gender)) {
                                    echo "<option value='" . $gen['id'] . "'>" . $gen['nomeGenero'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/2 ml-2">
                            <label for="docid" class="font-semibold pl-2">Documento de Identificação: </label>
                            <select name="docid" id="docid" id="docid" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option style="display:none;"></option>
                                <?php
                                $documents = "SELECT * FROM docidentificacao";
                                $documents = mysqli_query($conn, $documents);
                                while ($doc = mysqli_fetch_assoc($documents)) {
                                    echo "<option value='" . $doc['id'] . "'>" . $doc['nomeDocidentificacao'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </section>
                    <section class="pb-4 ml-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/2 ml-2">
                            <label for="position" class="font-semibold pl-2">Posição: </label>
                            <select onfocus='this.size=6;' onblur='this.size=1;' onchange='this.size=1;' this.blur(); name="position" id="position" id="position" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option style="display:none;"></option>
                                <?php
                                $position = "SELECT * FROM cargos";
                                $position = mysqli_query($conn, $position);
                                while ($dep = mysqli_fetch_assoc($position)) {
                                    echo "<option value='" . $dep['id'] . "'>" . $dep['nomeCargo'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/2 ml-2">
                            <label for="department" class="font-semibold pl-2">Departamento: </label>
                            <select name="department" id="department" id="department" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option style="display:none;"></option>
                                <?php
                                $department = "SELECT * FROM departamento";
                                $department = mysqli_query($conn, $department);
                                while ($dep = mysqli_fetch_assoc($department)) {
                                    echo "<option value='" . $dep['id'] . "'>" . $dep['nomeDepartamento'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </section>
                    <div class="text-right mr-4">
                        <input type="button" id="submit" value="Criar Funcionário" class="p-2 border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold uppercase hover:border-blue-700 hover:bg-blue-700 active:border-blue-900 active:bg-blue-900">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/imagepreview.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            var id = $('#id').val();
            var group = $('#group').val();
            var name = $('#name').val();
            var password = $('#password').val();
            var email = $('#email').val();
            var birthdate = $('#birthdate').val();
            var address = $('#address').val();
            var postalcode = $('#postalcode').val();
            var district = $('#district').val();
            var gender = $('#gender').val();
            var docid = $('#docid').val();
            var position = $('#position').val();
            var department = $('#department').val();
            $.ajax({
                type: "POST",
                url: "../functions/createemployee.php",
                data: {
                    id: id,
                    group: group,
                    name: name,
                    password: password,
                    email: email,
                    birthdate: birthdate,
                    address: address,
                    postalcode: postalcode,
                    district: district,
                    gender: gender,
                    docid: docid,
                    position: position,
                    department: department
                },
                cache: false,
                success: function(data) {
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
            window.location.href = "../admin_pages/employees.php";
        })
    });
</script>