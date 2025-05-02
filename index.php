<?php
    include("db.php");


?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/cyborg/bootstrap.min.css"
        integrity="sha512-M+Wrv9LTvQe81gFD2ZE3xxPTN5V2n1iLCXsldIxXvfs6tP+6VihBCwCMBkkjkQUZVmEHBsowb9Vqsq1et1teEg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Catalogo de alumnos</h1>
                <span>Kevin Zapata</span>
            </div>
        </div>
        <div class="row">
            <form id="frmBuscar" name="frmBuscar">
                <div class="mb-3">
                    <label class="form-label" for="nombre"> Nombres: </label>
                    <input class="form-control" type="text" id="nombre_buscar" name="nombre_buscar"
                        placeholder="Escribe el nombre del alumno">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success btn-sm" type="button" name="btnBuscar" id="btnBuscar"><i
                            class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    <button class="btn btn-secondary btn-sm" type="button" name="btnNuevo" id="btnNuevo"><i
                            class="fa-solid fa-magnifying-glass"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12" id="tablita" name="tablita">

        </div>
    </div>

    <!--MODAL-->
    <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        id="form-add-alumno">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear un Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nombre" class="control-label">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="apellido_paterno" class="control-label">Apellido Paterno:</label>
                                <input type="text" name="apellido_paterno" id="nombapellido_paternore"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="apellido_materno" class="control-label">Apellido Materno:</label>
                                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onClick="crearAlumno()"><i
                            class="fa-solid fa-floppy-disk"></i> Crear</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i>
                        Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin del Modal -->

    <script type="text/javascript">
    $(function() {
        $("#btnBuscar").on("click", function(event) {
            buscar()
        })

        $("#btnNuevo").on("click", function(event) {
            $("#form-add-alumno").modal("show");
        })
    })

    function buscar() {
        $.ajax({
            type: "POST",
            url: "funciones.php",
            data: "accion=buscar&" + $("#frmBuscar").serialize(),
            cache: false,
            beforeSend: function() {},
            success: function(resultado) {
                $("#tablita").html(resultado);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }

        })
    }

    function crearAlumno() {

        if ($("#nombre").val() == "") {
            alert("Debes especificar el Nombre");
            return false;
        }
        if ($("#apellido_paterno").val() == "") {
            alert("Debes especificar el Apellido Paterno");
            return false;
        }
        if ($("#apellido_materno").val() == "") {
            alert("Debes especificar el Apellido Materno");
            return false;
        }

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "operaciones.php",
            data: "accion=insertar&" + $("#myForm").serialize(),
            cache: false,
            beforeSend: function() {
                $("#form-add-alumno").modal("hide");
            },
            success: function(resultado) {
                if (resultado.status == "OK") {
                    buscar()
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                alert(xhr.status);
                console.log(thrownError);
                alert(thrownError);
            }
        })
    }

    $("#form-add-alumno").on("hidden.bs.modal", function(e) {
        $("#myForm")[0].reset();
    })
    </script>

</body>

</html>