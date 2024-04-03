var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
    tablaProveedor();
});

$("#addproveedor").on('click', function () {
    window.event.preventDefault();
    $('#modal-dialog_add_proveedor').modal({show: true, backdrop:'static', keyboard: false});
});

function abrirModal(e,idprov) {
    e.preventDefault();
    $('#modal-dialog-edit_proveedor').modal({show: true, backdrop:'static', keyboard: false});
    llenarEditar(idprov);

}

function llenarEditar(idprov) {
    var url = "/mantenimiento/obtenerproveedoreditar/" + idprov;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#idproveedor').val(data['result']['pvCod']);
                $('#edruc').val(data['result']['pvRuc']);
                $('#edrazons').val(data['result']['pvRazonS']);
                $('#edtelefono').val(data['result']['pvTelefono']);
                $('#eddireccion').val(data['result']['pvDireccion']);
            }, beforeSend: function () {

            },

        });

}
function enviar() {
    if (validarFormulario() === 0) {
        Swal.fire({
            title: 'Esta seguro(a)?',
            text: 'Se agregara un nuevo registro',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, acepto',
            cancelButtonText: 'no, cancelar'
        }).then((result) => {
            if (result.value) {
                var razons = $('#razons').val();
                var ruc = $('#ruc').val();
                var telefono = $('#telefono').val();
                var direccion = $('#direccion').val();
                $.ajax({
                    url: '/mantenimiento/storeproveedor',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        razons: razons,
                        ruc: ruc,
                        telefono: telefono,
                        direccion: direccion,
                    },
                    dataType: 'JSON',
                    success:
                        function (data) {
                            if (data['error'] === 0) {

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    type: 'success',
                                    title: 'Registro de proveedor exitoso',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                location.reload();
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    type: 'error',
                                    title: 'ocurrio un error!',
                                    text: data['error'],
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                location.reload();
                            }
                        }
                    ,
                    beforeSend: function () {
                        $('#enviar').prop("disabled", true);
                    }
                });

            }
        });
    }else{
        operacionSubsanar();
    }
}

function enviarEditProv() {
    Swal.fire({
        title: 'Esta seguro(a)?',
        text: 'Se editara el registro',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, acepto',
        cancelButtonText: 'no, cancelar'
    }).then((result) => {
        if (result.value) {
            var idprov = $('#idproveedor').val();
            var razons = $('#edrazons').val();
            var ruc = $('#edruc').val();
            var telefono = $('#edtelefono').val();
            var direccion = $('#eddireccion').val();
            $.ajax({
                url: '/mantenimiento/editproveedor',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    idprov: idprov,
                    razons: razons,
                    ruc: ruc,
                    telefono: telefono,
                    direccion: direccion,
                },
                dataType: 'JSON',
                success:
                    function (data) {
                        if (data['error'] === 0) {

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                type: 'success',
                                title: 'Proveedor  editado',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            location.reload();
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                type: 'error',
                                title: 'ocurrio un error!',
                                text: data['error'],
                                showConfirmButton: false,
                                timer: 3000
                            });
                            location.reload();

                        }


                    }

                ,
                beforeSend: function () {
                    $('#enviared').prop("disabled", true);
                }
            });


        }
    });

}
function tablaProveedor(){
    $('#tabla_proveedor').DataTable({
            ajax: '/mantenimiento/obtenerproveedor',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
        orderCellsTop: true,
        processing: false,
        serverSide: false,
        ordering: false,
        select: true,
        destroy: true,
        responsive: true,
        bAutoWidth: true,
        dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf'
        ],
            columnDefs: [
                {"targets": 0, "width": "2%", "className": "text-center"},
                {"targets": 1, "width": "4%", "className": "text-center"},
                {"targets": 2, "width": "4%", "className": "text-center"},
                {"targets": 3, "width": "4%", "className": "text-center"},
                {"targets": 4, "width": "4%", "className": "text-center"},
                {"targets": 5, "width": "4%", "className": "text-center"},
            ],

            columns: [
                {data: 'pvRuc', name: 'pvRuc'},
                {data: 'pvRazonS', name: 'pvRazonS'},
                {data: 'pvTelefono', name: 'pvTelefono'},
                {data: 'pvDireccion', name: 'pvDireccion'},
                {
                    data: function (row) {
                        return parseInt(row.pvEst) === 0 ? '<span class="text-danger">ELIMINADO</span>' : '<span class="text-success">ACTIVO</span>'

                    }
                },
                {
                    data: function (row) {
                        if (parseInt(row.pvEst) === 1) {
                            return '<tr >\n' +
                                '<a href="#"  onclick="abrirModal(event,' + row.pvCod + ')" TITLE="Editar proveedor" >\n' +
                                '<i class="text-success far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '<a href="#" style="color: red" TITLE="Eliminar proveedor" onclick="eliminarProveedor(' + row.pvCod + ')">' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-trash"> </i></a>\n' +
                                '</tr>';
                        } else {
                            return '<tr >\n' +
                                '<a href="#" style="color: green" TITLE="Activar proveedor" onclick="eliminarProveedor(' + row.pvCod + ')">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-check"> </i></a>\n' +
                                '</tr>';
                        }
                    }
                }

            ]
        }
    );

}

