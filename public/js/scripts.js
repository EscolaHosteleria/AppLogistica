$(document).ready(function () {
    startTable();
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
/**
 * Funcion que instancia el datatables
 */
function startTable() {

    let languageURL = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json";

    let ajaxUrls = [
        '/api/comanda/create',
        '/api/producte/',
        '/api/format/',
        '/api/categoria/',
        '/api/usuari/',
        '/api/comanda/',
    ];

    let nombre_tabla = "";
    let table = "";
    //checks que tabla hay
    if ($("#create_comanda_table").html()) {

        table = {
            columnDefs: [{
                targets: [2, 3, 4],
                orderable: false
            }],
            responsive: true,
            ajax: {
                url: ajaxUrls[0],
                dataSrc: "rows",

            },
            columns: [{
                    data: "Nom"
                },
                {
                    data: "Categoría"
                },
                {
                    data: "Quantitat"
                },
                {
                    data: "Observació"
                },
                {
                    data: "Afegir"
                },
            ],
            language: {
                url: languageURL
            },
        }
        nombre_tabla = "#create_comanda_table";
    } else if ($("#index_products_table").html()) {

        table = {
            columnDefs: [{
                targets: [5],
                orderable: false
            }],
            responsive: true,
            ajax: {
                url: ajaxUrls[1],
                dataSrc: "rows",
            },
            columns: [{
                    data: "ID"
                },
                {
                    data: "Nom"
                },
                {
                    data: "Stock"
                },
                {
                    data: "Categoría"
                },
                {
                    data: "Format"
                },
                {
                    data: "Accions"
                },
            ],
            language: {
                url: languageURL
            },
        }
        nombre_tabla = "#index_products_table";
    } else if ($("#index_formats_table").html()) {
        table = {
            columnDefs: [{
                targets: [2],
                orderable: false
            }],
            responsive: true,
            ajax: {
                url: ajaxUrls[2],
                dataSrc: "rows",
            },
            columns: [{
                    data: "ID"
                },
                {
                    data: "Nom"
                },
                {
                    data: "Accions"
                },
            ],
            language: {
                url: languageURL
            },
        }
        nombre_tabla = "#index_formats_table";

    } else if ($("#index_categories_table").html()) {
        table = {
            columnDefs: [{
                targets: [2],
                orderable: false
            }],
            responsive: true,
            ajax: {
                url: ajaxUrls[3],
                dataSrc: "rows",
            },
            columns: [{
                    data: "ID"
                },
                {
                    data: "Nom"
                },
                {
                    data: "Accions"
                },
            ],
            language: {
                url: languageURL
            },
        }
        nombre_tabla = "#index_categories_table";

    } else if ($("#index_users_table").html()) {
        table = {
            columnDefs: [{
                targets: [5],
                orderable: false
            }],
            responsive: true,
            ajax: {
                url: ajaxUrls[4],
                dataSrc: "rows",
            },
            columns: [{
                    data: "ID"
                },
                {
                    data: "Nom"
                },
                {
                    data: "Correu"
                },
                {
                    data: "Rol"
                },
                {
                    data: "Creat"
                },
                {
                    data: "Accions"
                },
            ],
            language: {
                url: languageURL
            },
        }
        nombre_tabla = "#index_users_table";

    } else if ($("#index_orders_table").html()) {
        table = {
            columnDefs: [{
                    targets: [1],
                    "orderDataType": "dom-checkbox"
                },
                {
                    targets: [3, 4],
                    type: 'date-euro'
                },
                {
                    targets: [6],
                    orderable: false
                },
            ],
            responsive: true,
            ajax: {
                url: ajaxUrls[5],
                dataSrc: "rows",
            },
            columns: [{
                    data: "ID"
                },
                {
                    data: "Comprovada"
                },
                {
                    data: "Entregat"
                },
                {
                    data: "Data creació"
                },
                {
                    data: "Data entrega"
                },
                {
                    data: "Usuari"
                },
                {
                    data: "Accions"
                },
            ],
            language: {
                url: languageURL
            },
        }
        nombre_tabla = "#index_orders_table";
    }
    $(nombre_tabla).DataTable(table);
};

/**
 *
 * FUNCIO COLLAPSE
 *
 */
$(".navbar-toggler").on("click", function (e) {
    e.preventDefault();
    $("#navbarColor01").toggleClass("show");
});

/**
 * FUNCIONES PARA CREATE COMANDA
 */
/**   Funcion  para añadir al carrito */
$(document).on('click', ".add-alimento", function (e) {
    e.preventDefault();
    let id_alimento = parseInt($(this).parent().parent().attr("id"));
    //assigna los valores de row
    let alimento = {
        id: id_alimento,
        nombre: $("#" + id_alimento).children()[0]["innerHTML"],
        categoria: $("#" + id_alimento).children()[1]["innerHTML"],
        cantidad: $("#" + id_alimento + " input").val(),
        formato: $("#" + id_alimento + " select").val(),
        observation: $("#" + id_alimento + " input").last().val()
    }
    //comprueba que la cantidad sea correcta
    if (parseInt(alimento.cantidad) && alimento.cantidad > 0 && alimento.cantidad <= 99999.999) {
        addProductoLista(alimento)
    } else {
        alert("Has d'introduïr una quantitat entre 0 i 99999,999");
    }
    //resetea el valor del input cantidad
    $("#" + alimento.id + " input").val("");
});

let previousOrderDate, pendingOrder = false;
/*
    Función que crea el producto a la lista del productos en DOM
    @param alimento: object alimento que se ha creado por linea
*/

function addProductoLista(alimento) {
    pendingOrder = true;
    /* Row alimento */
    let div_alimento = $("<tr/>", {
        "class": "alimento_added p-2"
    }).appendTo("#carrito");

    /* Nombre alimento */
    let observation;
    if (String(alimento.observation) != "null" && String(alimento.observation) != "") {
        observation = '<button type="button" class="btn btn-sm p-1" data-toggle="tooltip" data-placement="top" title="' +
            alimento.observation + '"><i class="fas fa-file-alt fa-lg" style="color:#15c74c"></i></button>';
    } else {
        observation = '<button type="button" class="btn btn-sm p-1" disabled><i class="fas fa-file-alt fa-lg" style="color:#0000009c"></i></button>';
    }
    $("<td/>", {
        "class": "p-1",
        html: observation
    }).appendTo(div_alimento);
    $("<td/>", {
        "class": "text-center align-center",
        html: alimento.nombre
    }).appendTo(div_alimento);
    /* Cantidad alimento */
    $("<td/>", {
        "class": "text-center  align-center",
        text: String(alimento.cantidad).replace("\.", "\,")
    }).appendTo(div_alimento);
    /* Formato alimento */
    $("<td/>", {
        "class": "text-center align-center",
        text: alimento.formato
    }).appendTo(div_alimento);
    /* Div button delete */
    let div_button = $("<td/>", {
        "class": "del_col_aliment text-center align-center"
    }).appendTo(div_alimento);
    /* Button delete */
    let button = $("<button/>", {
        "class": "mx-auto btn del_button btn-danger btn-circle",
        type: "button"
    }).appendTo(div_button);
    /* icono minus */
    $("<i/>", {
        "class": "fa fa-minus"
    }).appendTo(button);


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    /* INPUTS FORM COMANDAS */
    /* nombre */

    $("<input/>", {
        name: "product_name[]",
        hidden: true,
        type: "text",
        value: alimento.nombre
    }).appendTo(div_alimento);
    /* categoria */
    $("<input/>", {
        name: "category_name[]",
        hidden: true,
        type: "text",
        value: alimento.categoria
    }).appendTo(div_alimento);
    /* cantidad */
    $("<input/>", {
        name: "quantity[]",
        hidden: true,
        type: "text",
        value: alimento.cantidad
    }).appendTo(div_alimento);
    /* formato */
    $("<input/>", {
        name: "format_name[]",
        hidden: true,
        type: "text",
        value: alimento.formato
    }).appendTo(div_alimento);
    /* observación */
    $("<input/>", {
        name: "observation[]",
        hidden: true,
        type: "text",
        value: alimento.observation
    }).appendTo(div_alimento);
}

/* Remove element create comanda */
$(document).on("click", ".del_button", function () {
    $(this).parent().parent().remove();
});

let ruta = window.location.pathname;
if (ruta.startsWith("/comanda/create")) {
    $("#user_name").val($("#professor").val());
    $('#create_comanda_table').on('draw.dt', function () {
        checkDate();
    });
    $("#professor").change(function (e) {
        $("#user_name").val($("#professor").val());
        pendingOrder = false;
        let fecha = $('#orderDate').val();

        $('#carrito').children().remove();
        $('#inputsAddComanda').children().remove();
        if (fecha != "") {
            recuperaOrder(fecha, $('#user_name').val());
        }
    });
    if ($("#orderDate").val() != "") {
        $("#orderDatePOST").val($('#orderDate').val());
        $("#saveOrder").prop("disabled", false);
        $(".add-alimento").prop("disabled", false);
        getWeekDay();
        let fecha = $('#orderDate').val();
        $('#carrito').children().remove();
        $('#inputsAddComanda').children().remove();
        recuperaOrder(fecha, $('#user_name').val());
    }
}

function checkDate() {
    if ($('#orderDate').val() == "") {
        $(".add-alimento").prop("disabled", true);
    } else {
        $(".add-alimento").prop("disabled", false);
    }
}

$('#orderDate').on('change', function (e) {
    /* Assignar valor del input datePost al cambiar la fecha */
    e.preventDefault();
    if (pendingOrder && previousOrderDate != "") {
        console.log(previousOrderDate);
        $('#dateModal').modal('show');
    }else{
        if ($('#orderDate').val() == "") {
            $("#orderDatePOST").val("");
            $("#output").html("");
            $("#saveOrder").prop("disabled", true);
            $(".add-alimento").prop("disabled", true);
            $('#carrito').children().remove();
            $('#inputsAddComanda').children().remove();
        } else {
            $("#orderDatePOST").val($(this).val());
            $("#saveOrder").prop("disabled", false);
            $(".add-alimento").prop("disabled", false);

            getWeekDay();

            let fecha = $(e.target).val();
            if (!pendingOrder) {
                $('#carrito').children().remove();
                $('#inputsAddComanda').children().remove();
            } 
            recuperaOrder(fecha, $('#user_name').val());
        }
    }
});

$("#dateChangeConfirm").on("click", function(e){
    console.log(previousOrderDate);
    $("#orderDatePOST").val($("#orderDate").val());
    $("#saveOrder").prop("disabled", false);
    $(".add-alimento").prop("disabled", false);

    getWeekDay();

    $('#carrito').children().remove();
    $('#inputsAddComanda').children().remove();
    recuperaOrder($("#orderDate").val(), $('#user_name').val());
    previousOrdeDate = $("#orderDate").val();
    $('#dateModal').modal('hide');
    pendingOrder = false;
});

$("#dateChangeCancel").on("click", function(e){
    console.log(previousOrderDate);
    $('#orderDate').val(previousOrderDate);
    //$('#dateModal').modal('hide');
});

$("#orderDate").on('focus', function () {
    // Store the current value on focus and on change
    if(this.value != ""){
        previousOrderDate = $("#orderDate").val();
        console.log(previousOrderDate);
    }
});

/* Confirm si quiere guardar la comanda */
$('#sendFormComanda').click(function () {
    $('#formAddComanda').submit();
});

/* pasa la tabla del carrit al modal, quitando la opción de eliminar la fila */
$("#saveOrder").click(function () {
    let dinsTaula = $("#carrito_table").children().clone();
    console.log(dinsTaula);
    $($(dinsTaula[0]).children().children())[4].remove();
    $(dinsTaula[1]).attr("id", "carritoModal");

    let trs = $(dinsTaula[1]).children();

    //eliminar los inputs hiddens para evitar que se dupliquen los productos de la comanda y el botón de eliminar fila
    for (let i = 0; i < trs.length; i++) {
        $($(trs[i]).children())[9].remove();
        $($(trs[i]).children())[8].remove();
        $($(trs[i]).children())[7].remove();
        $($(trs[i]).children())[6].remove();
        $($(trs[i]).children())[5].remove();
        $($(trs[i]).children())[4].remove();
    }
    $("#saveOrderModal>div>div>.modal-body>table").html(dinsTaula);
});

let form = "";
/* Confirm si quiere borrar la comanda */
$('#deleteComanda').click(function (e) {
    $(form).submit();
});

//añade el id la fecha de entrega y el usuario de la comanda que se quiere eliminar
$(document).on('click', ".deleteOrder", (function (e) {
    form = $(e.target).parent();
    let tds = $(e.target).parent().parent().parent().children();
    $("#deleteOrderModal>div>div>.modal-body").html('<table class="table table-bordered table-striped bg-dark text-white">'+
    '<thead class="bg-dark text-white"><tr><th>Id</th><th>Data lliurament</th><th>usuari</th></tr></thead>'+
    '<tbody class="bg-light"><tr><td>' + $(tds[0]).text() + '</td><td>' + $(tds[4]).text() + '</td><td>' + $(tds[5]).text() + 
    '</td></tr></tbody></table>');
}));

/* Petición ajax con las líneas de productos de una comanda */
function recuperaOrder(fecha, user_name) {
    let data = "delivery_date=" + fecha + "&user_name=" + user_name;
    $.ajax({
        url: "/comanda/create/order_exist",
        type: "GET",
        data: data,
        async: true,
        success: function (result) {
            try {
                crearLineas(JSON.parse(result), user_name);
            } catch (e) {
                console.log(result);
            }

        },
        error: function () {
            console.log("error");
        }
    });
}

/* Crear las líneas de la comanda según el día seleccionado */
function crearLineas(result, user_name) {
    for (let i = 0; i < result.length; i++) {
        let alimento = {
            id: result[i].id,
            nombre: result[i].product_name,
            categoria: result[i].category_name,
            cantidad: result[i].quantity,
            formato: result[i].format_name,
            observation: result[i].observation

        }
        addProductoLista(alimento);
        $('#order_id').val(result[0].order_id);
        $('#user_name').val(user_name);
    }
}

/*****************************************************************
 * FUNCIONS PER INDEX.BLADE DE INFORMES
 * ***************************************************************
 */

/* Petición ajax para crear los select de forma dinámica */
function selects(delivery_date, delivery_month, selectId) {

    let yearOnly = "&yearOnly=false";
    if ($('select#month').val() == "") {
        yearOnly = "&yearOnly=true";
    }

    let data = "delivery_date=" + delivery_date + "&selectId=" + selectId + "&delivery_month=" + delivery_month + yearOnly;
    $.ajax({
        url: "/informes/selects",
        type: "GET",
        data: data,
        async: true,
        dataType: "json",
        success: function (result) {
            //console.log(result);
            if (selectId == 'month') {
                changeMonthSelect(result, selectId);
            }
            if (selectId == 'date') {
                changeDateSelect(result, selectId);
            }
            if (selectId == 'professor') {
                changeTeacherSelect(result, selectId);
            }
        },
        error: function () {
            console.log("error");
        }
    });
}

$('select#year').on('change', function (e) {
    $("select").not("#year").find('option').remove();
    $("select").not("#year").append('<option value="">Tots</option>');
    let tbody = $('#informe');
    tbody.find('tr').remove();
    let delivery_date = $(e.target).val();
    if (delivery_date != '') {
        $('button').prop("disabled", false);
        selects(delivery_date, '', 'month');
    } else {
        $('button').prop("disabled", true);
        let tr = "<tr class='table-warning'>\n" +
            "    <td colspan='8'>A el menys selecciona un any</td>\n" +
            "</tr>";
        tbody.append(tr);
    }
});

$('select#month').on('change', function (e) {
    let delivery_date = $('select#year').val() + "-" + $(e.target).val();
    if ($(e.target).val() != '') {
        selects(delivery_date, '', 'date');
        let delivery_month = delivery_date + "-01";
        selects('', delivery_month, 'professor');
        $('select#date').prop("disabled", false);
    } else {
        $("select").not("#year").not("#month").find('option').remove();
        $("select").not("#year").not("#month").append('<option value="">Tots</option>');
        let delivery_month = $('select#year').val() + "-01-01";
        selects('', delivery_month, 'professor');
        $('select#date').prop("disabled", true);
    }
});

$('select#date').on('change', function (e) {
    let delivery_date = $(e.target).val();
    if (delivery_date != '') {
        selects(delivery_date, '', 'professor');
    } else {
        let delivery_month = $('select#year').val() + "-" + $('select#month').val() + "-01";
        selects(delivery_date, delivery_month, 'professor');
    }
});

/* Evento clic del boton de buscar en informes */
$('#filtro').on('click', function (e) {
    let delivery_date = $('select#date').val();
    let delivery_month = "";
    let user_name = $('select#professor').val();
    let yearOnly = "";

    if (delivery_date == "" && $('select#month').val() != "") {
        delivery_month = $('select#year').val() + "-" + $('select#month').val() + "-01";
        yearOnly = "&yearOnly=false";
    } else if (delivery_date == "" && $('select#month').val() == "") {
        delivery_month = $('select#year').val() + "-01-01";
        yearOnly = "&yearOnly=true";
    }

    let data = "delivery_date=" + delivery_date + "&user_name=" + user_name + "&delivery_month=" + delivery_month + yearOnly;
    $.ajax({
        url: "/informes/resultado",
        type: "GET",
        data: data,
        async: true,
        success: function (result) {
            try {
                crearInforme(JSON.parse(result), delivery_date, user_name);
            } catch (e) {
                console.log(result);
            }

        },
        error: function () {
            console.log("error");
        }
    });
});

/* Evento clic del boton de imprimir en informes */
$(document).on("click", "#printReport", function (e) {

    let delivery_date = $('select#date').val();
    let user = $('select#professor').val();
    if (user == "") {
        user = "tots els professors";
    }
    let cabecera = "";

    // Cabecera para imprimir año, mes, data o profesores
    if (delivery_date == "") {
        let year = $('select#year').val();
        if (year != "") {
            cabecera += "<div class='col-4'><h4>Any: " + year + "</h4></div>";
        }

        let month = $('select#month').val();
        let monthText = $('select#month option:selected').text();
        if (month != "") {
            cabecera += "<div class='col-4'><h4>Mes: " + monthText + "</h4></div>";
        }

        cabecera += "<div class='col-4 text-right'><h4>Professor: " + user + "</h4></div>";

    } else {
        //Data de comanda
        let delivery_dateText = $('select#date option:selected').text();
        cabecera += "<div class='col-6'><h4>Data de lliurament: " + delivery_dateText + "</h4></div>" +
            "<div class='col-6 text-right'><h4>Professor: " + user + "</h4></div>";
    }

    let logo = "<div class='row'><div class='col'><img src='images/escola-hosteleria.png' id='logo' /></div>" + cabecera + "</div>";
    $('#cabecera').append(logo);

    let div = $("#preImprimir").html();
    imprimirElemento(div);

    $('#cabecera').children('div').remove();
});

// Imprimir desde una ventana nueva y con estilos el elemneto pasado por parámetro
function imprimirElemento(elemento) {
    var ventana = window.open('', 'PRINT', 'height=600,width=800');
    ventana.document.write('<html><head><title>' + document.title + '</title>');
    ventana.document.write('<link rel="stylesheet" href="css/imprimir.css">');
    ventana.document.write('</head><body >');
    ventana.document.write(elemento.innerHTML == undefined ? elemento : elemento.innerHTML);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.onload = function () {
        ventana.print();
        ventana.close();
    };
    return true;
}

function changeMonthSelect(result, selectId) {

    var month = {
        1: 'gener',
        2: 'febrer',
        3: 'març',
        4: 'abril',
        5: 'maig',
        6: 'juny',
        7: 'juliol',
        8: 'agost',
        9: 'setembre',
        10: 'octubre',
        11: 'novembre',
        12: 'desembre'
    };

    // Limpiamos el select
    $("#" + selectId).find('option').remove();
    $("#" + selectId).append('<option value="">Tots</option>');

    $.each(result[0], function (key, valor) {
        var selected = "";
        if (new Date().getFullYear() == $('select#year').val()) {
            if (result[1] == valor) {
                selected = ' selected';
            }
        }

        var pos = "";
        $.each(month, function (index, mes) {
            if (mes == valor) {
                pos = index;
            }
        });

        $("#" + selectId).append('<option value="' + pos + '"' + selected + '>' + valor + '</option>');
    });

    var delivery_date = $('select#year').val() + "-" + $('select#month').val();
    if ($('select#month').val() != '') {
        selects(delivery_date, '', 'date');
        let delivery_month = delivery_date + "-01";
        selects('', delivery_month, 'professor');
        $('select#date').prop("disabled", false);
    } else {
        let delivery_month = $('select#year').val() + "-01-01";
        selects('', delivery_month, 'professor');
        $('select#date').prop("disabled", true);
    }

}

function changeDateSelect(result, selectId) {
    // Limpiamos el select
    $("#" + selectId).find('option').remove();
    $("#" + selectId).append('<option value="">Tots</option>');

    $.each(result[0], function (key, valor) {
        var selected = "";
        if (new Date().getFullYear() == $('select#year').val()) {
            if (result[2] == valor) {
                var selected = ' selected';
            }
        }
        $("#" + selectId).append('<option value="' + result[1][key] + '"' + selected + '>' + valor + '</option>');
    });

    var delivery_date = $('select#date').val();
    if (delivery_date != '') {
        selects(delivery_date, '', 'professor');
    }
}

function changeTeacherSelect(result, selectId) {
    // Limpiamos el select
    $("#" + selectId).find('option').remove();
    $("#" + selectId).append('<option value="">Tots</option>');

    $.each(result, function (key, valor) {
        $("#" + selectId).append('<option value="' + valor + '">' + valor + '</option>');
    });
}

/* Crear las líneas del informe según el día y profesor seleccionado */
function crearInforme(result, delivery_date, user_name) {
    let tbody = $('#informe');
    tbody.find('tr').remove();

    for (let i = 0; i < result.length; i++) {
        for (let j = 0; j < result[i].length; j++) {
            let classTr = " class='odd'";
            if (j % 2 == 0) {
                classTr = " class='even'";
            }
            let tr = "<tr" + classTr + ">\n" +
                "    <td>" + result[i][j][0].id + " </td>\n" +
                "    <td>" + result[i][j][0].product_name + " </td>\n" +
                "    <td>" + result[i][j][0].category_name + " </td>\n" +
                "    <td>" + String(result[i][j][0].quantity).replace("\.", "\,") + " </td>\n" +
                "    <td>" + result[i][j][0].format_name + " </td>\n" +
                "    <td>" + (String(result[i][j][0].observation) == 'null' ? "-" : result[i][j][0].observation) + " </td>\n" +
                "    <td>" + result[i][j][1] + " </td>\n" +
                "    <td>" + result[i][j][2] + " </td>\n" +
                "</tr>";
            tbody.append(tr);
        }
    }
}

if (ruta == "/informe") {
    selects($('select#year').val(), '', 'month');
}

/*****************************************************************
 * FUNCIONS AJAX PER INDEX.BLADE DE COMANDAS
 * ***************************************************************
 */

if (ruta == "/") {
    recuperaOrderIndex();
    $("#week").change(recuperaOrderIndex);
    $("#professor").change(recuperaOrderIndex);
}

function recuperaOrderIndex() {
    let monday = $("#week").val().split("&")[0];
    let user_name = $("#professor").val();
    let dies = ["dilluns", "dimarts", "dimecres", "dijous", "divendres"];
    $.ajax({
        url: "/teacher_orders",
        type: "GET",
        data: "monday=" + monday + "&user_name=" + user_name,
        async: true,
        success: function (result) {
            try {
                resultat = JSON.parse(result);
                for (let i = 0; i < dies.length; i++) {
                    $(`#nav-${dies[i]}-tab`).html(`<b>${resultat[`${dies[i]}`].day_for}</b>`);
                    if (resultat[`${dies[i]}`].order_lines.length == 0) {
                        $(`#nav-${dies[i]}`).html(`<div class="alert alert-info my-3" role="alert">No s'ha realitzat ningúna comanda per aquest día</div>`);
                    } else {
                        let table = `<table class="table table-striped table-bordered">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>Producte</th>
                                                <th>Categoria</th>
                                                <th>Quantitat</th>
                                                <th>Format</th>
                                                <th>Observació</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                        for (let j = 0; j < resultat[`${dies[i]}`].order_lines.length; j++) {
                            table += `<tr>`
                            table += `<td>${resultat[`${dies[i]}`].order_lines[j].product_name}</td>`
                            table += `<td>${resultat[`${dies[i]}`].order_lines[j].category_name}</td>`
                            table += `<td>` + String(resultat[`${dies[i]}`].order_lines[j].quantity).replace(".", ",") + `</td>`
                            table += `<td>${resultat[`${dies[i]}`].order_lines[j].format_name}</td>`
                            if (resultat[`${dies[i]}`].order_lines[j].observation == null) {
                                table += `<td>-</td>`
                            } else {
                                table += `<td>${resultat[`${dies[i]}`].order_lines[j].observation}</td>`
                            }
                            table += `</tr>`
                        }
                        table += `</tbody></table>`
                        $(`#nav-${dies[i]}`).html(table);
                    }
                }
            } catch (e) {
                console.log(result);
            }

        },
        error: function () {
            console.log("error");
        }
    });
}

/* Get WeekDay in orderDate */
function getWeekDay() {
    let input = document.getElementById("orderDate").value;
    let date = new Date(input).getUTCDay();

    let weekday = ['Diumenge', 'Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge'];

    $("#output").html(weekday[date]);
    //  document.getElementById('output').textContent = weekday[date];
}


/*****************************************************************
 * FUNCIONS PER INDEX.BLADE
 * ***************************************************************
 */

/* Event del boton clic de imprimir */
$(document).on("click", "#printIndex", function (e) {
    e.preventDefault();
    let printContents = $("#nav-tabContent .active").html();
    let fecha = $("#nav-tab .active").html();
    let user = $("#professor").val();
    let cabecera = "<div class='col-6'><h4><u>Data de lliurament</u><br>" + fecha + "</h4></div>" +
        "<div class='col-6 text-right'><h4>Professor: " + user + "</h4></div>";

    let div = cabecera + printContents;
    let logo = "<div class='row'><div class='col'><img src='images/escola-hosteleria.png' id='logo' /></div>" + div + "</div>";
    imprimirElemento(logo);
});

/* Activa el dropdown */
$('.dropdown-toggle').dropdown();

/* ********************************************************
    FUNCIONS PER COMANDA.INDEX.BLADE I COMANDA.SHOW.BLADE
* ******************************************************** */

if (ruta.startsWith("/comanda")) {
    $('#index_orders_table').on('draw.dt', function () {
        $('.custom-switch>input[type="checkbox"]').off('change').on('change', function (e) {
            let checked = "";
            e.target.checked ? checked = 1 : checked = 0;

            let data = "id=" + e.target.id.split("-")[1] + "&checked=" + checked;
            $.ajax({
                type: "GET",
                url: "/comandas/updateOrderAjax",
                data: data,
                async: true,
                success: function (response) {}
            });
        });
    });
}

if (ruta.startsWith("/comanda/")) {
    $('#show-table .custom-switch>input[type="checkbox"]').off('change').on('change', function (e) {
        let received = "";
        e.target.checked ? received = 1 : received = 0;

        let data = "id=" + e.target.id.split("-")[1] + "&received=" + received;
        $.ajax({
            type: "GET",
            url: "/comandas/updateOrderLineAjax",
            data: data,
            async: true,
            success: function (response) {}
        });
    });
}
