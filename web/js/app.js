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


// $(".input-for-search").on('change', function (e) {
//     console.log($(this).val());
//
//
//     let url = "http://localhost:8000/client/All";
//
//     $.ajax({
//         url: url,
//         data: 'query=' + $(this).val(),
//
//         success: function (data) {
//             console.log(data.length);
//             let tpl = "";
//             for (let value in data) {
//
//
//                 tpl += ` <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
//                                     <div class="well profile_view">
//                                         <div class="col-sm-12">
//
//                                             <h4 class="brief label label-warning"><i>${data[value].SO_RAISONSOC}</i></h4>
//                                             <div class="left col-xs-7">
//                                                 <h2>${data[value].CL_RAISONSOC}</h2>
//                                                 <p><strong>REF </strong> ${data[value].CL_REF}
//                                                 </p>
//                                                 <ul class="list-unstyled">
//                                                     <li><i class="fa fa-building"></i>
//                                                         Adresse: ${data[value].CL_CP} ${data[value].CL_VILLE}</li>
//
//                                                 </ul>
//                                             </div>
//                                             <div class="right col-xs-5 text-center">
//                                                 <img src="http://gentelella.herokuapp.com/assets/images/user.png"
//                                                      alt="" class="img-circle img-responsive">
//                                             </div>
//                                         </div>
//                                         <div class="col-xs-12 bottom text-center">
//                                             <div class="col-xs-12 col-sm-6 emphasis">
//                                                 <p class="ratings">
//                                                     <span class="label label-primary">Status</span>
//                                                 </p>
//                                             </div>
//                                             <div class="col-xs-12 col-sm-6 emphasis">
//
//                                                  <a href="http://localhost:8000/client/${data[value].CL_ID}/${data[value].SO_RAISONSOC}/general"
//                                                    class="btn btn-success" role="button"><i class="fa fa-user"> </i>
//                                                     Voir le
//                                                     profil</a>
//
//                                             </div>
//                                         </div>
//                                     </div>
//                                 </div>`;
//             }
//
//
//             $('.client-all').html(tpl);
//             $('#count-client').html(`Il y a ${data.length} clients`)
//
//
//         },
//         error: function () {
//             alert('La requête n\'a pas abouti');
//         }
//     })
//
// });
//
//
// // $('.img-centrale').on('click', function (e) {
// //     $('.table-client-all').html("");
// //
// //     let url = "http://localhost:8000/client/All";
// //
// //     let centrale = $(this).data("centrale");
// //
// //     $.ajax({
// //         url: url,
// //         data: 'centrale=' + centrale,
// //
// //         success: function (data) {
// //             $('.client-all').html("");
// //
// //             console.log(data);
// //             let tpl = "";
// //             for (let value in data) {
// //
// //
// //                 tpl += ` <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
// //                                     <div class="well profile_view">
// //                                         <div class="col-sm-12">
// //
// //                                             <h4 class="brief label label-warning"><i>${centrale}</i></h4>
// //                                             <div class="left col-xs-7">
// //                                                 <h2>${data[value].CL_RAISONSOC}</h2>
// //                                                 <p><strong>REF </strong> ${data[value].CL_REF}
// //                                                 </p>
// //                                                 <ul class="list-unstyled">
// //                                                     <li><i class="fa fa-building"></i>
// //                                                         Adresse: ${data[value].CL_CP} ${data[value].CL_VILLE}</li>
// //
// //                                                 </ul>
// //                                             </div>
// //                                             <div class="right col-xs-5 text-center">
// //                                                 <img src="http://gentelella.herokuapp.com/assets/images/user.png"
// //                                                      alt="" class="img-circle img-responsive">
// //                                             </div>
// //                                         </div>
// //                                         <div class="col-xs-12 bottom text-center">
// //                                             <div class="col-xs-12 col-sm-6 emphasis">
// //                                                 <p class="ratings">
// //                                                     <span class="label label-primary">Status</span>
// //                                                 </p>
// //                                             </div>
// //                                             <div class="col-xs-12 col-sm-6 emphasis">
// //
// //                                                 <a href="http://localhost:8000/client/${data[value].CL_ID}/${centrale}/general"
// //                                                    class="btn btn-success" role="button"><i class="fa fa-user"> </i>
// //                                                     Voir le
// //                                                     profil</a>
// //
// //                                             </div>
// //                                         </div>
// //                                     </div>
// //                                 </div>`;
// //             }
// //
// //
// //             $('.client-all').html(tpl);
// //             $('#count-client').html(`Il y a ${data.length} clients`);
// //
// //
// //
// //         },
// //         error: function () {
// //             alert('La requête n\'a pas abouti');
// //         }
// //     })
// // })


