$('.ui.dropdown.region').dropdown();



//import produit
Dropzone.options.importDropzoneRegion = {

    init: function () {

        this.on('addedfile', function (file) {
            swal("Fichier importé");
        })

    },

    dictDefaultMessage: "<i class=\"file huge excel outline icon\"></i>Deposer le fichiers pour les régions .csv ",
    thumbnailWidth: 400,
    thumbnailHeight: 100,
    maxFilesize: 2,
    timeout: 180000,


};






