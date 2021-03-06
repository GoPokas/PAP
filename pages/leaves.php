<?php
include "../components/footer.php";

$id = $_SESSION["numFuncionario"];
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
                <span class="text-2xl sm:text-4xl leading-none font-bold text-gray-900 pb-1 pr-3">Marcações</span>
            </div>
            <div class="bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4 top-2">
                </div>
                <form class="space-y-2 flex flex-col" action="../functions/leaverequest.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <section class="pb-4 m-2 flex flex-row space-x-4">
                        <div class="flex flex-col w-1/2">
                            <label for="leavetype" class="font-semibold pl-2">Tipo de marcação:</label>
                            <select name="leavetype" id="leavetype" required class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none">
                                <option style="display:none;"></option>
                                <?php
                                $leaves = "SELECT * FROM tiposmarcacao";
                                $leaves = mysqli_query($conn, $leaves);
                                while ($leav = mysqli_fetch_assoc($leaves)) {
                                    echo "<option value='" . $leav['id'] . "'>" . $leav['nomeTiposmarcacao'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <label for="requestdate" class="font-semibold pl-2">Começo e fim da marcação:</label>
                            <input type="text" name="requestdate" value="" class="border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none" />
                            <script type="text/javascript">
                                $(function() {
                                    $('input[name="requestdate"]').daterangepicker({
                                        showDropdowns: true,
                                        autoUpdateInput: false,
                                        opens: "center",
                                        drops: "auto",
                                        locale: {
                                            cancelLabel: 'Cancel'
                                        },
                                    });
                                    $('input[name="requestdate"]').on('apply.daterangepicker', function(ev, picker) {
                                        $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
                                    });

                                    $('input[name="requestdate"]').on('cancel.daterangepicker', function(ev, picker) {
                                        $(this).val('');
                                    });
                                });
                            </script>
                        </div>
                    </section>
                    <section class="pb-4 m-2 flex flex-row space-x-4">
                        <label for="obs" class="font-semibold pl-2">Obs:</label>
                        <textarea name="obs" id="obs" class="resize-none w-full h-32 border rounded-lg py-1 px-2 bg-gray-200 border-gray-200 placeholder-gray-500 focus:border-gray-400 focus:bg-gray-300 focus:outline-none"></textarea>
                    </section>
                    <div class="text-right mr-4">
                        <input type="button" id="submit" value="Submeter Pedido" class="p-2 border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold uppercase hover:border-blue-700 hover:bg-blue-700 active:border-blue-900 active:bg-blue-900">
                    </div>
                </form>
            </div>
            <?php $msg->display(); ?>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</body>


<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            var requestdateuncut = $('input[name="requestdate"]').val();
            var requestdate = requestdateuncut.split(" - ");
            var leavetype = $('#leavetype').val();
            var obs = $('#obs').val();
            var id = <?php echo $id; ?>;
            $.ajax({
                type: "POST",
                url: "../functions/createleave.php",
                data: {
                    id: id,
                    startingdate: requestdate[0],
                    endingdate: requestdate[1],
                    leavetype: leavetype,
                    obs: obs
                },
                cache: false,
                success: function(data) {
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
            window.location.href = "../pages/requests.php";
        })
    });
</script>