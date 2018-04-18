
var index;
var token = $('#csrf-token').val();
var cargartabla;

//['nombre':, 'fecha':, 'nit':, 'total':]
var lista = {
    'venta' :           {'nombre':[],
                        'fecha':[],
                        'nit': [],
                        'total':[]},

    'detalleventa' :    {'cantidad':[],
                        'descripcion':[],
                        'subtotal':[],
                        'total':[]
                        //'idventa':[]
                                        }
};
/*
$(document).ready(function () {
    debugger;
 

//document.getElementById("liactivos").className += " active";
 
    cargartabla = $('#posts').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
        "lengthMenu": [[5, 10, 15, 25, 50, 100, 150, 200], [5, 10, 15, 25, 50, 100, 150, 200]],
        "language": {
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
            }
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/allalmacen",
            "dataType": "json",
            "type": "POST",
            "data": {_token: token}
        },
        "columns": [
            {"data": "descripcion"},
            {"data": "cantidad"},
            {"data": "precio"},
            {"data": "action"}
        ]
    });

});*/

/// botones
$("#btnPrimero").click(function () {
    index = 0;
    mostrar();
});
$("#btnultimo").click(function () {
    if (cabecera.length == 0) {
        index = 0;
    }
    else {
        index = cabecera.length - 1;
    }
    mostrar();
});

$("#btnatras").click(function () {
    if (index > 0) {
        index = index - 1;
    }
    else {
        index = 0;
    }
    mostrar();
});

$("#btnsiguiente").click(function () {
    if (index < cabecera.length - 1) {
        index = index + 1;
    }
    else {
        index = cabecera.length - 1;
    }
    mostrar();
});

/* Generar token*/

$.ajaxSetup({

    headers: {
        'X-CSRF-TOKEN': token
    }
});
/* Crear nuevo venta */
$("#guardar").click(function (e) {
    debugger;
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    debugger;
    var fecha = $("#contenidoventa").find("input[name='fecha']").val();
    var total = $("#contenidoventa").find("input[name='total']").val();
    var nombre = $("#contenidoventa").find("input[name='nombre']").val();
    var nit = $("#contenidoventa").find("input[name='nit']").val();
    
    lista.venta.nombre = nombre;
    lista.venta.fecha = fecha;
    lista.venta.nit = nit;
    lista.venta.total = total;
    /*lista.detalleventa.cantidad.push("14");
    lista.detalleventa.descripcion.push("hola");
    lista.detalleventa.subtotal.push("200");
    lista.detalleventa.total.push("2000");
    lista.detalleventa.idventa.push("1");
    lista.detalleventa.cantidad.push("15");
    lista.detalleventa.descripcion.push("holaaa");
    lista.detalleventa.subtotal.push("300");
    lista.detalleventa.total.push("3000");
    lista.detalleventa.idventa.push("2");*/
    var contenido=lista.venta; 
    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: form_action,
        data: {venta : lista}
    }).done(function (data) {

        cargartabla.ajax.reload();
        

        $("#create-item").find("input[name='fecha']").val('');
        $("#create-item").find("input[name='total']").val('');
        $("#create-item").find("input[name='nombre']").val('');
        $("#create-item").find("input[name='nit']").val('');

        swal('Guardado Correctamente!', ':)', 'success');
    });
});
/* guardar detalle */
$(".crud-submit").click(function (e) {
    e.preventDefault();
    
    var nombre = $("#create-item").find("input[name='nombre']").val();
    var cantidad = $("#create-item").find("input[name='cantidad']").val();
    var precio = $("#create-item").find("input[name='precio']").val();

        lista.detalleventa.cantidad.push(nombre);
        lista.detalleventa.descripcion.push(cantidad);
        lista.detalleventa.subtotal.push(precio);
        lista.detalleventa.total.push(cantidad*precio);
        //lista.detalleventa.idventa.push("1");
    
        /*$('#posts').DataTable( {
        data: lista.detalleventa,
        
    } );*/
    var table = $('#posts').DataTable();
 
table.rows.add( [ {
        "Descripcion":       "Tiger Nixon",
        "Cantidad":   "System Architect",
        "Precio":     "$3,120",
        "Total": "2011/04/25",
        "Action":     "Edinburgh"
    }, {
        "Descripcion": "Garrett Winters",
        "Cantidad": "Director",
        "Precio": "$5,300",
        "Total": "2011/07/25",
        "Action": "Edinburgh"
    } ] )
    .draw();

        
        $('#create-item').modal('hide');

        $("#create-item").find("input[name='nombre']").val('');
        $("#create-item").find("input[name='cantidad']").val('');
        $("#create-item").find("input[name='precio']").val('');
        swal('Guardado Correctamente!', ':)', 'success');
   
});

/* Editar  */
function mostrardata(data) {
debugger;
    var route = "/Promociones/" + data;
    $("#edit-item").find("form").attr("action", url + '/' + data);
    $.get(route, function (res) {
        $(res).each(function (key, value) {
            $("#edit-item").find("input[name='nombre']").val(value.nombre);
            $("#edit-item").find("input[name='fechai']").val(value.fechai);
            $("#edit-item").find("input[name='fechaf']").val(value.fechaf);
            $("#edit-item").find("input[name='descuento']").val(value.descuento);
        });
    });

}
/* Actualizar */
$(".crud-submit-edit").click(function (e) {

    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var nombre = $("#edit-item").find("input[name='nombre']").val();
    var fechai = $("#edit-item").find("input[name='fechai']").val();
    var fechaf = $("#edit-item").find("input[name='fechaf']").val();
    var descuento = $("#edit-item").find("input[name='descuento']").val();
    $.ajax({
        dataType: 'json',
        type: 'PUT',
        url: form_action,
        data: {nombre: nombre, fechai:fechai, fechaf:fechaf, descuento:descuento}
    }).done(function (data) {

        cargartabla.ajax.reload();
        $('#edit-item').modal('toggle');

        swal(
                'Actualizacion Exitosa!',
                ' :) ',
                'success'
                )
    });

});

/* Eliminar Item */
$("#posts").on("click", ".remove-item", function () {
    var id = $(this).closest('tr').attr('id');
    var c_obj = $(this).parents("tr");
    debugger;
    swal({
        title: 'ESTA SEGURO QUE DESEA ELIMINARLO?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Si, eliminarla!',
        cancelButtonText: 'No, cancelar!',
        confirmButtonClass: false,
        cancelButtonClass: false
    }).then(function () {
        $.ajax({
            dataType: 'json',
            type: 'DELETE',
            url: url + '/' + id,
        }).done(function (data) {
            cargartabla.ajax.reload();
            swal(
                    'Eliminado Exitoso!',
                    ' .',
                    'success'
                    )
        });
    }, function (dismiss) {

        if (dismiss === 'cancel') {
            swal(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
        }
    })

});