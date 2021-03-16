require('./bootstrap');
/* $(document).ready(function() {
    startTable();
});


function startTable() {

    $("table").tablesorter({
            theme: "bootstrap",

            widthFixed: true,

            widgets: ["filter", "columns", "zebra"],

            widgetOptions: {
                zebra: ["even", "odd"],

                columns: ["primary", "secondary", "tertiary"],

                filter_reset: ".reset",

                filter_cssFilter: [
                    'form-control',
                    'form-control custom-select', // select needs custom class names :(
                    'form-control',
                    'form-control'
                ]

            }
        })
        .tablesorterPager({

            container: $(".ts-pager"),

            cssGoto: ".pagenum",

            removeRows: false,

            output: '{startRow} - {endRow} / {filteredRows} || Total alimentos ({totalRows})'

        });

};

 */
/**   Funcion  para añadir al carrito */

/* $(".add-alimento").click(function(e) {
    e.preventDefault();
    let id_alimento = parseInt($(this).parent().parent().attr("id"));
    let nombre_alimento = $("#" + id_alimento).children()[0]["innerHTML"];
    let category_alimento = $("#" + id_alimento).children()[1]["innerHTML"];
    let n_alimentos = $("#" + id_alimento + " input").val();
    if (parseInt(n_alimentos) && n_alimentos > 0) {
        console.log(nombre_alimento, category_alimento, n_alimentos)
        $("#" + id_alimento + " input").val("");
    } else {
        alert("Aliment amb quantitat incorrecte");
    }


}); */


/* function añadirProductoLista(idAlimento) {
    $("<div/>", {
            "class": "row alimento_added px-2 py-4 my-2",
            text: "Click me!",
            click: function() {
                $(this).toggleClass("test");
            }
        })
        .appendTo("body");
} */