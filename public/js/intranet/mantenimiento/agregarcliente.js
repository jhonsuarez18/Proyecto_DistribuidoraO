var sit=0;
var camposadd = [];
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
    $('.modal-backdrop').remove();
    if(parseInt($('#idvi').val())===1){
        $('#modal_dialog_add_cliente').modal('show');
        camposadd=[];
        camposUserAdd();
        limpiarCaja(camposadd);
        datePickers();
        departamento('deparcl',0);
        provincia('provacte',1,0);
        $('#tipdoccl').focus();
    }
    tablaClientes();
});
function getTipoDoc(id,idtipdoc) {
    var url = "/mantenimiento/gettipodoc";
    var select = $('#'+id).html('');
    var html = '<option value="0" selected="">SELECCIONE</option>';
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                var htmla = '';
                for (var i = 0; i < data.length; i++) {
                    if (parseInt(data[i]['tdId']) === parseInt(idtipdoc)) {
                        htmla = '<option value="' + data[i]['tdId'] + '" selected>' + data[i]['tdDescCorta'] + '</option>';
                        html = html + htmla;
                    } else {
                        htmla = '<option value="' + data[i]['tdId'] + '">' + data[i]['tdDescCorta'] + '</option>';
                        html = html + htmla;
                    }
                }
                select.append(html);
            }

        });
}
var datePickers = function () {

    $('#fecnaccl').datepicker({
        todayHighlight: true,
        autoclose: true
    });


    $('#fecregla').datepicker({
        todayHighlight: true,
        autoclose: true
    });

};
function camposUserAdd() {
    var tablacampos = new Array();
    tablacampos[0] = "appaterno";
    tablacampos[1] = "valappaterno";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "apmaterno";
    tablacampos[1] = "valapmaterno";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "pnombre";
    tablacampos[1] = "valpnombre";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "snombre";
    tablacampos[1] = "valsnombre";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "fecnac";
    tablacampos[1] = "valfecnac";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "telefo";
    tablacampos[1] = "valtelefo";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "depar";
    tablacampos[1] = "valdepar";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "prov";
    tablacampos[1] = "valprov";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "dis";
    tablacampos[1] = "valdis";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "cento";
    tablacampos[1] = "valcento";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "dir";
    tablacampos[1] = "valdir";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "provacte";
    tablacampos[1] = "valprovacte";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "disacte";
    tablacampos[1] = "valdisacte";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "estate";
    tablacampos[1] = "valestate";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "nombrecu";
    tablacampos[1] = "valnombrecu";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "emailcu";
    tablacampos[1] = "valemailcu";
    tablacampos[2] = 1;
    camposadd.push(tablacampos);
    tablacampos = [];
    tablacampos[0] = "rocu";
    tablacampos[1] = "valrocu";
    tablacampos[2] = 0;
    camposadd.push(tablacampos);
    $('#enviaruser').prop("disabled", false);
}
$('#deparcl').on('change', function () {
    provincia('provcl',this.value);
    var prov = $('#deparcl');
    var provvalid = $('#valdeparcl');

    if (this.value === '0') {
        $('#provcl').prop('disabled', true);
        validarCaja('deparcl', 'valdeparcl', 'Escoja departamento', 0)
    }
    else {
        $('#provcl').prop('disabled', false);
        provvalid.removeClass('valid-feedback');
        prov.removeClass('is-valid');
        prov.removeClass('is-invalid');
        provvalid.addClass('invalid-feedback');
        $('#provcl').focus();
    }
});
$('#deparcledit').on('change', function () {
    provincia('provcledit', this.value,0);
    var prov = $('#deparcledit');
    var provvalid = $('#valdeparcledit');

    if (this.value === '0') {
        $('#provcledit').prop('disabled', true);
        validarCaja('deparcledit', 'valdeparcledit', 'Escoja departamento', 0)
    } else {
        $('#provcledit').prop('disabled', false);
        provvalid.removeClass('valid-feedback');
        prov.removeClass('is-valid');
        prov.removeClass('is-invalid');
        provvalid.addClass('invalid-feedback');
        $('#provcledit').focus();
    }
});
/*$('#enviar').on('click', function () {
    enviar();
});*/

