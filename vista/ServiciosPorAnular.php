<?php
$fechafinal = date('Y-m-d');
$fechafinal = strtotime('+2 day', strtotime($fechafinal));
$fechafinal = date('Y-m-d', $fechafinal);
?>


<div class="row">

    <div class="col-md-12 sm-12">
        <div class="card shadow">
            <div class="card-header">
                <H4>Servicios por Anular</H4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-2 sm-12">
                        <label for="validationCustom01">Fecha Inicial</label>
                        <input type="date" class="form-control" id="fechainicial" name="fechainicial" value="<?php echo date('Y') . "-01-01"; ?>"  required>
                    </div>
                    <div class="col-md-2 sm-12">
                        <label for="validationCustom02">Fecha final</label>
                        <input type="date" class="form-control" id="fechafinal" name="fechafinal" value="<?php echo $fechafinal; ?>"  required>
                    </div>
                    <div class="col-md-1 sm-12">
                        <label for="validationCustom02"><br></label>
                        <button 
                            class="btn btn-outline-dark btn-block" type="submit" onclick="javascript:ListarAutorizaciones();">Buscar</button> 
                    </div>
                    <div class="col-md-12 sm-12"><br><small>Filtro por fecha de generación de la autorización y fecha de vigencia de la autorización</small></div>
                </div>
                <br>
                <div id="ListarAutorizaciones"></div>

            </div>
        </div>
    </div>
</div>



<script language="javascript">
    function ListarAutorizaciones() {
        document.getElementById('ListarAutorizaciones').innerHTML = "<center><div class='spinner-border text-success'></center></div>";
        var fechainicial = document.getElementById("fechainicial").value;
        var fechafinal = document.getElementById("fechafinal").value;
        $.post("vista/templates/ListarServiciosPorAnular.php", {fechainicial: fechainicial, fechafinal: fechafinal}, function (data) {
            $("#ListarAutorizaciones").html(data);
        });
    }


    function tabla_autorizaciones() {
        $("#tabla_autorizaciones").toggle("blind");
    }


    $(document).ready(function () {
        ListarAutorizaciones();
    });
</script>


<?php
if (isset($_GET["y"])) {
    switch ($_GET["y"]) {
        case '001':
            ?>
            <script type="text/javascript">
                document.getElementById("var_NI").value = '<?php echo $_GET['NI']; ?>';
                document.getElementById("var_TI").value = '<?php echo $_GET['TI']; ?>';
                ListarAutorizaciones();
            </script>
            <?php
            break;
    }
}
?>
