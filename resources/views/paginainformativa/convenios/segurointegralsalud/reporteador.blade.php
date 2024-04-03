<link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/css/default/style.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/css/default/style-responsive.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme"/>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<!-- ================== END BASE CSS STYLE ================== -->
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->


<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<link href="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/nvd3/build/nv.d3.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/js/sweetaler/sweetalert2.all.js')}}"></script>
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->
<br>
<div id="response">
    <div class="row col-xl-12">
        <!-- begin col-3 -->

        <div class="col-lg-2 col-md-2">
            <a href="#" title="Haz click para ver el indicador" style="text-decoration:none"
               onclick="handleAreaChart(1)">
                <div class="widget widget-stats " id="cuadro1">
                    <div class="stats-content">

                        <div class="stats-title text-center" id="tit1"></div>

                        <input id="codIndi1" hidden/>
                        <div class="stats-number text-center" id="tot1"></div>
                        <div class="stats-progress progress">
                            <div id="barra1" class="progress-bar" style="width: 20%;"></div>
                        </div>
                        <div class="stats-desc" id="totant1">
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- end col-3 -->
        <!-- begin col-3 -->

        <div class="col-lg-2 col-md-2">
            <a href="#" title="Haz click para ver el indicador" style="text-decoration:none"
               onclick="handleAreaChart(2)">
                <div class="widget widget-stats" id="cuadro2">
                    <div class="stats-icon stats-icon-lg"></div>
                    <div class="stats-content">
                        <div class="stats-title text-center" id="tit2"></div>
                        <input id="codIndi2" hidden/>

                        <div class="stats-number text-center" id="tot2"></div>
                        <div class="stats-progress progress">
                            <div id="barra2" class="progress-bar" style="width: 20%;"></div>
                        </div>
                        <div class="stats-desc" id="totant2">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-2 col-md-2">
            <a href="#" title="Haz click para ver el indicador" style="text-decoration:none"
               onclick="handleAreaChart(3)">
                <div class="widget widget-stats " id="cuadro3">
                    <div class="stats-icon stats-icon-lg"></div>
                    <div class="stats-content">
                        <div class="stats-title text-center" id="tit3"></div>
                        <input id="codIndi3" hidden/>
                        <div class="stats-number text-center" id="tot3"></div>
                        <div class="stats-progress progress">
                            <div id="barra3" class="progress-bar" style="width: 20%;"></div>
                        </div>
                        <div class="stats-desc" id="totant3">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-2 col-md-2">
            <a href="#" title="Haz click para ver el indicador" style="text-decoration:none"
               onclick="handleAreaChart(4)">
                <div class="widget widget-stats " id="cuadro4">
                    <div class="stats-icon stats-icon-lg"></div>
                    <div class="stats-content">
                        <div class="stats-title text-center" id="tit4"></div>
                        <input id="codIndi4" hidden/>

                        <div class="stats-number text-center" id="tot4"></div>
                        <div class="stats-progress progress">
                            <div id="barra4" class="progress-bar" style="width: 20%;"></div>
                        </div>
                        <div class="stats-desc" id="totant4">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end col-3 -->
        <div class="col-lg-2 col-md-2">
            <a href="#" title="Haz click para ver el indicador" style="text-decoration:none"
               onclick="handleAreaChart(5)">
                <div class="widget widget-stats " id="cuadro5">
                    <div class="stats-icon stats-icon-lg"></div>
                    <div class="stats-content">

                        <div class="stats-title text-center" id="tit5"></div>

                        <input id="codIndi5" hidden/>

                        <div class="stats-number text-center" id="tot5"></div>
                        <div class="stats-progress progress">
                            <div id="barra5" class="progress-bar" style="width: 20%;"></div>
                        </div>
                        <div class="stats-desc" id="totant5">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-2 col-md-2">
            <a href="#" title="Haz click para ver el indicador" style="text-decoration:none"
               onclick="handleAreaChart(6)">
                <div class="widget widget-stats " id="cuadro6">
                    <div class="stats-icon stats-icon-lg"></div>
                    <div class="stats-content">

                        <div class="stats-title text-center" id="tit6"></div>

                        <input id="codIndi6" hidden/>

                        <div class="stats-number text-center" id="tot6"></div>
                        <div class="stats-progress progress">
                            <div id="barra6" class="progress-bar" style="width: 20%;"></div>
                        </div>
                        <div class="stats-desc" id="totant6">
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end col-3 -->

        <!-- end col-3 -->
    </div>
    <!-- end row -->
    <div class="row col-xl-12">
        <div class="center col-xl-2">
        </div>
        <div class="center col-xl-8">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                <div class="panel-heading">
                    <H6 style="color: white" class="text-center">
                        "CONVENIO PARA EL FINANCIAMIENTO DE LAS PRESTACIONES SUSCRITOS ENTRE EL SEGURO INTEGRAL DE SALUD
                        , FONDO INTANGIBLE SOLIDARIO DE SALUD, INSTITUCIONES PRESTADORAS DE SERVICIO DE SALUD, GOBIERNOS
                        REGIONALES
                        Y DIRECCIONES DE REDES INTEGRADAS DE SALUD DEL MINISTERIO DE SALUD"
                    </H6>
                </div>
                <div class="panel-body">
                    <table style="width:100%">
                        <tr>

                            <th width="50%">
                                <u><h4 class="text-center" id="titulo">
                                    </h4></u>
                                <br>
                                <h4 class="text-center">NUMERADOR</h4>
                                <h5 class="panel-title" id="numerador">

                                </h5>

                                <h4 class="text-center">DENOMINADOR</h4>
                                <h5 class="panel-title" id="denominador">
                                </h5>
                                <h4 class="text-center">META</h4>
                                <h5 class="panel-title">
                                    Cantidad de poblacion que se debe atender para alcanzar el procentaje minimo
                                    del indicador.
                                </h5>

                            </th>
                            <th width="50%" class="text-center">
                                <div class="align-content-center">
                                    <img id="imagenindicador" height="150px" width="150px" src="">

                                </div>
                                <h4 class="panel-title text-center">PORCENTAJE ALCANZADO

                                </h4>
                                <h2 id="porcentajealcan" class="text-center"></h2>

                                <h4 class="panel-title text-center">META A SEPTIEMBRE</h4>

                                <h2 id="meta" class="text-center"></h2>
                            </th>
                        </tr>

                    </table>
                    <hr>

                    <table>
                        <tr>
                            <th width="50%" class="text-center">
                                <p class="text-center"><b>Fuente: </b><br>Base de datos del SIS/ BDODSIS-ATE – Enero a
                                    Octubre 2019
                                </p>
                            </th>
                            <th width="50%" class="text-center">
                                <table>
                                    <tr class="text-center">
                                        <b>Semaforo: </b><br>
                                        <span class="button bg-gradient-green"> Cumple</span>
                                        <span class="button bg-gradient-yellow"> En proceso</span>
                                        <span class="button bg-gradient-red">Tomar estrategia</span>
                                    </tr>
                                </table>

                            </th>
                        </tr>
                    </table>

                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>

    <div class="row col-xl-12">
        <div class="center col-xl-2">
        </div>
        <div class="center col-xl-8">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="chart-js-1">
                <div class="panel-heading">
                    <h4 class="panel-title text-center" id="titulo">
                        EVALUACION DE INDICADOR REGIONAL POR MESES.
                    </h4>
                </div>
                <div class="panel-body p-0">

                    <div id="apex-area-chart"></div>
                </div>
                <div class="panel-body" id="comentario1">

                </div>

            </div>
            <!-- end panel -->
        </div>

    </div>
    <div class="row col-xl-12">
        <div class="center col-xl-2">
        </div>
        <div class="center col-xl-8">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="chart-js-4">
                <div class="panel-heading">
                    <h4 class="panel-title  text-center">
                        EVALUACION DE CADA EJECUTORA POR MESES.
                    </h4>
                </div>

                <div class="panel-body p-0">
                    <div id="line_ejecutora"></div>
                </div>
                <div class="panel-body p-0">

                    <div class="col-12">

                        <select class="form-control mb-3 col-4 left " id="selectejecutora">
                        </select>
                    </div>
                </div>
                <div class="panel-body" id="comentario4">

                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>
    <div class="row col-xl-12">
        <div class="center col-xl-2">
        </div>
        <div class="center col-xl-8">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="chart-js-2">
                <div class="panel-heading">
                    <h4 class="panel-title  text-center">
                        EVALUACION DE INDICADOR, APORTE DE EJECUTORA AL INDICADOR EN EL MES.
                    </h4>

                </div>

                <div class="panel-body p-0">

                    <div id="apex-pie-chart"></div>
                </div>
                <div class="panel-body p-0">
                    <div class="col-12">

                        <select class="form-control mb-3 col-4 left " id="selectmes1">
                        </select>
                    </div>
                </div>
                <div class="panel-body" id="comentario2">

                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>
    <div class="row col-xl-12">
        <div class="center col-xl-2">
        </div>
        <div class="center col-xl-8">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="chart-js-3">
                <div class="panel-heading">
                    <h4 class="panel-title  text-center">
                        EVALUACION DE INDICADOR DE CADA EJECUTORA.
                    </h4>

                </div>

                <div class="panel-body p-0">
                    <div id="apex-radar-chart"></div>
                </div>

                <div class="panel-body p-0">
                    <div class="col-12">
                        <select class="form-control mb-3 col-4 left " id="selectmes2">
                        </select>
                    </div>
                </div>
                <div class="panel-body" id="comentario3">
                </div>
            </div>
            <!-- end panel -->
        </div>
        <div class="col-xl-12 text-center">
            @php
                try{
                 $usuario= Auth::user()->name;
                }catch (Exception $e)
                {
                 $usuario= null;
                }

            @endphp
            @if($usuario!=null)
                <button id="edit" class="btn btn-primary" onclick="abrilModal()" title="click para agregar respuesta
                    "><i class="fas fa-lg fa-fw m-r-10 fa-comment"></i>responder
                </button>
            @endif
            <ul class="timeline" id="respuestas">
            </ul>

        </div>
    </div>
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Responder comentarios</h4>

                </div>
                <div class="modal-body">

                    <p>
                        <button id="edit" class="btn btn-success" onclick="guardarRepuesta()" title="click para modificar
                    ">modificar comentario
                        </button>
                    </p>
                    <textarea class="ckeditor" id="respuesta" name="respuesta" rows="20">
                        </textarea>r
                    <div class="modal-footer">
                        <a href="javascript:" class="btn btn-success" data-dismiss="modal">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/js/theme/default.min.js')}}"></script>
<script src="{{asset('assets/js/apps.js')}}"></script>
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>


    $.getScript('../assets/plugins/d3/3.5.2/d3.min.js').done(function () {
        $.when(
            $.getScript('../assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js'),
            $.getScript('../assets/plugins/nvd3/build/nv.d3.js'),
            $.getScript('../assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js'),
            $.getScript('../assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js'),
            $.getScript('../assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js'),
            $.getScript('../assets/plugins/gritter/js/jquery.gritter.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            $.getScript('../js/convenio_sis/convenio_sis.js').done(function () {
                DashboardSIS.init();
            });
        });
        $.when(
            $.getScript('../assets/plugins/apexcharts/dist/apexcharts.min.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {

        });
    });

</script>
<!-- ================== END PAGE LEVEL JS ================== -->
