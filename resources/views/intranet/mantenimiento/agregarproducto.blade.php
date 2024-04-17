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

    <!-- final cabecera -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h1 class="panel-title">PRODUCTO</h1>
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
                <button id="addproducto" class="btn btn-success " title="click para agregar producto"
                        data-toggle="modal" data-target="#modal_dialog_add_producto">
                    <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Agregar producto
                </button>
            </div>


        </div>


        <div class="col-xl-12 ">
            <div class="modal fade" id="modal-dialog_add_producto">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ">AGREGAR PRODUCTO</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12 col-sm-12 col-xs-12 row ">

                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="tipproducto"> TIPO PRODUCTO
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="tipproducto">

                                        </select>
                                        <div class="hide " id="validtipproducto"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="marca">MARCA
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="marca">

                                        </select>
                                        <div class="hide " id="validmarca"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="present">PRESENTACION
                                            <req>*</req>
                                        </label>
                                        <select class="form-control form-control-sm" id="present">

                                        </select>
                                        <div class="hide " id="validpresent"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="conteni"> CONTENIDO
                                            <req>*</req>
                                        </label>
                                        <div class="input-group m-b-10">
                                            <input id="conteni" type="number" class="form-control form-control-sm" autocomplete="off"
                                                   onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            />
                                            <input id="unidm" type="text" class="form-control form-control-sm" autocomplete="off"
                                                   disabled onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            />
                                        </div>
                                        <div class="hide " id="validconteni"></div>
                                    </div>
                                </div>

                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="precioc">PRECIO C
                                            <req>*</req>
                                        </label>
                                        <input id="precioc" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validprecioc"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="form-group-lg">
                                        <label for="preciov">PRECIO V
                                            <req>*</req>
                                        </label>
                                        <input id="preciov" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validpreciov"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 ">
                                    <div class="form-group-lg">
                                        <label for="stock">STOCK
                                            <req>*</req>
                                        </label>
                                        <input id="stock" value="0" type="number" class="form-control form-control-sm" autocomplete="off"
                                               onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                        />
                                        <div class="hide " id="validstock"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 text-center">
                                <hr>
                                <a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-lg fa-fw m-r-10 fa-times"></i>Cancelar</a>
                                <button id="enviar" class="btn btn-success " title="click para agregar producto
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
                        <table id="tabla_producto"
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
                            <td>
                            </td>
                            </tbody>
                            <thead>
                            <tr role="row">
                                <th>
                                    TIPO PRODUCTO
                                </th>
                                <th>
                                    MARCA
                                </th>
                                <th>
                                    PRESENTACION
                                </th>
                                <th>
                                    CONTENIDO
                                </th>
                                <th>
                                    PRECIO C
                                </th>
                                <th>
                                    PRECIO V
                                </th>
                                <th>
                                    STOCK
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
        <div class="  col-sm-12 col-xs-12 col-md-12">
            <dl class=" row dl-horizontal">
                <div class="  col-sm-2 col-xs-2 col-md-2">
                    <dt class="text-inverse">Leyenda para Stock:</dt>
                </div>
                <div class="  col-sm-10 col-xs-10 col-md-10 ">
                    <dd><i style="color: red;" class="fas fa-lg fa-fw m-r-10 fa-circle text-danger"></i>Poco
                    </dd>
                    <dd><i style="color: yellow;" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>
                        Medianamente Suficiente
                    </dd>
                    <dd><i style="color: orange;" class="fas fa-lg fa-fw m-r-10 fa-circle text-success"> </i>Suficiente
                    </dd>
                </div>
            </dl>
        </div>
        <div class="col-xl-12 ">
            <div class="modal fade" id="modal-dialog-edit_producto">
                <div class="modal-dialog modal-lg">
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
                                        <div class="input-group m-b-10">
                                            <input id="ediconteni" type="number" class="form-control form-control-sm" autocomplete="off"
                                                   onchange="valNumMeta()" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            />
                                            <input id="ediunidm" type="text" class="form-control form-control-sm" autocomplete="off"
                                                   disabled onkeyup="javascript:this.value=this.value.toUpperCase();"
                                            />
                                        </div>
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
            $.getScript('../js/intranet/mantenimiento/agregarproducto.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        )
    });


</script>
