<link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/css/default/style.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/css/default/style-responsive.min.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme"/>
<link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet"/>


<link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
<link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"/>

<script src="../assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<link href="../assets/plugins/DataTables/media/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="../js/typeahead/bootstrap3-typeahead.js"></script>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<link rel="stylesheet" href="../assets/plugins/datatables.net/css/buttons.dataTables.min.css">
<script src="../assets/plugins/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables.net/js/buttons.flash.min.js"></script>
<script src="../assets/plugins/datatables.net/js/jszip.min.js"></script>
<script src="../assets/plugins/datatables.net/js/pdfmake.min.js"></script>
<script src="../assets/plugins/datatables.net/js/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables.net/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables.net/js/buttons.print.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<style>
    req {
        color: red;
    }

</style>
<br>
<br>
<div id="response">
    <input id="idvi" value="{{$vi}}" hidden>
    <!-- final cabecera -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h1 class="panel-title">CLIENTE</h1>
            <div class="panel-heading-btn">
                <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>

            </div>
        </div>

        <div class="panel-body">
            <div class="col-xl-12  ">
                <button id="addcliente" class="btn btn-success " title="click para agregar cliente"
                        data-toggle="modal" data-target="#modal_dialog_add_cliente">
                    <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Agregar cliente
                </button>
            </div>


        </div>


        <!----------------------------------------INICIO MODAL AGREGAR CLIENTE---------------------------------------->
        <div class="col-xl-12">
            <div class="modal fade" id="modal_dialog_add_cliente">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">AGREGAR CLIENTE</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse py-3">DATOS PERSONA
                                (
                                <req>*</req>
                                <small>Dato obligatorio</small>)
                            </legend>
                            <hr>
                            <div class="col-xl-12 col-sm-12 col-xs-12 row ">
                                <input type="text" id="idperson"hidden/>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="tipdoccl">TIPO DOCUMENTO
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="tipdoccl">
                                        <option selected value="0">SELECCIONE</option>
                                        <option value="1">DNI</option>
                                        <option value="2">CARNET EXTRANJERIA</option>
                                        <option value="3">OTROS</option>
                                    </select>
                                    <div id="validtipodoccl"></div>
                                </div>

                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="dnicl">N&#35; DOC
                                        <req>*</req>
                                    </label>
                                    <input id="dnicl" type="number" class="form-control form-control-sm" autocomplete="off"
                                           onchange="validDniClient()" disabled/>
                                    <div class="hide " id="validDnicl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="appaternocl">APPATERNO
                                        <req>*</req>
                                    </label>
                                    <input id="appaternocl" type="text" class="form-control form-control-sm" autocomplete="off"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valappaternocl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="apmaternocl">APMATERNO
                                        <req>*</req>
                                    </label>
                                    <input id="apmaternocl" type="text" class="form-control form-control-sm" autocomplete="off"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valapmaternocl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="pnombrecl">PNOMBRE
                                        <req>*</req>
                                    </label>
                                    <input id="pnombrecl" type="text" class="form-control form-control-sm" autocomplete="off"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valpnombrecl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="snombrecl">SNOMBRE</label>
                                    <input id="snombrecl" type="text" class="form-control form-control-sm" autocomplete="off"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valsnombrecl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="fecnaccl">FECNAC
                                        <req>*</req>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="fecnaccl" autocomplete="off">
                                    <div class="hide " id="valfecnaccl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="telefocl">TELEFONO
                                    </label>
                                    <input id="telefocl" type="number" class="form-control form-control-sm"
                                           onchange="validCelular('telefocl','valtelefocl','enviarclient')"
                                           autocomplete="off"/>
                                    <div class="" id="valtelefocl"></div>
                                </div>
                                <hr>

                            </div>
                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse py-3">DATOS UBICACION DNI

                            </legend>
                            <hr>
                            <div class="col-xl-12 col-sm-12 col-xs-12 row ">
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="deparcl">DEPARTAMENTO
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="deparcl">
                                        <option selected>AMAZONAS</option>
                                    </select>
                                    <div class="hide " id="valdeparcl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="provcl">PROVINCIA
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="provcl" disabled>
                                        <option selected value="0">SELECCIONE</option>
                                    </select>
                                    <div class="hide " id="valprovcl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="discl">DISTRITO
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="discl" disabled>
                                        <option selected value="0">SELECCIONE</option>
                                    </select>
                                    <div class="hide " id="valdiscl"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <input id="idcentp" value="0" type="text" hidden>
                                    <label for="centocl">CENTRO POBLADO
                                    </label>
                                    <input id="centocl" class="form-control form-control-sm" type="text" disabled>
                                    <div class="hide " id="valcentocl"></div>
                                </div>
                                <div class="col-xl-6 ">
                                    <label for="dircl">DIRECCION
                                    </label>
                                    <input id="dircl" type="text" class="form-control form-control-sm"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div id="valdircl"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xl-12 col-sm-12 col-xs-12 text-center">
                                <hr>
                                <a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-lg fa-fw m-r-10 fa-times"></i>Cancelar</a>
                                <button id="enviarclient" class="btn btn-success " title="click para agregar Cliente
                    " onclick="enviarCliente()"><i class="fas fa-lg fa-fw m-r-10 fa-save"></i>Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----------------------------------------FIN MODAL AGREGAR CLIENTE---------------------------------------->
        <div class="col-xl-12 col-sm-12 col-xs-12  ">
            <div id="data-table-fixed-header_wrapper"
                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="tabla_cliente"
                               class="table table-striped  table-bordered dataTable no-footer dtr-inline"
                               role="grid"
                               aria-describedby="data-table-fixed-header_info" width="100%">
                            <tbody>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            </tbody>
                            <thead>
                            <tr role="row">
                                <th>
                                    CLIENTE
                                </th>
                                <th>
                                    DNI
                                </th>
                                <th>
                                    COD DIST
                                </th>
                                <th>
                                    TELEFONO
                                </th>
                                <th>
                                    FECHA
                                </th>
                                <th>
                                    ESTADO
                                </th>
                                <th>
                                    OPCIONES
                                </th>

                            </tr>
                            </thead>

                        </table>
                    </div>

                </div>

            </div>
        </div>
        <!----------------------------------------INICIO MODAL EDITAR CLIENTE---------------------------------------->
        <div class="col-xl-12">
            <div class="modal fade" id="modal_dialog_edit_cliente">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">EDITAR CLIENTE</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse py-3">DATOS PERSONA
                                (
                                <req>*</req>
                                <small>Dato obligatorio</small>)
                            </legend>
                            <hr>
                            <div class="col-xl-12 col-sm-12 col-xs-12 row ">
                                <input type="text" id="idclientedit"hidden/>
                                <input type="text" id="idpersonedit"hidden/>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="tipdoccledit">TIPO DOCUMENTO
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="tipdoccledit">
                                        <option selected value="0">SELECCIONE</option>
                                        <option value="1">DNI</option>
                                        <option value="2">CARNET EXTRANJERIA</option>
                                        <option value="3">OTROS</option>
                                    </select>
                                    <div id="validtipodoccledit"></div>
                                </div>

                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="dnicledit">N&#35; DOC
                                        <req>*</req>
                                    </label>
                                    <input id="dnicledit" type="number" class="form-control form-control-sm" autocomplete="off"
                                           onchange="validDniClient()" disabled/>
                                    <div class="hide " id="validDnicledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="appaternocledit">APPATERNO
                                        <req>*</req>
                                    </label>
                                    <input id="appaternocledit" type="text" class="form-control form-control-sm" autocomplete="off"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valappaternocledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="apmaternocledit">APMATERNO
                                        <req>*</req>
                                    </label>
                                    <input id="apmaternocledit" type="text" class="form-control form-control-sm" autocomplete="off"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valapmaternocledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="pnombrecledit">PNOMBRE
                                        <req>*</req>
                                    </label>
                                    <input id="pnombrecledit" type="text" class="form-control form-control-sm" autocomplete="off"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valpnombrecledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="snombrecledit">SNOMBRE</label>
                                    <input id="snombrecledit" type="text" class="form-control form-control-sm" autocomplete="off"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div class="hide " id="valsnombrecledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="fecnaccledit">FECNAC
                                        <req>*</req>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="fecnaccledit" autocomplete="off">
                                    <div class="hide " id="valfecnaccledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="telefocledit">TELEFONO
                                    </label>
                                    <input id="telefocledit" type="number" class="form-control form-control-sm"
                                           onchange="validCelular('telefocledit','valtelefocledit','enviarclient')"
                                           autocomplete="off"/>
                                    <div class="" id="valtelefocledit"></div>
                                </div>
                                <hr>

                            </div>
                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse py-3">DATOS UBICACION DNI

                            </legend>
                            <hr>
                            <div class="col-xl-12 col-sm-12 col-xs-12 row ">
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="deparcledit">DEPARTAMENTO
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="deparcledit">
                                        <option selected>AMAZONAS</option>
                                    </select>
                                    <div class="hide " id="valdeparcledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="provcledit">PROVINCIA
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="provcledit" disabled>
                                        <option selected value="0">SELECCIONE</option>
                                    </select>
                                    <div class="hide " id="valprovcledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <label for="discledit">DISTRITO
                                        <req>*</req>
                                    </label>
                                    <select class="form-control form-control-sm" id="discledit" disabled>
                                        <option selected value="0">SELECCIONE</option>
                                    </select>
                                    <div class="hide " id="valdiscledit"></div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <input id="idcentpedit" value="0" type="text" hidden>
                                    <label for="centocledit">CENTRO POBLADO
                                    </label>
                                    <input id="centocledit" class="form-control form-control-sm" type="text" disabled>
                                    <div class="hide " id="valcentocledit"></div>
                                </div>
                                <div class="col-xl-6 ">
                                    <label for="dircledit">DIRECCION
                                    </label>
                                    <input id="dircledit" type="text" class="form-control form-control-sm"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    <div id="valdircledit"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xl-12 col-sm-12 col-xs-12 text-center">
                                <hr>
                                <a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-lg fa-fw m-r-10 fa-times"></i>Cancelar</a>
                                <button id="enviarclientedit" class="btn btn-success " title="click para editar Cliente
                    " onclick="enviarClienteEdit()"><i class="fas fa-lg fa-fw m-r-10 fa-save"></i>Editar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----------------------------------------FIN MODAL AGREGAR CLIENTE---------------------------------------->

    </div>
</div>
</div>
<script src="{{asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/js/theme/default.min.js')}}"></script>
<script src="{{asset('assets/js/apps.js')}}"></script>
<script>
    $.getScript('../assets/plugins/sweetalert/dist/sweetalert.min.js').done(function () {
        $.when(
            $.getScript('../js/intranet/util.js'),
            $.getScript('../js/intranet/mantenimiento/agregarcliente.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        )
    });


</script>