$('#provcl').on('change', function () {
    distrito('discl',this.value, 0);
    var prov = $('#provcl');
    var provvalid = $('#validDni');

    if (this.value === '0') {
        $('#discl').prop('disabled', true);
        validarCaja('provcl', 'valprovcl', 'Escoja provincia', 0)
    }
    else {
        $('#discl').prop('disabled', false);
        provvalid.removeClass('valid-feedback');
        prov.removeClass('is-valid');
        prov.removeClass('is-invalid');
        provvalid.addClass('invalid-feedback');
        $('#discl').focus();
    }
});
$('#discl').on('change', function () {

    var dis = $('#discl');
    var disval = $('#valdis');

    if (this.value === '0') {
        validarCaja('discl', 'valdiscl', 'Escoja distrito', 0)
    }
    else {
        $('#centocl').prop('disabled', false);
        disval.removeClass('valid-feedback');
        dis.removeClass('is-valid');
        dis.removeClass('is-invalid');
        disval.addClass('invalid-feedback');
        $('#centocl').focus();
    }
});
$('#centocl').typeahead({
    name: 'data',
    displayKey: 'name',
    source: function (query, process) {
        $.ajax({
            url: "/cepo",
            type: 'GET',
            data: 'query=' + query,
            dataType: 'JSON',
            async: 'false',
            success: function (data) {
                bondObjs = {};
                bondNames = [];
                $.each(data, function (i, item) {
                    bondNames.push({
                        id: item.idCentroPoblado,
                        name: item.Descripcion,
                    });
                });
                process(bondNames);
            }

        });
    }
    , updater: function (item) {
        let idcentp = $('#idcentp');
        idcentp.val('');
        idcentp.val(item.id);
        return item;
    }

});
$('#centocledit').typeahead({
    name: 'data',
    displayKey: 'name',
    source: function (query, process) {
        $.ajax({
            url: "/cepo",
            type: 'GET',
            data: 'query=' + query,
            dataType: 'JSON',
            async: 'false',
            success: function (data) {
                bondObjs = {};
                bondNames = [];
                $.each(data, function (i, item) {
                    bondNames.push({
                        id: item.idCentroPoblado,
                        name: item.Descripcion,
                    });
                });
                process(bondNames);
            }

        });
    }
    , updater: function (item) {
        let idcentp = $('#idcentpedit');
        idcentp.val('');
        idcentp.val(item.id);
        return item;
    }

});
$('#provcledit').on('change', function () {
    distrito('discledit',this.value, 0);
    var provacte = $('#provcledit');
    var valprovacte = $('#valprovcledit');

    if (this.value === '0') {
        $('#discledit').prop('disabled', true);
        validarCaja('provcledit', 'valprovcledit', 'Escoja provincia', 0)
    }
    else {
        $('#discledit').prop('disabled', false);
        valprovacte.removeClass('valid-feedback');
        provacte.removeClass('is-valid');
        provacte.removeClass('is-invalid');
        valprovacte.addClass('invalid-feedback');
        $('#discledit').focus();
    }
});
$('#discledit').on('change', function () {
    var disacte = $('#discledit');
    var valdisacte = $('#valdiscledit');

    if (this.value === '0') {
        $('#estate').prop('disabled', true);
        validarCaja('discledit', 'valdiscledit', 'Escoja distrito', 0)
    }
    else {
        $('#estate').prop('disabled', false);
        valdisacte.removeClass('valid-feedback');
        disacte.removeClass('is-valid');
        disacte.removeClass('is-invalid');
        valdisacte.addClass('invalid-feedback');
        $('#estate').focus();
    }
});
/*function generarUsuario() {

    var pnombre = $('#pnombre').val();
    var appaterno = $('#appaterno').val();
    var apmaterno = $('#apmaterno').val();
    $('#nombrecu').val(pnombre.substr(0, 1) + appaterno + apmaterno.substr(0, 1));
}*/
/*function generarUsuarioEdit() {

    var pnombre = $('#pnombreedit').val();
    var appaterno = $('#appaternoedit').val();
    var apmaterno = $('#apmaternoedit').val();
    $('#nombrecuedit').val(pnombre.substr(0, 1) + appaterno + apmaterno.substr(0, 1));
}*/


function eliminar(id) {
    window.event.preventDefault();
    var url = '/eliminar/' + id;
    Swal.fire({
        title: 'Desea eliminar este registro?',
        type: 'warning',
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
                            desbloquear();
                            redirect('/usuario');
                            exito();
                        } else {
                            desbloquear();
                            redirect('/usuario');
                            exito();

                        }
                    }, beforeSend: function () {
                        bloquear();
                    }

                });
        }
    })
}
function limpiar_campos(){
    $('#appaternocl').val("");
    $('#apmaternocl').val("");
    $('#nombrescl').val("");
    $('#telefocl').val("");
    $('#razonscl').val("");
    $('#fecnaccl').val("");
}
function limpiar_campos_edit(){
    $('#appaternocledit').val("");
    $('#apmaternocledit').val("");
    $('#nombrescledit').val("");
    $('#razonscledit').val("");
}
$('#tipdoccl').on('change', function () {
    limpiar_campos();
    var dni = $('#dnicl');
    var tipdoc = $('#validDnicl');
    var tipodocval = $('#validtipodoccl');
    if (this.value === '0') {
        dni.val('');
        dni.prop('disabled', true);
        validarCaja('tipdoccl', 'validtipodoccl', 'Escoja tipo documento', 0)
    }
    else {
        dni.prop('disabled', false);
        dni.val('');
        validarCaja('tipdoccl', 'validtipodoccl', '', 1)
    }

    if(parseInt(this.value)===1){
        blo_desblo_campos(false,true)
    }else{
        if(parseInt(this.value)===3){
            blo_desblo_campos(true,false)
        }
    }
    $('#dnicl').focus();


});
$('#tipdoccledit').on('change', function () {
    limpiar_campos_edit();
    var dni = $('#dnicledit');
    var tipdoc = $('#valdnicledit');
    var tipodocval = $('#valtipodoccledit');
    if (this.value === '0') {
        dni.val('');
        dni.prop('disabled', true);
        validarCaja('tipdoccledit', 'valtipodoccledit', 'Escoja tipo documento', 0)
    }
    else {
        dni.prop('disabled', false);
        dni.val('');
        validarCaja('tipdoccledit', 'valtipodoccledit', '', 1)
    }

    if(parseInt(this.value)===1){
        blo_desblo_camposEdit(false,true)
    }else{
        if(parseInt(this.value)===3){
            blo_desblo_camposEdit(true,false)
        }
    }
    $('#dnicledit').focus();


});

