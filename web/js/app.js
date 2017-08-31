(function ($, sr) {
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced() {
            var obj = this, args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    };

    // smartresize
    jQuery.fn[sr] = function (fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };

})(jQuery, 'smartresize');


let $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');


// Sidebar
function init_sidebar() {
    var setContentHeight = function () {
        // reset height

        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        // normalize content
        contentHeight -= $NAV_MENU.height() + footerHeight;

    };

    $SIDEBAR_MENU.find('a').on('click', function (ev) {
        console.log('clicked - sidebar_menu');
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function () {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                $SIDEBAR_MENU.find('li ul').slideUp();
            } else {
                if ($BODY.is(".nav-sm")) {
                    $SIDEBAR_MENU.find("li").removeClass("active active-sm");
                    $SIDEBAR_MENU.find("li ul").slideUp();
                }
            }
            $li.addClass('active');

            $('ul:first', $li).slideDown(function () {
                setContentHeight();
            });
        }
    });

// toggle small or large menu
    $MENU_TOGGLE.on('click', function () {
        console.log('clicked - menu toggle');

        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }

        $BODY.toggleClass('nav-md nav-sm');

        setContentHeight();
    });

    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function () {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function () {
        setContentHeight();
    });

    setContentHeight();

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel: {preventDefault: true}
        });
    }
};
// /Sidebar

var randNum = function () {
    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
};


// Panel toolbox
$(document).ready(function () {
    $('.collapse-link').on('click', function () {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');

        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function () {
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200);
            $BOX_PANEL.css('height', 'auto');
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});
// /Panel toolbox


const CURRENT_URL = window.location.href.split('#')[0].split('?')[0];

moment.locale('fr');

function terminerTask(e) {
    console.log(e);
    let url = 'http://localhost:8000/taches/terminer/' + e;

    swal({
            title: "Terminer une action",
            text: "Avez-vous vraiment terminer la tâche ?",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Oui",
            cancelButtonText: "Annuler",
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
                        title: "Action terminé",
                        text: "Action terminé",
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Super !",

                    });

                    location.reload();
                },

                // La fonction à appeler si la requête n'a pas abouti
                error: function () {
                    console.log("error");

                }

            });


        });


}


