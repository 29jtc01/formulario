<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Validacion</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cargando.css">
    <link rel="stylesheet" type="text/css" href="css/maquinawrite.css">
    <link rel="stylesheet" type="text/css" href="css/img.css">
    <link rel="stylesheet" type="text/css" href="css/Spaginacion.css">

    <style>
    table tr th {
        background: rgba(0, 0, 0, .6);
        color: #fff;
    }

    tbody tr {
        font-size: 12px !important;
        0
    }

    h3 {
        color: crimson;
        margin-top: 100px;
    }

    a:hover {
        cursor: pointer;
        color: #333 !important;
    }

    em {
        font-size: 15px;
    }
    </style>

</head>

<body>

    <div class="cargando">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top"
        style="background-color: #563d7c !important;">
        <ul class="navbar-nav mr-auto collapse navbar-collapse">
            <li class="nav-item active">
                <a href="index.php">
                    <p>hola perros</p>

                </a>
            </li>
        </ul>

    </nav>



    <div class="container mt-5 p-5">
        <span id="respuesta"></span>




        <div class="row text-center" style="background-color: #cecece">
            <div class="col-md-6">
                <strong>Registrar Nuevo Cliente</strong>

            </div>


        </div>
        <div class="col-md-6">
            <strong>Lista de Clientes </strong>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <div class="row clearfix">

                    <!----- formulario --->


                    <div class="col-sm-5">
                        <form name="formCliente" id="formCliente" action="" method="POST">
                            <div class="row">

                                <div class="col-md-12 mt-2">
                                    <label for="name" class="form-label">Cédula del Cliente <em>(RUT
                                            -DIN)</em></label>
                                    <input type="number" class="form-control" name="cedula" id="cedula" required='true'
                                        autofocus>

                                </div>

                                <div class="col-md-12">
                                    <label for="name" class="form-label">Nombre del Cliente</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" required='true'
                                        autofocus>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="correo" id="correo" required='true'
                                        autofocus>
                                    <div id="respuestaE"> </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="number" class="form-control" name="celular" id="celular"
                                        required='true'>
                                </div>

                            </div>
                            <div class="row justify-content-start text-center mt-5">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block" value="Registrar Nuevo Cliente"
                                        id="btnEnviar">
                                        <i class="zmdi zmdi-spinner zmdi-hc-lg zmdi-hc-spin"></i>
                                        Registrar Nuevo Cliente
                                    </button>
                                </div>
                            </div>
                        </form>
                        <img class="imagenes" id="img01" src="img\arger.png"
                            style="width:100px; height:100px; cursor:pointer;">
                        <img class="imagenes" id="img02" src="img\arger.png"
                            style="width:100px; height:100px; cursor:pointer;">
                        <img class="imagenes" id="img03" src="img\arger.png"
                            style="width:100px; height:100px; cursor:pointer;">
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img">
                            <div id="caption"></div>
                        </div>
                        <!--fin form -->


                        <?php include('listClientes.php')?>
                        
                                    

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script>
    var img = document.getElementsByClassName("imagenes");
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("img");
    var captionText = document.getElementById("caption");
    for (var i = 0; i < img.length; i++) {
        img[i].onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    }
    </script>

    <script type="text/javascript">
    $(document).ready(function() {


        //Apenas cargue el La pagina cargara la lista de Clientes.
        $("#listClientes").load("listClientes.php"); //load es una funcion de Jquery
        $(".zmdi-hc-spin").hide(); //Oculto la animacion del boton enviar

        //Efecto Pre-Carga
        $(window).load(function() {
            $(".cargando").fadeOut(500);
        });


        //Codigo para limitar la cantidad maxima que tendra dicho Input
        $('input#cedula').keypress(function(event) {
            if (event.which < 48 || event.which > 57 || this.value.length === 5) {
                return false;
            }
        });


        //Validar la cantidad maxima en el campo celular
        $('input#celular').keypress(function(event) {
            if (event.which < 48 || event.which > 57 || this.value.length === 10) {
                return false;
            }
        });


        //Validando si existe la Cedula en BD antes de enviar el Form
        $("#cedula").on("keyup", function() {
            var cedula = $("#cedula").val();
            var text = document.getElementById("cedula").value.trim();
            if (cedula.length >= 3) {
                var dataString = 'cedula=' + cedula;
                $.ajax({
                    url: 'verificarCedula.php',
                    type: "GET",
                    data: dataString,
                    dataType: "JSON",
                    success: function(datos) {

                        if (datos.success == 1) {
                            $("#respuesta").html(datos.message);
                            $("input").attr('disabled', true);
                            $("input#cedula").attr('disabled', false);
                            $("#btnEnviar").attr('disabled', true);
                        } else {
                            $("#respuesta").html(datos.message);
                            $("input").attr('disabled', false);
                            $("#btnEnviar").attr('disabled', false);
                        }
                    }
                });
            }
        });


        $("#correo").on("keyup", function() {
            var correo = this.value;
            var longitudCorreo = correo.length;
            var text = document.getElementById("correo").value.trim();
            if (longitudCorreo >= 3) {
                var dataString = 'correo=' + correo;

                $.ajax({
                    url: 'verificarEmail.php',
                    type: "GET",
                    data: dataString,
                    dataType: "JSON",

                    success: function(datos) {
                        if (datos.success === 1) {
                            $("#respuestaE").html(datos.message);
                            $("input").prop('disabled', true);
                            $("input#correo").prop('disabled', false);
                            $("#btnEnviar").prop('disabled', true);
                        } else {
                            $("#respuestaE").html(datos.message);
                            $("input").prop('disabled', false);
                            $("#btnEnviar").prop('disabled', false);
                        }
                    }
                });
            }
        });

        //Funcion para enviar el formulario de registro.
        $('#btnEnviar').click(function(e) {
            e.preventDefault();

            //Muestro el efecto cargando en el boton
            $(".zmdi-hc-spin").show();

            setTimeout(function() {
                $(".zmdi-hc-spin").hide();
                $("#btnEnviar").attr('disabled', false); //Desabilito el boton enviar
            }, 1000);

            url = "nuevoCliente.php";
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formCliente").serialize(),
                success: function(datos) {
                    $("#listClientes").load(
                        "listClientes.php"
                    ); //Cargo nuevamenta la lista de Clientes, pero ya actualizada.
                    $("#formCliente")[0].reset(); //Limpio todos los input de mi formulario

                }
            });

        });
    });

    $(document).ready(function() {
        $('#cedula').on('change', function() {
            var id = $(this).val();
            $.ajax({
                url: 'buscar_registro.php',
                method: 'POST',
                data: {
                    cedula: id
                },
                dataType: 'json',
                success: function(datos) {
                    $('#nombre').val(datos.nombre);
                    $('#correo').val(datos.correo);
                }
            });
        });
    });
    </script>

</body>

</html>