function validarDni() {

    bloquear();
    var dni = $('#dnicl').val();
    var url = "/validardni/" + dni;
    var text;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data['error'] === 0) {
                    var arra = data['cant'][0];
                    if (arra['cant'] > 0) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'El cliente ya fue creado',
                            text: 'el cliente ya fue creado, redireccionando a la lista de usuario...!',
                            showConfirmButton: false,
                            timer: 4000
                        });
                        redirect('/usuario');
                        desbloquear();
                    }
                    else {
                        desbloquear();
                        text = 'Dni correcto';
                        validarCaja('dnicl', 'validDnicl', text, 1);
                        $('#enviar').prop('disabled', false);
                    }

                } else {

                }
            }

        });
}



function validarFormulario() {
    var inicio = 'Por favor';
    var text;
    var cont = 0;
    if ($('#tipdoccl').val() !== '0') {

        text = '';
        validarCaja('tipdoccl', 'validtipodoccl', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione un tipo de documento';
        validarCaja('tipdoccl', 'validtipodoccl', text, 0);
    }
    if ($('#dnicl').val() !== '0') {
    }
    else {
        cont++;
        text = inicio + ' ingrese un numero de documento';
        validarCaja('dnicl', 'validDnicl', text, 0);
    }

    if($('#tipdoccl').val()===1){
        if ($('#appaternocl').val() === '') {
            cont++;
            text = inicio + ' ingrese apellido paterno';
            validarCaja('appaternocl', 'valappaternocl', text, 0);
        }
        else {
            text = 'Apellido paterno correcto';
            validarCaja('appaternocl', 'valappaternocl', text, 1);
        }
        if ($('#apmaternocl').val() === '') {
            cont++;
            text = inicio + ' ingrese apellido materno';
            validarCaja('apmaternocl', 'valapmaternocl', text, 0);
        }
        else {
            text = 'Apellido materno correcto';
            validarCaja('apmaternocl', 'valapmaternocl', text, 1);
        }
        if ($('#nombrescl').val() === '') {
            cont++;
            text = inicio + 'Ingrese nombre';
            validarCaja('nombrescl', 'valnombrescl', text, 0);
        }
        else {
            text = 'Nombre correcto';
            validarCaja('pnombrecl', 'valpnombrecl', text, 1);
        }
    }else{
        if($('#tipdoccl').val()===3){
            if ($('#razonscl').val() === '') {
                cont++;
                text = inicio + ' ingrese Razon Social';
                validarCaja('razonscl', 'valrazonscl', text, 0);
            }
            else {
                text = 'Razon Social correcto';
                validarCaja('razonscl', 'valrazonscl', text, 1);
            }
        }
    }



    if ($('#deparcl').val() !== '0') {

        text = '';
        validarCaja('deparcl', 'valdeparcl', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione un departamento';
        validarCaja('deparcl', 'valdeparcl', text, 0);

    }
    if ($('#provcl').val() !== '0') {

        text = '';
        validarCaja('provcl', 'valprovcl', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione una provincia';
        validarCaja('provcl', 'valprovcl', text, 0);

    }
    if ($('#discl').val() !== '0') {
        text = '';
        validarCaja('discl', 'valdiscl', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione un distrito';
        validarCaja('discl', 'valdiscl', text, 0);

    }

    return cont;
}
function validarFormularioEdit() {
    var inicio = 'Por favor';
    var text;
    var cont = 0;
    if ($('#tipdoccledit').val() !== '0') {
        text = 'Tipo de documento correcto';
        validarCaja('tipdoccledit', 'valtipodoccledit', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione un tipo de documento';
        validarCaja('tipdoccledit', 'valtipodoccledit', text, 0);
    }
    if ($('#dnicledit').val() !== '0') {
        text = 'Numero de documento correcto';
        validarCaja('dnicledit', 'valdnicledit', text, 1);
    }
    else {
        cont++;
        text = inicio + ' ingrese un numero de documento';
        validarCaja('dnicledit', 'validDnicledit', text, 0);
    }
    if ($('#appaternocledit').val() === '') {
        cont++;
        text = inicio + ' ingrese apellido paterno';
        validarCaja('appaternocledit', 'valappaternocledit', text, 0);
    }
    else {
        text = 'Apellido paterno correcto';
        validarCaja('appaternocledit', 'valappaternocledit', text, 1);
    }
    if ($('#apmaternoedit').val() === '') {
        cont++;
        text = inicio + ' ingrese apellido materno';
        validarCaja('apmaternoedit', 'valapmaternoedit', text, 0);
    }
    else {
        text = 'Apellido materno correcto';
        validarCaja('apmaternocledit', 'valapmaternocledit', text, 1);
    }
    if ($('#pnombrecledit').val() === '') {
        cont++;
        text = inicio + ' ingrese primer nombre';
        validarCaja('pnombrecledit', 'valpnombrecledit', text, 0);
    }
    else {
        text = 'Primer nombre correcto';
        validarCaja('pnombrecledit', 'valpnombrecledit', text, 1);
    }

    if ($('#fecnaccledit').val() === '') {
        cont++;
        text = inicio + ' ingrese fecha de nacimiento';
        validarCaja('fecnaccledit', 'valfecnaccledit', text, 0);
    }
    else {

        text = 'Fecha de nacimiento correcta';
        validarCaja('fecnaccledit', 'valfecnaccledit', text, 1);
    }

    if ($('#deparcledit').val() !== '0') {
        text = 'Departamento correcto';
        validarCaja('deparcledit', 'valdeparcledit', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione un departamento';
        validarCaja('deparcledit', 'valdeparcledit', text, 0);

    }
    if ($('#provcledit').val() !== '0') {
        text = 'Provincia correcta';
        validarCaja('provcledit', 'valprovcledit', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione una provincia';
        validarCaja('provcledit', 'valprovcledit', text, 0);

    }
    if ($('#discledit').val() !== '0') {
        text = 'Distrito correcto';
        validarCaja('discledit', 'valdiscledit', text, 1);
    }
    else {
        cont++;
        text = inicio + ' seleccione un distrito';
        validarCaja('discledit', 'valdiscledit', text, 0);

    }

    if ($('#dircledit').val() === '') {
        cont++;
        text = inicio + ' ingrese direccion';
        validarCaja('dircledit', 'valdircledit', text, 0);
    }
    else {
        text = 'Direccion correcta';
        validarCaja('dircledit', 'valdircledit', text, 1);
    }

    return cont;
}
$('#addcliente').on('click',function(){
    window.event.preventDefault();
    $('#modal_dialog_add_cliente').modal('show');
    datePickers();
    getTipoDoc('tipdoccl',0);
    departamento('deparcl',0);
    provincia('provacte',1,0);
    camposUserAdd();
    $('#tipdoccl').focus();
});
/*function abrilModal(id, nombre) {
    window.event.preventDefault();
    $('#modal-dialog').modal('show');
    $('#nombcom').val(nombre);
    llenarPermisos(id);
}*/


/*function llenarPermisos(id) {
    var datatable = $('#tabla_permisos');
    datatable.DataTable().destroy();
    datatable.DataTable({
            ajax: '/obtenerpermisos/' + id,
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            select: true,
            responsive: true,
            bAutoWidth: true,
            rowId: 'id',
            dom: 'lBfrtip',

            buttons: [
                'excel', 'pdf'
            ],
            columns: [
                {data: 'mtitulo', name: 'mtitulo'},
                {data: 'mdescripcion', name: 'mdescripcion'},
                {data: 'ssubTitulo', name: 'ssubTitulo'},
                {
                    data: function (row) {
                        if (parseInt(row.perm) === 1) {
                            return '<tr> <a  href="#" onclick="activarDesactivarPermiso(' + row.idpermiso + ',' + id + ',' + row.sidSubMenu + ',1)"  title="Desactivar permiso" >' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-thumbs-up text-green"> </i></a></tr>';
                        } else {
                            return '<tr> <a  href="#" onclick="activarDesactivarPermiso(' + row.idpermiso + ',' + id + ',' + row.sidSubMenu + ',0)"   title="Activar permiso" >' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-thumbs-down text-red"> </i></a></tr>';
                        }
                    }
                }

            ]
        }
    );
}*/

/*function activarDesactivarPermiso(idpermiso, idusu, idsubmenu, estado) {
    window.event.preventDefault();
    var datosperm = {
        idpermiso: idpermiso,
        idusu: idusu,
        idsubmenu: idsubmenu,
        estado: estado,
    };
    datosperm = JSON.stringify(datosperm);
    Swal.fire({
        title: 'Esta seguro(a)?',
        text: 'Se registrara una nueva atencion',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, acepto',
        cancelButtonText: 'no, cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                    type: 'GET',
                    url: "/cambiarpermiso/" + datosperm,
                    cache: false,
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN
                    },
                    success:
                        function (data) {
                            if (data['error'] === 0) {
                                operacionExitosa();
                                llenarPermisos(idusu);
                            } else {
                                operacionError(data['error']);
                                bloquear();
                            }

                        }
                    ,
                    beforeSend: function () {

                    }
                }
            )
            ;
        }
    })

}*/
function tablaClientes(){
    $('#tabla_cliente').DataTable({
        ajax: '/mantenimiento/obtenercliente',
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
            {"targets": 0, "width": "30%", "className": "text-left"},
            {"targets": 1, "width": "10%", "className": "text-center"},
            {"targets": 2, "width": "10%", "className": "text-center"},
            {"targets": 3, "width": "5%", "className": "text-center"},
            {"targets": 4, "width": "25%", "className": "text-center"},
            {"targets": 5, "width": "10%", "className": "text-center"},
            {"targets": 6, "width": "5%", "className": "text-center"},
        ],
        columns: [
            {data: 'person', name: 'person'},
            {data: 'peNumeroDoc', name: 'peNumeroDoc'},
            {
                data: function (row) {
                    if(row.codigo==null){
                        return row.coddist;
                    }else{
                        return row.codigo;
                    }

                }
            },
            {data: 'peTelefono', name: 'peTelefono'},
            {data: 'tdDescCorta', name: 'tdDescCorta'},
            {data: 'clFecCrea', name: 'clFecCrea'},
            {
                data: function (row) {
                    return parseInt(row.clEst) === 0 ? '<span class="text-danger">ELIMINADO</span>' : '<span class="text-success">ACTIVO</span>'

                }
            },
            {
                data: function (row) {
                    if (parseInt(row.clEst) === 1 && parseInt(row.clEst) === 1) {
                        return '<tr >\n' +
                            '<a href="#"  onclick="abrilModalEdClien(' + row.peNumeroDoc + ')" TITLE="Editar Cliente " >\n' +
                            '<i class="text-success far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                            '<a href="#" style="color: red" TITLE="Eliminar Cliente" onclick="eliminarCliente(' + row.clId +')">' +
                            '<i class="fas fa-lg fa-fw m-r-10 fa-trash"> </i></a>\n' +
                            '</tr>';
                    } else {
                        return '<tr >\n' +
                            '<a href="#" style="color: green" TITLE="Restaurar Cliente"  onclick="eliminarCliente(' + row.clId +')">\n' +
                            '<i class="fas fa-lg fa-fw m-r-10 fa-check"> </i></a>\n' +
                            '</tr>';
                    }
                }
            }
        ]
    });
}
function abrilModalEdClien(dni) {
    window.event.preventDefault();
    $('#modal_dialog_edit_cliente').modal('show');
    //TipoSeguroEdit(0);
    $('#fecnaccledit').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true
    });
    obtenerEditarCliente(dni);

}
function obtenerEditarCliente(dni) {
    var url = "/mantenimiento/getClienDni/" + dni;
    var text;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data['error'] === 0) {
                    var client = data['cliente'];
                    var person = data['person'];
                    console.log(data['person']);
                    if (client!==null || person!==null  ) {
                        $('#tipdoccledit').prop("disabled", true);
                        getTipoDoc('tipdoccledit',person['tipoDoc']);
                        $('#idpersonedit').val(person['idPe']);
                        $('#idclientedit').val(client['clId']);
                        $('#tipdoccledit').val(person['tipoDoc']);
                        $('#dnicledit').val(person['peNumeroDoc']).prop("disabled",true);
                        if(person['tipoDoc']===1){
                            blo_desblo_campos()
                            $('#appaternocledit').val(person['peAPPaterno']);
                            $('#apmaternocledit').val(person['peAPMaterno']);
                            $('#pnombrecledit').val(person['peNombres']);
                            blo_desblo_camposEdit(false,true)
                        }else{
                            if($('#tipdoccledit').val(person['tipoDoc']===3)){
                                blo_desblo_camposEdit(true,false)
                                $('#razonscledit').val(person['peNombres']);
                            }
                        }
                        $('#fecnaccledit').val(person['peFecNac']);
                        $('#telefocledit').val(person['peTelefono']);
                        $('#dircledit').val(person['peDireccion']);

                        departamento('deparcledit',person['depa']);
                        provincia('provcledit',person['depa'],person['provin']);
                        distrito('discledit',person['provin'],person['dist']);
                        $('#siti').val(1);
                        $('#tipdoccledit').prop('disabled',false);
                        $('#dnicledit').prop('disabled',false);
                        $('#dnicledit').focus();
                        //desbloquear();
                        $('#appaternocledit').focus();
                    }else{
                        $('#appaternoedit').focus();
                    }
                    //desbloquear();
                } else {

                }
            },beforeSend: function(){
                //bloquear();
            },

        });
}
function eliminarCliente(idcli){

    var url="/mantenimiento/deleteclien/"+idcli;
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
                        url: url,
                        type: 'GET',
                        cache:false,
                        dataType: 'JSON',
                        data: '_token = <?php echo csrf_token() ?>',
                        success: function (data) {
                            if (data['error'] === 0) {
                                tablaClientes();
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    type: 'success',
                                    title: 'Cliente eliminado/restaurado correctamente!',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            } else {
                               tablaClientes();
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
/*function abrilModalEdUser(idus) {
    window.event.preventDefault();
    $('#modal_dialog_edit_Usuario').modal('show');
    getEditUser(idus);
}*/
function getEditUser(idus) {
    var url = "/getEditUs/" + idus;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                var user= data['user'];
                $('#tipdocedit').val(user['tipoDoc']);
                $('#dniedit').val(user['numeroDoc']);
                $('#appaternoedit').val(user['apPaterno']);
                $('#apmaternoedit').val(user['apMaterno']);
                $('#pnombreedit').val(user['pNombre']);
                $('#snombreedit').val(user['sNombre']);
                $('#fecnacedit').val(user['fecNac']);
                $('#telefoedit').val(user['telefono']);
                $('#diredit').val(user['direccion']);
                $('#nombrecuedit').val(user['name']);
                $('#emailcuedit').val(user['email']);
                $('#idcentpedit').val(user['idCentroPoblado']);
                $('#centoedit').val(user['cenpo']);

                //ids
                $('#iduseredit').val(user['id']);
                $('#idpersedit').val(user['idPersona']);
                $('#idrolusedit').val(user['idrolus']);

                llenarRol('rocuedit',user['role_id']);

                departamento('deparu',user['departamentoid']);
                provincia('provu',user['departamentoid'],user['provinciaid']);
                distrito('disu',user['provinciaid'],user['distritoid']);

                departamento('deparacteedit',user['dep']);
                provincia('provacteedit',user['dep'],user['provate']);
                distrito('disacteedit',user['provate'],user['disate']);
                eess('estateedit',user['disate'],user['estab']);
            }

        });
}
$('#deparu').on('change', function () {
    provincia('provu', this.value);
    var prov = $('#deparu');
    var provvalid = $('#valdeparu');

    if (this.value === '0') {
        $('#provu').prop('disabled', true);
        validarCaja('deparu', 'valdeparu', 'Escoja departamento', 0)
    } else {
        $('#provu').prop('disabled', false);
        provvalid.removeClass('valid-feedback');
        prov.removeClass('is-valid');
        prov.removeClass('is-invalid');
        provvalid.addClass('invalid-feedback');
        $('#provu').focus();
    }
});
 function blo_desblo_campos($bool1,$bool){
     $('#hidnombres').prop("hidden",$bool1);
     $('#hidappaterno').prop("hidden",$bool1);
     $('#hidapmaterno').prop("hidden",$bool1);
     $('#hidfecnac').prop("hidden",$bool1);
     $('#hidrazons').prop("hidden",$bool);
}
function blo_desblo_camposEdit($bool1,$bool){
    $('#hidnombresedit').prop("hidden",$bool1);
    $('#hidappaternoedit').prop("hidden",$bool1);
    $('#hidapmaternoedit').prop("hidden",$bool1);
    $('#hidfecnacedit').prop("hidden",$bool1);
    $('#hidrazonsedit').prop("hidden",$bool);
}
$('#provu').on('change', function () {
    distrito('disu',this.value, 0);
    var prov = $('#provu');
    var provvalid = $('#valprovu');

    if (this.value === '0') {
        $('#disu').prop('disabled', true);
        validarCaja('provu', 'valprovu', 'Escoja provincia', 0)
    } else {
        $('#disu').prop('disabled', false);
        provvalid.removeClass('valid-feedback');
        prov.removeClass('is-valid');
        prov.removeClass('is-invalid');
        provvalid.addClass('invalid-feedback');
        $('#disu').focus();
    }
});
$('#disu').on('change', function () {
    $('#centoedit').prop('disabled',false);
    $('#centoedit').focus();
});
function validDniClient() {
    event.preventDefault();
    if(validarDniExpres('enviarclient','dnicl','tipdoccl','validDnicl')===0){
        /*var dni = $('#dnicl').val();
        var url = "/referencia/getPacDni/" + dni;
        var text;
        $.ajax(
            {
                type: "GET",
                url: url,
                cache: false,
                dataType: 'json',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data['error'] === 0) {
                        var usuario = data['usuario'];
                        var person = data['person'];
                        if (usuario!==null || person!==null  ) {
                            if(usuario!==null){
                                $('#tipdoccl').prop("disabled", true);
                                $('#dnicl').val(person['numeroDoc'])
                                $('#appaternocl').val(person['apPaterno'])
                                $('#apmaternocl').val(person['apMaterno'])
                                $('#pnombrecl').val(person['pNombre'])
                                $('#snombrecl').val(person['sNombre'])
                                $('#fecnaccl').val(person['fecNac'])
                                $('#telefocl').val(person['telefono'])
                                $('#dircl').val(person['direccion'])
                                $('#centocl').val(usuario['cenpo'])


                                departamento('deparcl',usuario['departamentoid']);
                                provincia('provcl',usuario['departamentoid'],usuario['provinciaid']);
                                distrito('discl',usuario['provinciaid'],usuario['distritoid']);


                                desbloquear();
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'warning',
                                    type: 'warning',
                                    title: 'El cliente ya esta registrado',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $('#enviaruser').prop("disabled", true);
                                sit=3;
                            }else{
                                $('#idperson').val(person['idPersona']);
                                $('#tipdoccl').prop("disabled", true);
                                $('#dnicl').val(person['numeroDoc']).prop("disabled", true);
                                $('#appaternocl').val(person['apPaterno']).prop("disabled", true);
                                $('#apmaternocl').val(person['apMaterno']).prop("disabled", true);
                                $('#pnombrecl').val(person['pNombre']).prop("disabled", true);
                                $('#snombrecl').val(person['sNombre']).prop("disabled", true);
                                $('#fecnaccl').val(person['fecNac']).prop("disabled", true);
                                $('#telefocl').val(person['telefono']).prop("disabled", true);
                                $('#dircl').val(person['direccion']).prop("disabled", true);
                                $('#centocl').val(person['centrop']).prop("disabled", true);
                                departamento('deparcl',person['departamentoid']);
                                provincia('provcl',person['departamentoid'],person['provinciaid']);
                                distrito('discl',person['provinciaid'],person['distritoid']);
                                $('#deparcl').prop('disabled',true);
                                var pnombre = $('#pnombrecl').val();
                                var appaterno = $('#appaternocl').val();
                                var apmaterno = $('#apmaternocl').val();

                                sit=2;
                            }

                        }else{
                            $('#appaternocl').focus();
                            limpiarCaja(camposadd);
                            sit=1;
                        }
                        //desbloquear();
                    } else {

                    }
                },beforeSend: function(){
                    //bloquear();
                },

            });*/
            var tipdoc = $('#tipdoccl').val();
            var dni = $('#dnicl').val();
            var url = "/mantenimiento/getapiclient/"+ tipdoc+"/" + dni;
            var text;
            $.ajax(
                {
                    type: "GET",
                    url: url,
                    cache: false,
                    dataType: 'json',
                    data: '_token = <?php echo csrf_token() ?>',
                    success: function (data) {
                        if (data['error'] === 0) {
                            var client = data['apicliente'];
                            //var person = data['person'];
                            console.log(client);
                            if(tipdoc==='1'){
                                if(client===null){
                                    operacionErrorApi("");
                                    habi_deshabi_campos(false);
                                    $('#appaternocl').focus()
                                }else{
                                    habi_deshabi_campos(true);
                                    $('#nombrescl').val(client['nombres']);
                                    $('#appaternocl').val(client['apellidoPaterno']);
                                    $('#apmaternocl').val(client['apellidoMaterno']);
                                }
                                if(client['message']==="not found"){
                                    var message=client['message'];
                                    operacionErrorApi(message);
                                    habi_deshabi_campos(false);
                                    $('#appaternocl').focus()
                                }
                            }else{
                                if(tipdoc==='3'){
                                    if(client['razonSocial']===""){
                                        operacionErrorApi(client['razonSocial']);
                                        habi_deshabi_campos(false);
                                        $('#razonscl').focus()
                                    }else{
                                        habi_deshabi_campos(true);
                                        $('#razonscl').val(client['razonSocial']);
                                    }
                                    if(client['message']==="ruc no valido"){
                                        var inicio=client['message'];
                                        text = inicio + ' Ingrese uno correcto';
                                        validarCaja('razonscl', 'valrazonscl', text, 0);
                                    }
                                }
                            }
                            //console.log(client['nombres']);


                            //desbloquear();
                        } else {

                        }
                    },beforeSend: function(){
                        //bloquear();
                    },

                });
            }
}
function validDniClientEdit() {
    event.preventDefault();
    if(validarDniExpres('enviarclient','dnicledit','tipdoccledit','valdnicledit')===0){
        var tipdoc = $('#tipdoccledit').val();
        var dni = $('#dnicledit').val();
        var url = "/mantenimiento/getapiclient/"+ tipdoc+"/" + dni;
        var text;
        $.ajax(
            {
                type: "GET",
                url: url,
                cache: false,
                dataType: 'json',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data['error'] === 0) {
                        var client = data['apicliente'];
                        //var person = data['person'];
                        console.log(client);
                        if(tipdoc==='1'){
                            if(client===null){
                                operacionErrorApi("");
                                habi_deshabi_campos(false);
                                $('#appaternocledit').focus()
                            }else{
                                habi_deshabi_campos(true);
                                $('#nombrescledit').val(client['nombres']);
                                $('#appaternocledit').val(client['apellidoPaterno']);
                                $('#apmaternocledit').val(client['apellidoMaterno']);
                            }
                            if(client['message']==="not found"){
                                var message=client['message'];
                                operacionErrorApi(message);
                                habi_deshabi_campos(false);
                                $('#appaternocledit').focus()
                            }
                        }else{
                            if(tipdoc==='3'){
                                if(client['razonSocial']===""){
                                    operacionErrorApi(client['razonSocial']);
                                    habi_deshabi_campos(false);
                                    $('#razonscledit').focus()
                                }else{
                                    habi_deshabi_campos(true);
                                    $('#razonscledit').val(client['razonSocial']);
                                }
                                if(client['message']==="ruc no valido"){
                                    var inicio=client['message'];
                                    text = inicio + ' Ingrese uno correcto';
                                    validarCaja('razonscledit', 'valrazonscledit', text, 0);
                                }
                            }
                        }
                        //console.log(client['nombres']);


                        //desbloquear();
                    } else {

                    }
                },beforeSend: function(){
                    //bloquear();
                },

            });
    }
}
function habi_deshabi_campos($bool){
    $('#apmaternocl').prop('disabled',$bool);
    $('#appaternocl').prop('disabled',$bool);
    $('#nombrescl').prop('disabled',$bool);
    $('#razonscl').prop('disabled',$bool);
}
function enviarCliente() {
    if(validarFormulario()===0){
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
                var idper=$('#idperson').val();
                var tipdoc = $('#tipdoccl').val();
                var dni = $('#dnicl').val();

                var appaterno = $('#appaternocl').val();
                var apmaterno = $('#apmaternocl').val();
                var nombres = $('#nombrescl').val();
                var fecnac = $('#fecnaccl').val();
                var telefo = $('#telefocl').val();
                var razonsoc = $('#razonscl').val();

                //ubicacion
                var iddist = $('#discl').val();

                var dir = $('#dircl').val();
                var idcenpo = $('#idcentp').val();

                $.ajax({
                    url: '/mantenimiento/storecliente',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        idpers: idper,
                        tipdoc: tipdoc,
                        dni: dni,
                        appaterno: appaterno,
                        apmaterno: apmaterno,
                        nombres: nombres,
                        razons: razonsoc,
                        fecnac: fecnac,
                        telefo: telefo,
                        iddist: iddist,
                        dir: dir,
                        sit: sit,
                        idcp: idcenpo,
                    },
                    dataType: 'JSON',
                    success:
                        function (data) {
                            if (data['error'] === 0) {

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    type: 'success',
                                    title: 'Registro de Cliente exitoso',
                                    showConfirmButton: false,
                                    timer: 4000
                                });
                                if(parseInt($('#idvi').val())===1){
                                    redirect('/transacciones/ventas');
                                }else{
                                    limpiarCaja(camposadd);
                                    closeModal('modal_dialog_add_cliente')
                                    tablaClientes();
                                    iniciarcampos();
                                }

                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    type: 'error',
                                    title: 'ocurrio un error!',
                                    text: data['error'],
                                    showConfirmButton: false,
                                    timer: 4000
                                });
                                limpiarCaja(camposadd);
                                closeModal('modal_dialog_add_cliente')
                                tablaClientes();
                                iniciarcampos();

                            }


                        }

                    ,
                    beforeSend: function () {
                        $('#enviarclient').prop("disabled", true);
                    }
                });


            }
        });
    }else{
        operacionSubsanar();
    }
}
function enviarClienteEdit() {
    if(validarFormularioEdit()===0){
        Swal.fire({
            title: 'Esta seguro(a)?',
            text: 'Se Editará el registro',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, acepto',
            cancelButtonText: 'no, cancelar'
        }).then((result) => {
            if (result.value) {
                var idper=$('#idpersonedit').val();
                var idclient=$('#idclientedit').val();
                var tipdoc = $('#tipdoccledit').val();
                var dni = $('#dnicledit').val();

                var appaterno = $('#appaternocledit').val();
                var apmaterno = $('#apmaternocledit').val();
                var pnombre = $('#pnombrecledit').val();
                var snombre = $('#snombrecledit').val();
                var fecnac = $('#fecnaccledit').val();
                var telefo = $('#telefocledit').val();

                //ubicacion
                var iddist = $('#discledit').val();

                var dir = $('#dircledit').val();
                var idcenpo = $('#idcentpedit').val();

                $.ajax({
                    url: '/mantenimiento/updatecliente',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        idpers: idper,
                        idclient: idclient,
                        tipdoc: tipdoc,
                        dni: dni,
                        appaterno: appaterno,
                        apmaterno: apmaterno,
                        pnombre: pnombre,
                        snombre: snombre,
                        fecnac: fecnac,
                        telefo: telefo,
                        iddist: iddist,
                        dir: dir,
                        sit: sit,
                        idcp: idcenpo,
                    },
                    dataType: 'JSON',
                    success:
                        function (data) {
                            if (data['error'] === 0) {

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    type: 'success',
                                    title: 'Cliente editado exitosamente',
                                    showConfirmButton: false,
                                    timer: 4000
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
                                    timer: 4000
                                });
                                location.reload();

                            }


                        }

                    ,
                    beforeSend: function () {
                        $('#enviarclient').prop("disabled", true);
                    }
                });


            }
        });
    }else{
        operacionSubsanar();
    }
}
function enviarEditUser() {
    if($('#centoedit').val()===''){
        $('#idcentpedit').val('0');
    }
    if(validarFormularioEdit()===0){
        Swal.fire({
            title: 'Esta seguro(a)?',
            text: 'Se Editará el registro',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, acepto',
            cancelButtonText: 'no, cancelar'
        }).then((result) => {
            if (result.value) {
                var iduser = $('#iduseredit').val();
                var idpers = $('#idpersedit').val();
                var idrolus = $('#idrolusedit').val();

                var tipdoc = $('#tipdocedit').val();
                var dni = $('#dniedit').val();

                var appaterno = $('#appaternoedit').val();
                var apmaterno = $('#apmaternoedit').val();
                var pnombre = $('#pnombreedit').val();
                var snombre = $('#snombreedit').val();
                var fecnac = $('#fecnacedit').val();
                var telefo = $('#telefoedit').val();

                //ubicacion
                var iddis = $('#disu').val();

                var dir = $('#diredit').val();
                var cenpo = $('#idcentpedit').val();

                var estate = $('#estateedit').val();
                var nombrecu = $('#nombrecuedit').val();
                var correo = $('#emailcuedit').val();
                var rol = $('#rocuedit').val();

                $.ajax({
                    url: '/updateuser',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        iduser: iduser,
                        idpers: idpers,
                        idrolus: idrolus,
                        tipdoc: tipdoc,
                        dni: dni,
                        appaterno: appaterno,
                        apmaterno: apmaterno,
                        pnombre: pnombre,
                        snombre: snombre,
                        fecnac: fecnac,
                        telefo: telefo,
                        iddis: iddis,
                        dir: dir,
                        idcp: cenpo,
                        estate: estate,
                        nombre: nombrecu,
                        correo: correo,
                        rol: rol
                    },
                    dataType: 'JSON',
                    success:
                        function (data) {
                            if (data['error'] === 0) {

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    type: 'success',
                                    title: 'Usuario editado  exitosamente',
                                    showConfirmButton: false,
                                    timer: 4000
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
                                    timer: 4000
                                });
                                location.reload();

                            }


                        }

                    ,
                    beforeSend: function () {
                        $('#enviaredituser').prop("disabled", true);
                    }
                });


            }
        });
    }else{
        operacionSubsanar();
    }
}