function unArchiveTask(e) {
    console.log(e);
    let url = 'http://localhost:8000/taches/unarchive/' + e;

    swal({
            title: "Achiver d'une action",
            text: "Voulez-vous vraiment désarchiver cet action ?",
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
                        title: "Désarchiver une action",
                        text: "Action désaarchivé",
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
$('#siret-update').mask('000 000 000 00000');
$('#tel-client').mask('00 00 00 00 00 ');
$('#tel-user').mask('00 00 00 00 00 ');
$('#Téléphone-update').mask('00 00 00 00 00 ');
$('#Téléphone-user-update').mask('00 00 00 00 00 ');
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
    dateFormat: 'd/mm/yy',
    firstDay: 1,

});


$('.check').on('click', function (e) {
    terminerTask(e.currentTarget.id);
});
$('.uncheck').on('click', function (e) {
    unArchiveTask(e.currentTarget.id);
});





$('#btn-new-cl').on('click', function (e) {

    $('#modal-insert-client-new').modal('show');


});

let table = $('#client-all').DataTable({
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
    dateFormat: 'd/mm/yy',
    firstDay: 1,

});

$('.go-to-client').on('click', function () {

    let centrale = $(this).data('centrale');

    switch (centrale) {
        case "CENTRALE ROC ECLERC":
            centrale = 'ROC_ECLERC';
            break;
        case "ACHAT CENTRALE":
            centrale = 'ACHAT_CENTRALE';
            break;
        case "CENTRALE GCCP":
            centrale = 'CENTRALE_GCCP';
            break;
        case "CENTRALE PFPL":
            centrale = 'CENTRALE_PFPL';
            break

    }

    console.log(centrale);

    let id = $(this).data('id');

    window.location.replace(CURRENT_URL + "/" + id + "/" + centrale + "/general");

});


function stateTask(state) {

    state = parseInt(state);

    switch (state) {
        case 0:
            return '<p class="pastille-detail blue" ></p> Non commencée';
            break;
        case 1:
            return '<p class="pastille-detail orange" ></p> En cours';
            break;
        case 2:
            return '<p class="pastille-detail green" ></p> Terminé ';
            break;
        case 3:
            return '<p class="pastille-detail red" ></p> En attente de quelqu\'un d\'autre ';
            break;
        case 4:
            return '<p class="pastille-detail purple" ></p> Reportée';
            break;
        default:
            break;

    }


}

$('.detail-tache').on("click", function (e) {

    let id = $(this).closest("tr").data('task');
    let idCentrale = $(this).closest("tr").data('centrale');

    let aidy = Number(id);
    let aidyCentrale = Number(idCentrale);


    let url = CURRENT_URL + "/detail/" + aidyCentrale + "/" + aidy;
    console.log(url);
    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            let el = $('.body-task-detail');
            $('.modal-title-task').empty();
            el.empty();

            let title = `<p>Tâche #${data.id}</p>`;

            $('.modal-title-task').append(title);


            let tpl = `<h4>${data.nom}</h4>
                    <div class="detail-tache-etat">
                       <div class="state-tache-detail">
                            ${ stateTask(data.statut) }
                        </div>
                        <div class="change-statut-tache">
                       <div class="dropup">
                          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Changer le statut de la tache
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="${CURRENT_URL + "/etat/0/" + data.id + "/" + data.idCentrale}">Non commencée</a></li>
                            <li><a href="${CURRENT_URL + "/etat/1/" + data.id + "/" + data.idCentrale}">En cours</a></li>
                            <li><a href="${CURRENT_URL + "/etat/2/" + data.id + "/" + data.idCentrale }">Terminée</a></li>
                            <li><a href="${CURRENT_URL + "/etat/3/" + data.id + "/" + data.idCentrale }">Attente de quelqu'un d'autre</a></li>
                            <li><a href="${CURRENT_URL + "/etat/4/" + data.id + "/" + data.idCentrale }">Reportée</a></li>

                          </ul>
                        </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="ui centered  grid">
                           
                            <div class="one column row">
                                <div class="column">
                                    <p>Assigné à : </p>
                                    <a class="ui image label">
                                      <img src="https://semantic-ui.com/images/avatar/small/joe.jpg">
                                       ${data.user}
                                    </a>
                                    
                                 
                                </div>
    
                            </div>
                            <div class="one column row">
                                <div class="column">
                                    <h5>Description de la tâche a éfféctuer :</h5>
                                    <p class="task-description">${data.descr}</p>
                                </div>
    
                            </div>
                            <div class="two column row">
                                <div class="column">
                                    <h4>Créée ${data.creation} </h4>
                                </div>
                                <div class="column">
                                    <h4>A terminer avant le ${data.echeance}</h4>
                                </div>
                            </div>
                            <div class="three column row">
                               
                              
                                
                                   
                                </div>
                               <div class="three column  row">
                                  
                                  <div class="update-action">
                                        <a class="ui basic button update-task-btn" href="/taches/update/${data.id}/${data.idCentrale}">Modifier l'action</a>
                                  </div>
                                  
                                  
                                  
                                   <div class="archive-action">
                                        <a class="ui basic button" href="/taches/archive/${data.id}/${data.idCentrale}"><i class="archive icon"></i>
                                           Archiver l'action</a>
                                   </div>
                                  
                                  
                                  <div class="archive-action">
                                        <a class="ui red basic button" href="/taches/delete/${data.id}/${data.idCentrale}"><i class="delete icon"></i>
                                           Supprimer l'action</a>
                                   </div>
                                   
                                  
                                </div>
                            
                            
                               
                            </div>
                                         
                            
                    </div>`;


            el.append(tpl);


            $('#modal-task').modal('show')


        },
        error: function (e) {
            console.error(e);
        }


    });


});

$('.save-update-client').on('click', function (e) {

    let values = $("input[name='data-client[]'], select[name='data-client[]']")
        .map(function () {
                return $(this).val();
            }
        ).get();

    let centrale = $('#centrale').html();
    let id = $('#id').html();
    let url = "http://crm.achatcentrale.fr/client/" + id + "/" + centrale + "/update";

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,
        type: 'POST',
        data: {
            siret: values[0].replace(/\s/g, ''),
            mail: values[1],
            tel: values[2].replace(/\s/g, ''),
            cp: values[3],
            eff: values[4],
            ca: values[5],
            adresse: values[6],
            ville: values[7],
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


    let url = CURRENT_URL.replace("general", "notes/add");

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        type: 'POST',


        data: {
            content_note: $input

        },
        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            console.log(data);
            $('input#add-note').empty();
            window.location.reload();
        },

        // La fonction à appeler si la requête n'a pas abouti
        error: function (e) {
            console.log(e);

        }

    });


});


