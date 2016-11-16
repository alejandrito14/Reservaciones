<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tres lagunas |Turista reservacion </title>
        <script src="../Resource/js/jquery.min.js"></script>

        <!-- Bootstrap -->
        <link href="../Resource/css/bootstrap.min.css" rel="stylesheet">
        <!-- Materialize -->
        <link type="text/css" rel="stylesheet" href="../Resource/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="../Resource/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="../Resource/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../Resource/css/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="../Resource/css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../Resource/build/css/custom.css" rel="stylesheet">
    </head>

    <body class="login">

           <header>
            <nav>
                <div class="nav-wrapper green">
                    <a href="#!" class="brand-logo"><i class="material-icons"><img src="../Resource/img/logo.png" class="imagen"></i></a>
                    <ul class="right hide-on-med-and-down">
                    <!-- Dropdown Structure -->
                   <li><a href="panelTurista.php">Inicio</a></li>

                    <ul id="dropdown2" class="dropdown-content">
                      <li class="divider"></li>
                      <li><a href="Cabanias_menu.php">Cabañas</a></li>
                      <li><a href="Paquetes_menu.php">Paquetes</a></li>
                      
                      <li><a href="#!">Actividades</a></li>
                      <li class="divider"></li>
                    </ul>
                    <ul id="dropdown3" class="dropdown-content">
                      <li class="divider"></li>
                      <li><a href="turistaReservacion.php">Reserva aqui</a></li>
                      <li><a href="#!">Tus reservaciones</a></li>
                      <li class="divider"></li>
                      
                    </ul>
                      <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Servicios<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Reservaciones<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </nav>

        </header>




        <form id="formingreso" name="formingreso" method="POST">


            <div id="reservacion">
                <div class="login_wrapper">
                    <div class="animate form login_form">
                        <section class="login_content"> 
                            <h1>Reservacion </h1>

                            <label for="fecha_na">Fecha de Entrada</label>
                            <div class="input-field col s4">

                                <input id="fecha_na" type="date" class="datepicker">

                            </div>
                            <label for="fecha_na">Fecha de salida</label>
                            <div class="input-field col s4">

                                <input id="fecha_na" type="date" class="datepicker">

                            </div>

                            <div class="input-field col s4">
                                <input id="cantidad" type="text" class="validate">
                                <label for="nombre">Cantidad de personas</label>
                            </div>
                            <div>
                                <button id="btnconsulta"  class="btn btn-success"  type="button"   >Consultar disponibilidad</button>                
                            </div>
                        </section>

                    </div>
                </div>

            </div>



            <div id="seleccionar">
                </br>
                </br>
                </br>


                <div class="page-title">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Catálogo de cabañas</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="row ">


                                        <div id="cabanias"> 

                                        </div>
                                       <div class="col-md-6 col-md-offset-6">
                                            <div class="">
                                            <button id="btnsiguiente"  class="btn btn-success"  type="button"   >Siguiente</button>                
                                        </div> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>  


            <div id="siguiente">

                </br>
                </br>
                </br>


                <div class="page-title">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Catálogo de paquetes</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="row ">


                                        <div id="paquetes"> 

                                        </div>
                                        
                                    </div>
                                        <div class="container">
                                        <div class="row">
                                         <div class="col-md-6">
                                            <div class="">
                                                <button id="btnatras"  class="btn btn-success"  type="button"   >Atrás</button>                
                                        </div> 
                                        </div> 
                                            
                                            <div class="col-md-6">
                                            <div class="">
                                            <button id="btnsiguiente2"  class="btn btn-success"  type="button"   >Siguiente</button>                
                                        </div> 
                                            
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
                </div>

            
            
<!--              <div id="siguiente2">

                </br>
                </br>
                </br>


                <div class="page-title">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Catálogo de Actividades</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="row ">


                                        <div id="actividades"> 

                                        </div>
                                        
                                    </div>
                                        <div class="container">
                                        <div class="row">
                                         <div class="col-md-6">
                                            <div class="">
                                                <button id="btnatras"  class="btn btn-success"  type="button"   >Atrás</button>                
                                        </div> 
                                        </div> 
                                            
                                            <div class="col-md-6">
                                            <div class="">
                                            <button id="btnsiguiente2"  class="btn btn-success"  type="button"   >Siguiente</button>                
                                        </div> 
                                            
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
                </div>-->








        </form>

        <script src="../Resource/js/jquery-functions.js"></script>
        <script src="../Resource/js/reservacion.js"></script> 
       
        <script src="../Resource/js/cabanias.js"></script>
        <script src="../Resource/js/actividades.js"></script>
        <script src="../Resource/js/paquetes.js"></script>
    </body>
</html>
