let urlConso = "http://localhost:8000/client/consommation/test";





// let container = document.getElementById('table-conso-client');
// let hot = new Handsontable(container, {
//     rowHeaderWidth: 1200,
//     colHeaders: true,
//     currentHeaderClassName: 'ht__highlight',
//     contextMenu: true,
//     debug: true,
//     manualColumnResize: true,
//     manualRowResize: true,
//     colWidths: [150, 60, 130, 130],
//     currentRowClassName: 'currentRow',
//     mergeCells: [
//         {row: 0, col: 0, rowspan: 2, colspan: 1},
//         {row: 2, col: 0, rowspan: 2, colspan: 1},
//         {row: 4, col: 0, rowspan: 2, colspan: 1},
//         {row: 6, col: 0, rowspan: 2, colspan: 1},
//         {row: 8, col: 0, rowspan: 2, colspan: 1},
//         {row: 10, col: 0, rowspan: 2, colspan: 1},
//         {row: 12, col: 0, rowspan: 2, colspan: 1},
//         {row: 14, col: 0, rowspan: 2, colspan: 1},
//         {row: 17, col: 0, rowspan: 2, colspan: 1},
//         {row: 19, col: 0, rowspan: 2, colspan: 1},
//         {row: 21, col: 0, rowspan: 2, colspan: 1},
//         {row: 23, col: 0, rowspan: 2, colspan: 1},
//         {row: 25, col: 0, rowspan: 2, colspan: 1},
//
//     ]
// });


$.ajax({

    // Adresse à laquelle la requête est envoyée
    url: urlConso,

    // Le délai maximun en millisecondes de traitement de la demande
    timeout: 4000,

    // La fonction à apeller si la requête aboutie
    success: function (dataConso) {
            let
                container3 = document.getElementById('table-conso-client'),
                hot3;

        hot3 = new Handsontable(container3, {
            data: dataConso,
            colHeaders: true,
            minSpareRows: 1,
            mergeCells: [
                {row: 0, col: 0, rowspan: 2, colspan: 1},
                {row: 2, col: 0, rowspan: 2, colspan: 1},
                {row: 4, col: 0, rowspan: 2, colspan: 1},
                {row: 6, col: 0, rowspan: 2, colspan: 1},
                {row: 8, col: 0, rowspan: 2, colspan: 1},
                {row: 10, col: 0, rowspan: 2, colspan: 1},
                {row: 12, col: 0, rowspan: 2, colspan: 1},
                {row: 14, col: 0, rowspan: 2, colspan: 1},
                {row: 17, col: 0, rowspan: 2, colspan: 1},
                {row: 19, col: 0, rowspan: 2, colspan: 1},
                {row: 21, col: 0, rowspan: 2, colspan: 1},
                {row: 23, col: 0, rowspan: 2, colspan: 1},
                {row: 25, col: 0, rowspan: 2, colspan: 1},

            ]
        });

    },

    // La fonction à appeler si la requête n'a pas abouti
    error: function () {

    }

});