function validarFormulario() {
    var inicio = 'Por favor';
    var text;
    var cont = 0;
    if ($('#ruc').val() !== '0') {
        validarCaja('ruc', 'validrazons', 'Correcto', 1);
    } else {
        cont++;
        text = inicio + ' Ingresa Razon Social';
        validarCaja('razons', 'validproveedor', text, 0);
        $('#razons').focus();
    }
    if ($('#ruc').val() !== '0') {
        validarCaja('ruc', 'validruc', 'Correcto', 1);
    } else {
        cont++;
        text = inicio + ' Ingresa Ruc';
        validarCaja('ruc', 'validruc', text, 0);
        $('#ruc').focus();
    }
    if ($('#telefono').val() !== '0') {
        validarCaja('telefono', 'validtelefono', 'Correcto', 1);
    } else {
        cont++;
        text = inicio + ' Ingresa Telefono';
        validarCaja('telefono', 'validtelefono', text, 0);
        $('#telefono').focus();
    }
    if ($('#direccion').val() !== '0') {
        validarCaja('direccion', 'validdireccion', 'Correcto', 1);
    } else {
        cont++;
        text = inicio + ' Ingresa Direccion';
        validarCaja('direccion', 'validdireccion', text, 0);
        $('#direccion').focus();
    }
    return cont;
}


function valNumMeta() {
    var val = $('#nummeta').val();
    val = zeroFill(val, 4);
    var url = "/presupuesto/validarmeta/" + val;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data['error'] === 0) {
                    var result = data['met'];
                    if (parseInt(result[0]['cant']) > 0) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            type: 'warning',
                            title: 'La meta ya esta registrada',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        validarCaja('nummeta', 'validnummeta', 'El numero de meta ya fue registrado', 0);
                        $('#nummeta').val(val);
                    }
                    else {
                        validarCaja('nummeta', 'validnummeta', 'Nro de meta correcto', 1);
                        $('#enviar').prop("disabled", false);
                        $('#nummeta').val(val);
                    }
                }

            }, beforeSend() {
                $('#enviar').prop("disabled", true);
            }

        });
}
function eliminarProveedor(idprov){
    var url = "/mantenimiento/deleteproveedor/" + idprov;
    Swal.fire({
        title: 'Esta seguro(a)?',
        text: 'Se eliminara/restaurara este registro',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, acepto',
        cancelButtonText: 'no, cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax(
                {
                    type: "GET",
                    url: url,
                    cache: false,
                    dataType: 'json',
                    data: '_token = <?php echo csrf_token() ?>',
                    success: function (data) {
                        if (data['error'] === 0) {
                            tablaProveedor();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                type: 'success',
                                title: 'Proveedor eliminado/restaurado correctamente!',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {
                            tablaProveedor();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                type: 'error',
                                title: 'ocurrio un error!',
                                text: data['error'],
                                showConfirmButton: false,
                                timer: 3000
                            });

                        }
                    }

                });

        }
    })
}
