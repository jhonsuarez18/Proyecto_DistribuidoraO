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
            <h1 class="panel-title">VENTA</h1>
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
                <button id="addventa" class="btn btn-success " title="click para agregar venta"
                        data-toggle="modal" data-target="#modal_dialog_add_venta">
                    <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Agregar venta
                </button>
            </div>


        </div>


        <div class="col-xl-12 ">
            <div class="modal fade" id="modal-dialog_add_venta">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ">AGREGAR VENTA</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse py-3">DATOS VENTA

                            </legend>
                            <div class="col-xl-12 col-sm-12 col-xs-12 row ">
                                <div class="col-xl-4 col-sm-4 col-xs-4">
                                    <input id="idcl" value="0" type="text" hidden>
                                    <label for="client">CLIENTE
                                    </label>
                                    <input id="client" class="form-control form-control-sm"  onchange="valCliDni()" type="text">
                                    <div class="hide " id="valclient"></div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="producto">PRODUCTO
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="producto">

                                        </select>
                                        <div class="hide " id="validproducto"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="stock">STOCK
                                            <req>*</req>
                                        </label
                                        <input id="stock" class="form-control form-control-sm" type="number" disabled>
                                        <div class="hide " id="validstock"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="preciov">PRECIO V
                                            <req>*</req>
                                        </label>
                                        <input id="preciov" type="number" class="form-control form-control-sm" autocomplete="off"
                                                onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validpreciov"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="cant"> CANTIDAD
                                            <req>*</req>
                                        </label>
                                        <input id="cant" type="number" class="form-control form-control-sm" autocomplete="off"
                                                onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validcant"></div>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-xs-1 col-sm-1  btn-group-justified">
                                    <label for="adddetv">
                                        &nbsp;&nbsp; &nbsp;&nbsp;
                                    </label>
                                    <button id="adddetv" class="btn btn-primary btn-icon btn-circle btn-lg "
                                            title="click para agregar Detalle venta">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-xl-12 center-block">
                                    <div id="data-table-fixed-header_wrapper"
                                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 table-responsive ">
                                                <table id="tab_detventa"
                                                       class="table table-striped  table-bordered dataTable no-footer dtr-inline"
                                                       role="grid"
                                                       aria-describedby="data-table-fixed-header_info" width="100%">
                                                    <thead>
                                                    <tr role="row">

                                                        <th>
                                                            PRODUCTO
                                                        </th>
                                                        <th>
                                                            CANTIDAD
                                                        </th>
                                                        <th>
                                                            PRECIO V
                                                        </th>
                                                        <th>
                                                            SUB TOTAL
                                                        </th>
                                                        <th>
                                                            OPC
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-right"><strong>TOTAL</strong>
                                                        </th>
                                                        <th colspan="2" class="text-left"></th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse py-3">DATOS VALE FISE

                            </legend>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                                <div class="form-check" title="Activar para especificar movilidad particular">
                                    <input class="form-check-input is-valid" type="checkbox" value="" id="movil">
                                    <label class="form-check-label" for="ejecutval">VALE FISE</label>
                                </div>
                            </div>
                            <br>
                            <div class="col-xl-12 col-sm-12 col-xs-12 row " HIDDEN="TRUE" id="grval" >
                                <div class="col-xl-3 ">
                                    <div class="form-group-lg">
                                        <label for="cantval">CANT. VALES
                                            <req>*</req>
                                        </label>
                                        <input id="cantval" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="validpreciot()"  onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validcantval"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 ">
                                    <div class="form-group-lg">
                                        <label for="precioval"> PRECIO VALES
                                            <req>*</req>
                                        </label>
                                        <input id="precioval" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="validpreciot()"  onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validprecioval"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 ">
                                    <div class="form-group-lg">
                                        <label for="preciotval"> PRECIO TOTAL VALES
                                        </label>
                                        <input id="preciotval" type="number" class="form-control form-control-sm" autocomplete="off"
                                               disabled onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validpreciotval"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 ">
                                    <div class="form-group-lg">
                                        <label for="totalp"> TOTAL A PAGAR
                                        </label>
                                        <input id="totalp" type="number" class="form-control form-control-sm" autocomplete="off"
                                            disabled   onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validtotalp"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 text-center">
                                <hr>
                                <a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-lg fa-fw m-r-10 fa-times"></i>Cancelar</a>
                                <button id="enviar" class="btn btn-success " title="click para agregar compra
                    " onclick="enviar()"><i class="fas fa-lg fa-fw m-r-10 fa-save"></i>Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-sm-12 col-xs-12  ">
            <div id="data-table-fixed-header_wrapper"
                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="tabla_venta"
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
                            <td>
                            </td>
                            <td>
                            </td>
                            </tbody>
                            <thead>
                            <tr role="row">
                                <th>
                                    CODIGO
                                </th>
                                <th>
                                    CLIENTE
                                </th>
                                <th>
                                    PRODUCTO
                                </th>
                                <th>
                                    CANT
                                </th>
                                <th>
                                    PRECIO V
                                </th>
                                <th>
                                    TOTAL
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
        <div class="col-xl-12 ">
            <div class="modal fade" id="modal-dialog-edit_producto">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">EDITAR PRODUCTO</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input id="idproducto" hidden>
                            <div class="row ">
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="editipproducto"> TIPO PRODUCTO
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="editipproducto">

                                        </select>
                                        <div class="hide " id="valideditipproducto"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="edimarca">MARCA
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="edimarca">

                                        </select>
                                        <div class="hide " id="validedimarca"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="edipresent">PRESENTACION
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="edipresent">

                                        </select>
                                        <div class="hide " id="validedipresent"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="ediconteni"> CONTENIDO
                                            <req>*</req>
                                        </label>
                                        <input id="ediconteni" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validediconteni"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="ediprecioc">PRECIO C
                                            <req>*</req>
                                        </label>
                                        <input id="ediprecioc" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validediprecioc"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="edipreciov">PRECIO V
                                            <req>*</req>
                                        </label>
                                        <input id="edipreciov" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validedipreciov"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="edistock">STOCK
                                            <req>*</req>
                                        </label>
                                        <input id="edistock" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validedistock"></div>
                                    </div>
                                </div>

                                <div class="col-xl-12 text-center">
                                    <hr>
                                    <a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fas fa-lg fa-fw m-r-10 fa-times"></i>Cancelar</a>
                                    <button id="enviared" class="btn btn-success " title="click para editar producto
                                " onclick="enviarEditProd()"><i class="fas fa-lg fa-fw m-r-10 fa-save"></i>Editar
                                    </button>
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
            $.getScript('../js/intranet/transacciones/venta.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        )
    });


</script>