$('#siret-client').mask('000 000 000 00000');
$('#siret-update').mask('000 000 000 00000');
$('#tel-client').mask('00 00 00 00 00 ');
$('#Téléphone-update').mask('00 00 00 00 00 ');
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


$('.check').on('click', function (e) {
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

var table = $('#client-all').DataTable({
    "colReorder": true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json"
    },
    "dom": '<"el_top_tables"' +
    '<l><"input-top-tables"f><p>' +
    '>' +
    't' +
    '<"el_bottom_tables"' +
    '<l><i><p>' +
    '>'


});


$("form input.date").datepicker({
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

$('.go-to-client').on('click', function () {
    console.log(CURRENT_URL);

    let centrale = $(this).data('centrale');
    let id = $(this).data('id');

    window.location.replace(CURRENT_URL + "/" + id + "/" + centrale + "/general");

});


$('.img-centrale').on('click', function (e) {

    let centrale = $(this).data('centrale');


    if (centrale === "all") {
        table
            .search('')
            .columns().search('')
            .draw();

    } else {
        table
            .search(centrale)
            .column(1)
            .draw();
    }


});


$('.detail-tache').on("click", function (e) {

    let id = $(this).closest("tr").data('task');

    let aidy = Number(id);


    let url = CURRENT_URL + "/detail/" + aidy;
    console.log(url);

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            let el = $('.body-task-detail');

            let title = `<p>tâche #${data.id}</p>`;

            $('.modal-title-task').append( title );




            let tpl = `<p>${data.id}</p>`;


            el.append( tpl );


            console.log(el);


            $('#modal-task').modal('show')


        },
        error: function (e) {
            console.error(e);
        }


    });



});

$('.save-update-client').on('click', function (e) {

    let values = $("input[name='data-client[]'], select[name='data-client[]']")
        .map(function(){
            return $(this).val();
        }
        ).get();


   console.log(values);

    let url = CURRENT_URL.substring(0, 60) + "update";

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        type : 'POST',


        data: {
            siret : values[0].replace(/\s/g,''),
            mail : values[1],
            tel : values[2].replace(/\s/g,''),
            cp : values[3],
            eff : values[4],
            ca : values[5],
            adresse : values[6],
            ville : values[7],

        },
        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            console.log(data);

            window.location.reload();
        },

        // La fonction à appeler si la requête n'a pas abouti
        error: function (e) {
            console.log(e);

        }

    });




    $('#myModal').modal('hide')

});


$('.add-note').on('click', function (e) {

    let $input = $('#add-note').val();


    let url = CURRENT_URL.substring(0, 60) + "notes/add";

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        type : 'POST',


        data: {
            content_note : $input

        },
        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            console.log(data);

            window.location.reload();
        },

        // La fonction à appeler si la requête n'a pas abouti
        error: function (e) {
            console.log(e);

        }

    });


});



$('#isGenerique').on('click', function (e) {

    if(document.getElementById("achatcentrale_crmbundle_clientstaches_cl").disabled === true){
        $('#achatcentrale_crmbundle_clientstaches_cl').prop("disabled", false);

    }else if(document.getElementById("achatcentrale_crmbundle_clientstaches_cl").disabled === false){
        $('#achatcentrale_crmbundle_clientstaches_cl').prop("disabled", true);

    }else{
        alert('error');
    }





});