$('#isGenerique').on('click', function (e) {


    //el disabled or not
    let el = $('#client-isDisabled');


    switch (e.target.checked){
        case true:
            el.attr('disabled','disabled');
            break;
        case false:
            el.removeAttr('disabled');
            break;
    }



});


$('.text-hover-edit').on('click', function () {
    $('#logo-edit').modal('show')

});


$('.statut-client-edit').on('click', function () {
    $(this).hide();
    $('#select-statut-edit-client').show();
});


$('#select-statut-edit-client').on('change', function (e) {


    let url = CURRENT_URL.substring(0, 53) + "/update/statut";
    console.log(url);

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        type: 'POST',


        data: {
            statut: e.target.value,


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


$('.edit-client-user').on('click', function () {






    $('#update_user_client').modal('show');


});


$('.detail-tache-home').on('click', function (e) {

    let id = $(this).data('id');
    let idCentrale = $(this).data('centrale');

    let aidy = Number(id);
    let aidyCentrale = Number(idCentrale);


    let url = CURRENT_URL + "taches/detail/" + aidyCentrale + "/" + aidy;
    console.log(url);

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            let el = $('.body-task-detail-home');
            $('.modal-title-task-home').empty();
            el.empty();

            let title = `<p>Tâche #${data.id}</p>`;

            $('.modal-title-task-home').append(title);


            console.log(data);


            let tpl = `<h4>${data.nom}</h4>
              <div class="detail-tache-etat">
                      <div class="state-tache-detail">
                            ${ stateTask(data.statut) }
                        </div>
                        <div class="change-statut-tache">
                       <div class="dropup">
                          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Changer le statut de la tache
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="${CURRENT_URL + "taches/etat/0/" + data.id + "/" + data.idCentrale}">Non commencé</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/1/" + data.id + "/" + data.idCentrale}">En cours</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/2/" + data.id + "/" + data.idCentrale}">Terminé</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/3/" + data.id + "/" + data.idCentrale}">Attente de quelqu'un d'autre</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/4/" + data.id + "/" + data.idCentrale}">Reportée</a></li>

                          </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="ui centered  grid">
                           
                            <div class="one column row">
                                <div class="column">
                                    <p>Assigné à : </p> 
                                    <a class="ui image label">
                                      <img src="https://semantic-ui.com/images/avatar/small/elliot.jpg">
                                      ${data.user}
                                    </a>
                                </div>
    
                            </div>
                            <div class="one column row">
                                <div class="column">
                                    <h5>Description de la tâche a éfféctuer :</h5>
                                    <p class="task-description">${data.descr}</p>
                                </div>
    
                            </div>
                            <div class="two column row">
                                <div class="column">
                                    <h4>Créée ${data.creation} </h4>
                                </div>
                                <div class="column">
                                    <h4>A terminer avant le ${data.echeance}</h4>
                                </div>
                            </div>
                            <div class="three column row">
                               
                               
                                
                                   
                                </div>
                            
                               <div class="three column  row">
                              
                               <div class="update-action">
                                        <a class="ui basic button" href="#">Modifier l'action</a>
                                  </div>
                                  
                                  
                                  
                               <div class="archive-action">
                                    <a class="ui basic button" href="/taches/archive/${data.id}/${data.idCentrale}"><i class="archive icon"></i>
                                    Archiver l'action</a>
                               </div>
                                  
                               <div class="archive-action">
                                        <a class="ui red basic button" href="/taches/delete/${data.id}/${data.idCentrale}"><i class="delete icon"></i>
                                           Supprimer l'action</a>
                                   </div>
                                   
                               
                              
                            </div>
                            
                            
                               
                            </div>
                            <div class="suite-task">
                            
                            </div>
                                                       
                            
                    </div>`;


            el.append(tpl);


            $('#modal-detail-task-home').modal('show')


        },
        error: function (e) {
            console.error(e);
        }


    });


});

function showHideEl(element) {
    if ($(element).is(":visible")) {
        element.hide().fadeOut("slow");
        $(this).html('Afficher plus')
    } else {
        element.show().fadeIn("slow");
        $(this).html('Afficher moins')

    }
}


$('#afficherplus-detail').on('click', function () {

    el = $('#detail-client-content');

    showHideEl(el);

    $(this).html('Afficher moins')


});


