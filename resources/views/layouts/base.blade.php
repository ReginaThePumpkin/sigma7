<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">

<?php $permisos = Auth::user()->data['permisos']; //Obtengo los permisos del usuario ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SISTEMA DE EXPEDIENTE CLÍNICO ELECTRÓNICO">
    <meta name="author" content="ING EMMANUEL ANZURES BAUTISTA">

    <title>@yield('titulo')</title>

    <link rel="shortcut icon" href="{{asset('imagenes/favicon.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('imagenes/favicon.ico')}}" type="image/x-icon">

    <!-- Mainly scripts -->
	<script src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('DataTables-1.10.13/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('DataTables-1.10.13/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('DataTables-1.10.13/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('DataTables-1.10.13/extensions/Select/js/dataTables.select.min.js')}}"></script>
    <!-- Mis funciones -->
    @yield('js')
    <script src="{{asset('funciones/js/inicio.js')}}"></script>
    <script src="{{asset('funciones/js/caracteres.js')}}"></script>
    <script src="{{asset('funciones/js/modulos/pacientes.js')}}"></script>

    <!-- Funciones V7-->
    <script src="{{asset('js/main.js')}}"></script>
    
    <!-- CSS-->
    @yield('css')
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('DataTables-1.10.13/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('DataTables-1.10.13/extensions/Scroller/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('DataTables-1.10.13/extensions/Select/css/select.bootstrap.min.css')}}" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout pace-done mini-navbar" style="overflow:hidden;">
    <input name="id_user" id="id_user" type="hidden" value="<?php echo Auth::user()->data['id']; ?>">
    <input name="acc_user" id="acc_user" type="hidden" value="<?php echo Auth::user()->data['acceso']; ?>">
    <input name="sucu_user" id="sucu_user" type="hidden" value="<?php echo Auth::user()->data['sucursal']; ?>">

    <div id="referencia" style="display:none; position:fixed; width:100%; height:100%; z-index:1000000000000000000000;"></div>

    <nav id="mi_barra_menu" class="navbar-inverse navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                
                <li class="nav-header" id="nav-header">
                    <div class="dropdown profile-element" aling="center">
                        <span>
                            @if(Auth::user()->data['sexo'] == 2)
                                <img alt="image" class="img-circle" src="{{asset('imagenes/user_profile_male.png')}}" width="70px" height="70px"/>
                            @else
                                <img alt="image" class="img-circle" src="{{asset('imagenes/user_profile_female.png')}}" width="70px" height="70px"/>
                            @endif
                        </span>
                        <span class="clear text-center" style="color:#2f3686;"> 
                            <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->data['fullname']}}</strong> </span> 
                            <span class="text-muted text-xs block" style="color:rgba(47,54,134,0.8)"><?php /*echo;/*!$puesto_usuario*/ ; ?></span> 
                        </span>
                    </div>
                    <div id="my_home" class="logo-element" style="color:#ff6633; text-shadow:0px 0px 0px #000000;"> 
                        <img id="go_home" style="cursor:pointer;" src="{{asset('imagenes/empresa/brand.png')}}" width="68px" /> 
                    </div>
                </li>

                <li class="active">
                    <a href="index.php" id="m_home"> <i class="fa fa-home"></i> <span class="nav-label">HOME</span> </a>
                </li>
                @if(substr($permisos,0,7) != "0000000")
                    <li class="">
                        <a href="" id="m_recepcion">
                            <i class="fa fa-address-book"></i> <span class="nav-label">RECEPCIÓN</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @if($permisos[0]) <li class=""><a href="pacientes.php" id="m_r_pacientes"><i class="fa fa-users"></i> PACIENTES</a></li> @endif
                            
                            @if(substr($permisos,1,3) != "000")
                                <li>
                                    <a href="#"><i class="fa fa-dollar"></i> CORTE DE CAJA <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level collapse">
                                        @if($permisos[1]) <li style="white-space:nowrap;"><a href="ordenes_venta_r.php"><i class="fa fa-shopping-cart"></i> ÓRDENES DE VENTA</a></li> @endif
                                        @if($permisos[2]) <li style="white-space:nowrap;"><a href="pagos_usuario_r.php"><i class="fa fa-dollar"></i> PAGOS</a></li> @endif
                                        @if($permisos[3]) <li style="white-space:nowrap;"><a href="resumen_cc_r.php"><i class="fa fa-dollar"></i> RESUMEN</a></li> @endif
                                    </ul>
                                </li>
                            @endif
                            @if($permisos[4]) <li><a href="agenda.php"><i class="fa fa-calendar"></i> AGENDA</a></li> @endif
                            @if($permisos[5]) <li style="white-space:nowrap;"><a href="membresias.php"><i class="fa fa-address-card"></i> MEMBRESÍAS</a></li> @endif
                            @if($permisos[6]) <li style="white-space:nowrap;"><a href="productividad_rec.php"><i class="fa fa-line-chart"></i> PRODUCTIVIDAD</a></li> @endif
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->data['acceso'] != 14)
                    @if(substr($permisos,7,3) != "000")
                        <li>
                            <a href="#">
                                <i class="fa fa-stethoscope"></i> <span class="nav-label">CONSULTAS</span><span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[7]) <li style="white-space:nowrap;"><a href="{{route('consultas')}}"><i class="fa fa-user-md"></i> CONSULTAS MÉDICAS</a></li> @endif
                                @if($permisos[8]) <li><a href="catalogo_consultas.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li> @endif
                                @if($permisos[9]) <li><a href="productividad_cst.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li> @endif
                            </ul>
                        </li>
                    @endif
                    @if($permisos[10])
                        <li>
                            <a href="enfermeria.php"><i class="fa fa-thermometer-half"></i><i class="fa fa-enfermeria-o"></i><span class="nav-label">ENFERMERÍA</span></a>
                        </li>
                    @endif
                    @if(substr($permisos,11,2) != "00")
                        <li>
                            <a href="#"><i class="fa fa-hospital-o"></i> <span class="nav-label">HOSPITAL</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[11]) <li style="white-space:nowrap;"><a href="hospitalizacion.php"><i class="fa fa-heartbeat"></i> HOSPITALIZACIÓN</a></li> @endif
                                @if($permisos[12]) <li><a href="camas.php"><i class="fa fa-bed"></i> CAMAS</a></li> @endif
                            </ul>
                        </li>
                    @endif
                    @if(substr($permisos,13,6) != "000000")
                        <li>
                            <a href="#"><i class="fa fa-file-image-o"></i> <span class="nav-label">IMAGEN</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[13]) <li style="white-space:nowrap;"><a href="imagen.php"><i class="fa fa-id-badge"></i> IMAGENOLOGÍA</a></li> @endif
                                @if($permisos[14]) <li><a href="endoscopia.php"><i class="fa fa-user-md"></i> ENDOSCOPÍA</a></li> @endif
                                @if($permisos[15]) <li><a href="ultrasonido.php"><i class="fa fa-user-md"></i> ULTRASONIDO</a></li> @endif
                                @if($permisos[16]) <li><a href="colposcopia.php"><i class="fa fa-user-md"></i> COLPOSCOPÍA</a></li> @endif
                                @if($permisos[17]) <li><a href="catalogo_imagen.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li> @endif
                                @if($permisos[18]) <li><a href="productividad_img.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li> @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(substr($permisos,19,5) != "00000")
                    <li>
                        <a href="#">
                            <i class="fa fa-flask"></i> <span class="nav-label">LABORATORIO</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            @if($permisos[19]) <li><a href="laboratorio.php"><i class="fa fa-address-book"></i> ESTUDIOS</a></li> @endif
                            @if(Auth::user()->data['acceso'] != 14)
                                @if($permisos[20]) <li style="white-space:nowrap;"><a href="bases_lab.php"><i class="fa fa-sitemap"></i> BASES</a></li> @endif
                                @if($permisos[21]) <li><a href="bitacora_lab.php"><i class="fa fa-list"></i> BITÁCORAS</a></li> @endif
                                @if($permisos[22]) <li><a href="catalogo_laboratorio.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li> @endif
                                @if($permisos[23]) <li><a href="productividad_lab.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li> @endif
                            @endif
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->data['acceso'] != 14)
                    @if(substr($permisos,24,3) != "000")
                        <li>
                            <a href="#"><i class="fa fa-plus-square"></i><span class="nav-label"> SERVICIOS</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[24]) <li style="white-space:nowrap;"><a href="servicios.php"><i class="fa fa-user-md"></i> SERVICIOS MÉDICOS</a></li> @endif
                                @if($permisos[25]) <li><a href="catalogo_servicios.php"><i class="fa fa-list-ol"></i> CATÁLOGO</a></li> @endif
                                @if($permisos[26]) <li><a href="productividad_ser.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li> @endif
                            </ul>
                        </li>
                    @endif
                    @if(substr($permisos,27,4) != "0000")
                        <li class="hidden">
                            <a href="#">
                                <i class="fa fa-wheelchair"></i> <span class="nav-label">REHABILITACIÓN</span><span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[27]) <li style="white-space:nowrap;"><a href="#"><i class="fa fa-handshake-o"></i> TRABAJO SOCIAL</a></li> @endif
                                @if($permisos[28]) <li style="white-space:nowrap;"><a href="#"><i class="fa fa-plus-square"></i> SERVICIOS MÉDICOS</a></li> @endif
                                @if($permisos[29]) <li><a href="#"><i class="fa fa-list-alt"></i> REPORTES</a></li> @endif
                                @if($permisos[30]) <li style="white-space:nowrap;"><a href="#"><i class="fa fa-bar-chart-o"></i> ESTADÍSTICAS</a></li> @endif
                            </ul>
                        </li>
                    @endif
                    @if(substr($permisos,31,6) != "000000")
                        <li>
                            <a href="#">
                                <i class="fa fa-medkit"></i> <span class="nav-label">FARMACIA</span><span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[31]) <li style="white-space:nowrap;"><a href="#"><i class="fa fa-credit-card"></i> PUNTO DE VENTA</a></li> @endif
                                @if($permisos[32]) <li style="white-space:nowrap;"><a href="catalogo_medicamentos.php"><i class="fa fa-medkit"></i> MEDICAMENTOS</a></li> @endif
                                @if($permisos[33]) <li><a href="#"><i class="fa fa-product-hunt"></i> PRODUCTOS</a></li> @endif
                                @if($permisos[34]) <li style="white-space:nowrap;"><a href="#"><i class="fa fa-dollar"></i> CORTE DE CAJA</a></li> @endif
                                @if($permisos[35]) <li><a href="#"><i class="fa fa-stack-exchange"></i> STOCK</a></li> @endif
                                @if($permisos[36]) <li><a href="productividad_far.php"><i class="fa fa-list-alt"></i> PRODUCTIVIDAD</a></li> @endif
                            </ul>
                        </li>
                    @endif
                    <!-----Fixme v7--->
                    <li class="hidden">
                        <a href="#">
                            <i class="fa fa-handshake-o"></i> <span class="nav-label">ASOCIADOS</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="#"><i class="fa fa-user-md"></i> MÉDICOS</a></li>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> PROMOTORES <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a href="#"><i class="fa fa-list-alt"></i> REPORTE</a></li>
                                    <li style="white-space:nowrap;"><a href="#"><i class="fa fa-users"></i> MIS MÉDICOS</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> 
                    @if(substr($permisos,37,10) != "0000000000")
                        <li>
                            <a href="#"><i class="fa fa-lock"></i> <span class="nav-label">ADMINISTRACIÓN</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                @if($permisos[37]) <li style="white-space:nowrap;"><a href="usuarios.php"><i class="fa fa-users"></i> USUARIOS</a></li> @endif
                                @if($permisos[38]) <li><a href="sucursales.php"><i class="fa fa-building"></i> CONVENIOS</a></li> @endif
                                @if($permisos[39]) <li style="white-space:nowrap;"><a href="escuelas.php"><i class="fa fa-university"></i> ESCUELAS</a></li> @endif
                                
                                @if(Auth::user()->data['acceso'] == 1)
                                    @if(substr($permisos,40,3) != "000")
                                        <li>
                                            <a href="#"><i class="fa fa-dollar"></i> CORTE DE CAJA <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level collapse">
                                                @if($permisos[40]) <li style="white-space:nowrap;"><a href="ordenes_venta_a.php"><i class="fa fa-shopping-cart"></i> ÓRDENES DE VENTA</a></li> @endif
                                                @if($permisos[41]) <li style="white-space:nowrap;"><a href="pagos_usuario_a.php"><i class="fa fa-dollar"></i> PAGOS</a></li> @endif
                                                @if($permisos[42]) <li style="white-space:nowrap;"><a href="resumen_cc.php"><i class="fa fa-dollar"></i> RESUMEN</a></li> @endif
                                            </ul>
                                        </li>
                                    @endif

                                    @if($permisos[43]) <li style="white-space:nowrap;"><a href="#"><i class="fa fa-hand-peace-o"></i> BENEFICIOS</a></li> @endif
                                    @if($permisos[44]) <li><a href="formatos.php"><i class="fa fa-book"></i> FORMATOS</a></li> @endif

                                    @if($permisos[45])
                                        <li>
                                            <a href="#"><i class="fa fa-list-alt"></i> CATÁLOGOS <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level collapse">
                                                <li><a href="unidades_medida.php"><i class="fa fa-thermometer-half"></i> UNIDADES DE MEDIDA</a></li>
                                            </ul>
                                        </li>
                                    @endif

                                    @if($permisos[46]) <li><a href="configuracion.php"><i class="fa fa-cog"></i> CONFIGURACIÓN</a></li> @endif
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom" id="my_nav">
            <nav id="navcit" class="navbar navbar-inverse" role="navigation" style="margin-bottom:0;">
                <div class="navbar-header navbar-inverse" style="padding-top:2px; margin-left:15px;">
                    <button class="navbar-minimalize minimalize-styl-2 btn btn-default btn-sm" href="#" style="color:#2c549c; border:none;"><img style=" margin-top:-3px;" src="{{asset('imagenes/empresa/brand.png')}}" width="75px" /> <i class="fa fa-bars fa-lg"></i> </button>
                    <form role="search" class="navbar-form-custom" method="post" action="#" id="my_search">
                        <div class="form-group">
                            <input type="text" placeholder="Buscar..." class="form-control" style="color:white;" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right navbar-inverse" style="float:right;">
                    <span class="dropdown"> 
                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border:none; font-weight:bold;">
                            <i class="fa fa-user-md"></i> <span>{{ Auth::user()->data['usuario']}}</span> 
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="usuarios.php?id_user=<?php echo base64_encode("encodeuseridAuth::user()->data['id']"); ?>"><i class="fa fa-user-circle"></i> Perfil</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> Correo</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </span>
                    <li> <a href="#" style="cursor:default" class="" data-toggle=""> &nbsp;</a> </li>
                </ul>
            </nav>
        </div>

        <!--Contenido -->
        <div id="container" class="container-fluid row wrapper wrapper-content animated fadeInLeft" style="border:1px none red; padding:2px 2px 2px 2px; margin-left:0px; margin-right:0px; margin-top:0px; overflow:hidden;">
            <div style="border:1px none red; padding-bottom: 5px" class="text-danger"><ol class="breadcrumb" style="background-color:transparent; font-weight:;" id="breadc"></ol></div>
            <!--Contenido -->

            @yield('contenido')
    
        </div><!--FIN de contenido -->
    
        <div class="navbar-inverse" id="my_footer" style="border-radius:0px;">
            <div class="pull-right hidden"> 10GB of <strong>250GB</strong> Free. </div>
            <div> &copy; <strong>GLOSS</strong> <?php echo date('Y'); ?>. TODOS LOS DERECHOS RESERVADOS. </div>
        </div>
    
    </div> <!--FIN de page-wrapper -->
    
    <div id="users-device-size" style="display:none;">
      <div id="xs" class="visible-xs"></div> <div id="sm" class="visible-sm"></div>
      <div id="md" class="visible-md"></div> <div id="lg" class="visible-lg"></div>
    </div>
    
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="false"> </div>
	<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="false"> </div>
	<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="false"> </div>
	<div id="myModal3" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="false"> </div>
    <div id="myModal4" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="false"> </div>
    <div id="myModalx" class="modal fade modal-fullscreen" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="false"> </div>

</body>

</html>