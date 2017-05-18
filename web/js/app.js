const CURRENT_URL = window.location.href.split('#')[0].split('?')[0];


function archiveTask(e) {
    console.log(e);
    let url = 'http://localhost:8000/taches/archive/' + e;

    swal({
            title: "Achiver d'une action",
            text: "Voulez-vous vraiment archiver cet action ?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            allowOutsideClick: true,
            confirmButtonColor: "#d65d5d"
        },
        function () {
            $.ajax({

                // Adresse à laquelle la requête est envoyée
                url: url,

                // Le délai maximun en millisecondes de traitement de la demande
                timeout: 4000,

                // La fonction à apeller si la requête aboutie
                success: function (data) {
                    swal({
                        title: "Archiver une action",
                        text: "Action archivé",
                        type: "info",
                        showCancelButton: true,
                    });

                    let id = e;

                    $("#" + id).remove()
                },

                // La fonction à appeler si la requête n'a pas abouti
                error: function () {
                    console.log("error");

                }

            });


        });


}


//envoie de mail ajax
$('.mail-send').on('click', function (e) {

    let user = $(this).data('user');
    console.log(user);

    $.ajax({
        url: "/send/client/" + user,
        success: function (result) {
            console.log(result);
        }
    });
});


//sidebar
$('#menu_toggle').on('click', function () {
    console.log('clicked - menu toggle');

    if ($('body').hasClass('nav-md')) {
        $('#sidebar-menu').find('li.active ul').hide();
        $('#sidebar-menu').find('li.active').addClass('active-sm').removeClass('active');
    } else {
        $('#sidebar-menu').find('li.active-sm ul').show();
        $('#sidebar-menu').find('li.active-sm').addClass('active').removeClass('active-sm');
    }

    $('body').toggleClass('nav-md nav-sm');


});


//menu deroulant
$('#sidebar-menu').find('a').on('click', function (ev) {
    console.log('clicked - sidebar_menu');

    var $li = $(this).parent();

    if ($li.is('.active')) {
        $li.removeClass('active active-sm');
        $('ul:first', $li).slideUp(function () {

        });
    } else {
        // prevent closing menu if we are on child menu
        if (!$li.parent().is('.child_menu')) {
            $('#sidebar-menu').find('li').removeClass('active active-sm');
            $('#sidebar-menu').find('li ul').slideUp();
        } else {
            if ($('body').is(".nav-sm")) {
                $('#sidebar-menu').find("li").removeClass("active active-sm");
                $('#sidebar-menu').find("li ul").slideUp();
            }
        }
        $li.addClass('active');

        $('ul:first', $li).slideDown(function () {
        });
    }

});


// check active menu
$('#sidebar-menu').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

$('#sidebar-menu').find('a').filter(function () {
    return this.href == CURRENT_URL;
}).parent('li').addClass('current-page').parents('ul').slideDown(function () {
}).parent().addClass('active');

$('.menu .item')
    .tab()
;


$('#siret-client').mask('000 000 000 00000');
$('#tel-client').mask('00 00 00 00 00 ');
$('#dtadh-client').datepicker({
    altField: "#datepicker",
    closeText: 'Fermer',
    prevText: 'Précédent',
    nextText: 'Suivant',
    currentText: 'Aujourd\'hui',
    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
    weekHeader: 'Sem.',
    dateFormat: 'd/mm/yy'

});


$('.trash').on('click', function (e) {
    archiveTask(e.currentTarget.id);
});


$('.zone-submit-new button').on('click', function () {

    console.log($('.client-new').val());

});


$('#btn-new-cl').on('click', function (e) {

    e.preventDefault();

    let query = $('#usr').val();

    let tpl = "/client/new?raison-soc=" + query;

    let loc = window.location.origin + tpl;
    console.log(loc);
    window.location.replace(loc);


});