$('#afficherplus-historique').on('click', function () {

    el = $('.historique-client-content');


    showHideEl(el);

});

$('.client-user-new').on('click', function () {

    $('#client-user-new').show();

});

$('.new-clients-user').on('click', function (e) {


    let values = $("input[name='data-user[]'], select[name='data-user[]']")
        .map(function () {
                return $(this).val();
            }
        ).get();

    let centrale = $('#centrale').html();
    let id = $('#id').html();

    let url = "http://crm.achatcentrale.fr/client/" + id + "/" + centrale + "/users/new";


    console.log(values);
    console.log(url);

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        type: 'POST',


        data: {
            prenom: values[0],
            mail: values[1],
            fonction: values[2],
            profil: values[3],
            nom: values[4],
            pwd: values[5],
            tel: values[6].replace(/\s/g, ''),
            niveau: values[7],
            CCvalidation: values[8],

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


    $('#client-user-new').modal('hide')
});


// $(".text-area-validation").on("keydown", function(e){
//
//     $('#countTextarea').empty();
//
//   let count = $('.text-area-validation').val().length;
//
//   console.log(count);
//
//
//   $('#countTextarea').html('<p>'+ count  +'/150</p>');
//
//   if(count > 145){
//       $('.text-area-validation').addClass('border-red');
//
//   }
//
// });

$('.ui.search')
    .search({
        apiSettings: {
            url: 'http://crm.achatcentrale.fr/user/search/{query}'
        },
        searchOnFocus: true,
        fields: {
            results: 'items',
            title: 'US_ID',
            description: 'US_PRENOM',
        },
        minCharacters: 2,
        error: {
            source: 'Pas de source',
            noResults: 'Pas de resultat',
            logging: 'Error in debug logging, exiting.',
            noTemplate: 'A valid template name was not specified.',
            serverError: 'Problème de seerveur',
            maxResults: 'Results must be an array to use maxResults setting',
            method: 'The method you called is not defined.'
        },
    })
;


$('.ui.search.clients-auto')
    .search({
        apiSettings: {
            url: 'http://crm.achatcentrale.fr/client/search/{query}/' + $('#centrale').html()
        },
        searchOnFocus: true,
        fields: {
            results: 'items',
            title: 'CL_ID',
            description: 'CL_RAISONSOC',
        },
        minCharacters: 2,
        error: {
            source: 'Pas de source',
            noResults: 'Pas de resultat',
            logging: 'Error in debug logging, exiting.',
            noTemplate: 'A valid template name was not specified.',
            serverError: 'Problème de seerveur',
            maxResults: 'Results must be an array to use maxResults setting',
            method: 'The method you called is not defined.'
        },

    })
;


$('.detail-tache-home-client').on('click', function (e) {


    let centrale = $('#centrale').html();
    let aidyCentrale = 0;


    if (centrale === "CENTRALE_FUNECAP") {
        aidyCentrale = 4;

    } else if (centrale === 'CENTRALE_GCCP') {

        aidyCentrale = 2;

    } else if (centrale === 'CENTRALE_PFPL') {

        aidyCentrale = 5
    } else if (centrale === 'ROC_ECLERC') {
        aidyCentrale = 6
    } else if (centrale === 'ACHAT_CENTRALE') {
        aidyCentrale = 1;
    }


    let id = $(this).data('id');


    let aidy = Number(id);


    let url = "//crm.achatcentrale.fr/taches/detail/" + aidyCentrale + "/" + aidy;
    console.log(url);

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            let title = `<p>Tâche #${data.id}</p>`;
            let el = $('.modal-content-client-detail-action');

            $('.modal-title-task-client-detail').empty()
                .append(title);
            el.empty();


            let tpl = `<h4>${data.nom}</h4>
              <div class="detail-tache-etat">
                      <div class="state-tache-detail">
                            ${ stateTask(data.statut) }
                        </div>
                        <div class="change-statut-tache">
                       <div class="dropup">
                          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Changer le statut de la tache
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="${CURRENT_URL + "taches/etat/0/" + data.id + "/" + data.idCentrale}">Non commencé</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/1/" + data.id + "/" + data.idCentrale}">En cours</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/2/" + data.id + "/" + data.idCentrale}">Terminé</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/3/" + data.id + "/" + data.idCentrale}">Attente de quelqu'un d'autre</a></li>
                            <li><a href="${CURRENT_URL + "taches/etat/4/" + data.id + "/" + data.idCentrale}">Reportée</a></li>

                          </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="ui centered  grid">

                            <div class="one column row">
                                <div class="column">
                                    <p>Assigné à : </p>
                                    <a class="ui image label">
                                      <img src="https://semantic-ui.com/images/avatar/small/elliot.jpg">
                                      ${data.user}
                                    </a>
                                </div>

                            </div>
                            <div class="one column row">
                                <div class="column">
                                    <h5>Description de la tâche a éffectuer :</h5>
                                    <p class="task-description">${data.descr}</p>
                                </div>

                            </div>
                            <div class="two column row">
                                <div class="column">
                                    <h4>Créée ${data.creation} </h4>
                                </div>
                                <div class="column">
                                    <h4>A terminer avant le ${data.echeance}</h4>
                                </div>
                            </div>
                            <div class="three column row">




                                </div>

                               <div class="three column  row">

                               <div class="update-action">
                                        <a class="ui basic button" href="#">Modifier l'action</a>
                                  </div>



                               <div class="archive-action">
                                    <a class="ui basic button" href="/taches/archive/${data.id}/${data.idCentrale}"><i class="archive icon"></i>
                                    Archiver l'action</a>
                               </div>

                               <div class="archive-action">
                                        <a class="ui red basic button" href="/taches/delete/${data.id}/${data.idCentrale}"><i class="delete icon"></i>
                                           Supprimer l'action</a>
                                   </div>



                            </div>



                            </div>
                            <div class="suite-task">

                            </div>
                    </div>`;
            el.append(tpl);

            $('#modal-task-detail-home-client').modal('show');


        },
        error: function (e) {
            console.error(e);
        }


    });


});

