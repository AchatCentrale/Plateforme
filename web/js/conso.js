$('.ui.dropdown.consommation').dropdown();






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






