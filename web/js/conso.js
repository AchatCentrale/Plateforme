let urlConso = "http://localhost:8000/client/consommation/test";

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
            colHeaders: ["Date", "CA Prix public", "CA Prix centrale", "Fournisseurs" ],
            rowHeaders: true,
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
                {row: 16, col: 0, rowspan: 2, colspan: 1},
                {row: 18, col: 0, rowspan: 2, colspan: 1},
                {row: 20, col: 0, rowspan: 2, colspan: 1},
                {row: 22, col: 0, rowspan: 2, colspan: 1},
                {row: 25, col: 0, rowspan: 2, colspan: 1},

            ]

        });

    },

    // La fonction à appeler si la requête n'a pas abouti
    error: function () {

    }

});



Dropzone.options.importDropzone = {

    init: function () {

        this.on('addedfile', function (file) {
            swal("Added file.");
        })

    },

    dictDefaultMessage: "<i class=\"file huge excel outline icon\"></i>Deposer le fichiers .csv ou <span class='button huge ui'>Choisir un fichier</span>",
    thumbnailWidth: 400,
    thumbnailHeight: 100,

};