$('.detail-tache-archive-client').on('click', function (e) {

    let centrale = $('#centrale').html();


    let id = $(this).data('id');

    let aidy = Number(id);
    let aidyCentrale = 4;


    if (centrale === "CENTRALE_FUNECAP") {
        aidyCentrale = 4;
    } else if (centrale === 'CENTRALE_GCCP') {
        aidyCentrale = 2;
    } else if (centrale === 'CENTRALE_PFPL') {
        aidyCentrale = 5
    } else if (centrale === 'ROC_ECLERC') {
        aidyCentrale = 6
    } else if (centrale === 'ACHAT_CENTRALE') {
        aidyCentrale = 1;
    }


    let url = "//crm.achatcentrale.fr/taches/detail/" + aidyCentrale + "/" + aidy;
    console.log(url);

    $.ajax({

        // Adresse à laquelle la requête est envoyée
        url: url,

        // Le délai maximun en millisecondes de traitement de la demande
        timeout: 4000,

        // La fonction à apeller si la requête aboutie
        success: function (data) {

            console.log(data);


            let title = `<p>Tâche #${data.id}</p>`;
            let el = $('.modal-content-client-archive-action');

            $('.modal-title-task-archive-detail').empty();
            el.empty();
            $('.modal-title-task-archive-detail').append(title);


            let tpl = `<h4>${data.nom}</h4>
              <div class="detail-tache-etat">
                      
                    <br>
                    <div class="ui centered  grid">

                            <div class="one column row">
                                <div class="column">
                                    <p>Assigné à : </p>
                                    <a class="ui image label">
                                      <img src="https://semantic-ui.com/images/avatar/small/elliot.jpg">
                                      ${data.user}
                                    </a>
                                </div>

                            </div>
                            <div class="one column row">
                                <div class="column">
                                    <h5>Description de la tâche a éfféctuer :</h5>
                                    <p class="task-description">${data.descr}</p>
                                </div>

                            </div>
                            <div class="two column row">
                                <div class="column">
                                    <h4>Créée ${data.creation} </h4>
                                </div>
                                <div class="column">
                                    <h4>A terminer avant le ${data.echeance}</h4>
                                </div>
                            </div>
                        
                    </div>`;


            el.append(tpl);
            $('#modal-task-detail-archive-client').modal('show');


        },
        error: function (e) {
            console.error(e);
        }


    });


});

let tableTache = $('#table-tache').DataTable({
    "colReorder": true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json"
    },
    "dom": '<"el_top_tables">' +
    't' +
    '<"el_bottom_tables"' +
    '>'


});


let fournisseurTable = $('#fournisseurs-all').DataTable({
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
