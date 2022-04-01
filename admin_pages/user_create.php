<?php
include "../components/footer.php";

$sql = "SELECT * FROM funcionario";
$result = mysqli_query($conn, $sql);
$count = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $docid = $_POST['docid'];
    $position = $_POST['position'];
    $department = $_POST['department'];

    $employee = "INSERT INTO funcionario(nomeFuncionario, moradaFuncionario, dataNascimentoFuncionario, emailFuncionario, idCodigoPostal, idDocIdentificacao, idGenero)
                 VALUES ('$name', '$address', '$birthdate', '$email', 1, 1, 1)";

    mysqli_query($conn, $employee);
    header("Location: ../pages/dashboard.php");
} else {
}
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
                <form class="space-y-2 flex flex-col" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <section class="pb-4 ml-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-full">
                            <img src="../imgs/pfps/default-avatar.png" alt="Profile Picture" id="profileDisplay" onclick="triggerClick()" class="w-40 h-40 rounded-full shadow mx-auto hover:brightness-75 cursor-pointer">
                            <input type="file" name="profilePicture" onchange="displayImage(this)" id="profilePicture" class="hidden"></input>
                        </div>
                    </section>
                    <section class="pb-4 mx-4 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/4">
                            <label for="name" class="font-semibold pl-2">Nome Completo: </label>
                            <input type="text" name="name" placeholder="Insira o nome..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/4">
                            <label for="password" class="font-semibold pl-2">Password: </label>
                            <input type="password" name="password" placeholder="Insira a password..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/4">
                            <label for="email" class="font-semibold pl-2">E-mail: </label>
                            <input type="email" name="email" placeholder="Insira o e-mail..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-1/4">
                            <label for="birthdate" class="font-semibold pl-2">Data de Nascimento: </label>
                            <input type="text" name="birthdate" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
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
                                        $(this).val(picker.startDate.format('DD/MM/YYYY'));
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
                            <input type="text" name="address" placeholder="Insira a morada..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                        </div>
                        <div class="w-1/2 flex flex-row">
                            <div class="flex flex-col w-1/2 mr-2">
                                <label for="postalcode" class="font-semibold pl-2">Código Postal: </label>
                                <input type="text" name="postalcode" placeholder="Insira o código postal..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                            <div class="flex flex-col w-1/2 ml-2">
                                <label for="district" class="font-semibold pl-2">Distrito: </label>
                                <input type="text" name="district" placeholder="Insira o distrito..." required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                            </div>
                        </div>
                    </section>
                    <section class="pb-4 ml-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/3 ml-2">
                            <label for="gender" class="font-semibold pl-2">Gênero: </label>
                            <select name="gender" id="gender" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
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
                        <div class="flex flex-col w-1/3 ml-2">
                            <label for="docid" class="font-semibold pl-2">Documento de Identificação: </label>
                            <select name="docid" id="docid" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
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
                        <div class="flex flex-col w-1/3 pr-4">
                            <label for="" class="font-semibold pl-2">Upload de Documento: </label>
                            <input type="file" name="doctype" id="doctype" class="w-[0.1px] h-[0.1px] opacity-0"></input>
                            <label for="doctype" class="cursor-pointer py-1 px-2 text-white font-semibold bg-blue-500 hover:bg-blue-600 rounded ">Escolha o ficheiro...</label>
                        </div>
                    </section>
                    <section class="pb-4 ml-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/3 ml-2">
                            <label for="position" class="font-semibold pl-2">Cargo: </label>
                            <select name="position" id="position" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option style="display:none;"></option>
                                <?php
                                $position = "SELECT * FROM cargos";
                                $position = mysqli_query($conn, $position);
                                while ($pos = mysqli_fetch_assoc($position)) {
                                    echo "<option value='" . $pos['id'] . "'>" . $pos['nomeCargo'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/3 ml-2">
                            <label for="department" class="font-semibold pl-2">Departamento: </label>
                            <select name="department" id="department" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
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
                        <div class="flex flex-col w-1/3 pr-4">
                            <label for="department" class="font-semibold pl-2">Departamento: </label>
                            <select name="department" id="department" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
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
                        <button type="submit" name="submit" class="p-2 border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold uppercase hover:border-blue-700 hover:bg-blue-700 active:border-blue-900 active:bg-blue-900">criar funcionário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/imagepreview.js"></script>
</body>