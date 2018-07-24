$('.ui.dropdown.consommation').dropdown();


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


        });

    },

    // La fonction à appeler si la requête n'a pas abouti
    error: function () {

    }

});



Dropzone.options.importDropzone = {

    init: function () {

        this.on('addedfile', function (file) {
            swal("Fichier importé");
        })

    },

    dictDefaultMessage: "<i class=\"file huge excel outline icon\"></i>Deposer le fichiers .csv ou <span class='button huge ui'>Choisir un fichier</span>",
    thumbnailWidth: 400,
    thumbnailHeight: 100,

};





//import produit
Dropzone.options.importDropzoneProduit = {

    init: function () {

        this.on('addedfile', function (file) {
            swal("Fichier importé");
        })

    },

    dictDefaultMessage: "<i class=\"file huge excel outline icon\"></i>Deposer le fichiers .csv ",
    thumbnailWidth: 400,
    thumbnailHeight: 100,

};


//import produit
Dropzone.options.importDropzoneConso = {

    init: function () {

        this.on('addedfile', function (file) {
            swal("Fichier importé");
        })

    },

    dictDefaultMessage: "<i class=\"file huge excel outline icon\"></i>Deposer le fichiers .csv ",
    thumbnailWidth: 400,
    thumbnailHeight: 100,
    maxFilesize: 2,
    timeout: 180000,


};





$('#fourn-import-conso').click(function (e) {

    console.log('test')

});



