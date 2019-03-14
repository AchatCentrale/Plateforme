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






$(function () {


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

    let randNum = function () {
        return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
    };


// Panel toolbox
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
    // /Panel toolbox

    const CURRENT_URL = window.location.href.split('#')[0].split('?')[0];

    moment.locale('fr', {
        months: 'janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre'.split('_'),
        monthsShort: 'janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.'.split('_'),
        monthsParseExact: true,
        weekdays: 'dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi'.split('_'),
        weekdaysShort: 'dim._lun._mar._mer._jeu._ven._sam.'.split('_'),
        weekdaysMin: 'Di_Lu_Ma_Me_Je_Ve_Sa'.split('_'),
        weekdaysParseExact: true,
        longDateFormat: {
            LT: 'HH:mm',
            LTS: 'HH:mm:ss',
            L: 'DD/MM/YYYY',
            LL: 'D MMMM YYYY',
            LLL: 'D MMMM YYYY HH:mm',
            LLLL: 'dddd D MMMM YYYY HH:mm'
        },
        calendar: {
            sameDay: '[Aujourd’hui à] LT',
            nextDay: '[Demain à] LT',
            nextWeek: 'dddd [à] LT',
            lastDay: '[Hier à] LT',
            lastWeek: 'dddd [dernier à] LT',
            sameElse: 'L'
        },
        relativeTime: {
            future: 'dans %s',
            past: 'il y a %s',
            s: 'quelques secondes',
            m: 'une minute',
            mm: '%d minutes',
            h: 'une heure',
            hh: '%d heures',
            d: 'un jour',
            dd: '%d jours',
            M: 'un mois',
            MM: '%d mois',
            y: 'un an',
            yy: '%d ans'
        },
        dayOfMonthOrdinalParse: /\d{1,2}(er|e)/,
        ordinal: function (number) {
            return number + (number === 1 ? 'er' : 'e');
        },
        meridiemParse: /PD|MD/,
        isPM: function (input) {
            return input.charAt(0) === 'M';
        },
        // In case the meridiem units are not separated around 12, then implement
        // this function (look at locale/id.js for an example).
        // meridiemHour : function (hour, meridiem) {
        //     return /* 0-23 hour, given meridiem token and hour 1-12 */ ;
        // },
        meridiem: function (hours, minutes, isLower) {
            return hours < 12 ? 'PD' : 'MD';
        },
        week: {
            dow: 1, // Monday is the first day of the week.
            doy: 4  // The week that contains Jan 4th is the first week of the year.
        }
    });

    function terminerTask(e) {
        let url = 'http://crm.achatcentrale.fr/taches/terminer/' + e;

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

                    }

                });


            });


    }

    function unArchiveTask(e) {
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

                    }

                });


            });
    }

//sidebar
    $('#menu_toggle').on('click', function () {

        console.log('salut');

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

    $('.menu .item').tab();

    $('#siret-client').mask('000 000 000 00000');
    $('#siret-update').mask('000 000 000 00000');
    $('#tel-client').mask('00 00 00 00 00 ');
    $('#tel-user').mask('00 00 00 00 00 ');
    $('#Téléphone-update').mask('00 00 00 00 00');
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
        fixedHeader: {
            header: true,
            footer: true
        },
        "colReorder": true,
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json"
        },
        "dom": '<"el_top_tables"' +
            '<"input-top-tables"f><p>' +
            '>' +
            't' +
            '<"el_bottom_tables"' +
            '<l><i>' +
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
                break;
            case "CENTRALE FUNECAP":
                centrale = 'CENTRALE_FUNECAP';
                break

        }


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
            case 20:
                return '<i style="color: white;background-color: green;border-radius: 50%;height: 30px;width: 33px;padding-top: 5px;" class="checkmark large icon"></i>';
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
                                        ${stateTask(data.statut)}
                                    </div>
                                    <div class="change-statut-tache">
                                      <a href="http://crm.achatcentrale.fr/taches/terminer/${data.id}/${aidyCentrale}" class="ui button basic positive terminer-tache-home "> Action terminé</a>
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
                                            <br/>
                                            ${data.cl_id ? "<a href=\"http://crm.achatcentrale.fr/client/" + data.cl_id + "/" + aidyCentrale + "/general\" class=\"client-raisonsoc-detail-tache \"> Voir le client</a>\n" : "<p><b>TEAM</b></p>"}
                                           
            
                                    </div>
                                    <div class="one column row">
                                        <div class="column">
                                            ${data.descr ? `<h5>Description de la tâche a éfféctuer :</h5><p class="task-description">${data.descr}</p>` : '' }
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
                                                <a class="ui basic button" href="http://crm.achatcentrale.fr/taches/update/${data.id}/${data.idCentrale}">Modifier l'action</a>
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


                $('#modal-task').modal('show')


            },
            error: function (e) {
                console.error(e);
            }


        });


    });


    // soumissions pour modifications d'un client
    $('.save-update-client').on('click', function (e) {

        let values = $("input[name='data-client[]'], select[name='data-client[]']")
            .map(function () {
                    return $(this).val();
                }
            ).get();

        let centrale = $('#centrale').html();
        let id = $('#id').html();
        let url = "http://crm.achatcentrale.fr/client/" + id + "/" + centrale + "/update";


        console.log(values);

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


    //Soumet la modale pour la mise a jour du client
    $('#save-client-user-update').on('click', function (e) {

        e.preventDefault();

        let centrale = $('#centrale').html();
        let id = $('#id').html();
        let idUsers = $('#id_user_update').html();
        let url = "http://crm.achatcentrale.fr/client/users/" + id + "/" + centrale + "/update/" + idUsers;

        let values = $("input[name='us_update[]'], select[name='us_update[]']").map(function () {
            return $(this).val();
        }).get();




        $.ajax({

            // Adresse à laquelle la requête est envoyée
            url: url,
            type: 'POST',
            data: {
                prenom: values[0],
                nom: values[1],
                pass: values[2],
                mail: values[3],
                // fct: $( "#us_fonct" ).val(),
                tel: values[4].replace(/\s/g, ''),

            },
            // Le délai maximun en millisecondes de traitement de la demande
            timeout: 4000,

            // La fonction à apeller si la requête aboutie
            success: function (data) {

                console.log(data);

            },

            // La fonction à appeler si la requête n'a pas abouti
            error: function (e) {
                console.log(e);
            }

        });


        $('#update_user_client').modal('hide');

        window.location.reload();

    });

    //Fait apparaitre la modale pour modifier un utuoisateur
    $('.edit-client-user').on('click', function () {

        let centrale = $('#centrale').html();


        let cc_id = $(this).data('utilisateur');

        let url = "http://crm.achatcentrale.fr/client/user/"+centrale+"/"+cc_id;


        $.ajax({
            url: url,
            success: function (data) {

                $('#id_user_update').html(cc_id);
                $('#us_prename').val(data[0]['CC_PRENOM']);
                $('#us_name').val(data[0]['CC_NOM']);
                $('#us_pass').val(data[0]['CC_PASS']);
                $('#us_mail').val(data[0]['CC_MAIL']);
                $('#Téléphone-user-update').val(data[0]['CC_TEL']);
            },
            error: function (data) {
                console.log(data);
            }
        });




        $('#update_user_client').modal('show');

    });


    $('.add-note').on('click', function (e) {

        let $input = $('#add-note').val();


        let url = CURRENT_URL.replace("general", "notes/add");

        console.log($input.length);


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

                $.notify("Note crée", "success");


                setTimeout(function(){


                    // window.location.reload();

                    }, 3000);

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


        switch (e.target.checked) {
            case true:
                el.attr('disabled', 'disabled');
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


    $('.detail-tache-home').on('click', function (e) {

        let id = $(this).data('id');
        let idCentrale = $(this).data('centrale');

        let aidy = Number(id);
        let aidyCentrale = Number(idCentrale);


        let url = CURRENT_URL + "taches/detail/" + aidyCentrale + "/" + aidy;

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


                let tpl = `<h4>${data.nom}</h4>
                      <div class="detail-tache-etat">
                                  <div class="state-tache-detail">
                                        ${stateTask(data.statut)}
                                    </div>
                                    <div class="change-statut-tache">
                                      <a href="http://crm.achatcentrale.fr/taches/terminer/${data.id}/${aidyCentrale}" class="ui button basic positive terminer-tache-home "> Action terminé</a>
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
                                            <br/>
                                            ${data.cl_id ? "<a href=\"http://crm.achatcentrale.fr/client/" + data.cl_id + "/" + aidyCentrale + "/general\" class=\"client-raisonsoc-detail-tache \"> Voir le client</a>\n" : "<p><b>TEAM</b></p>"}
                                           
            
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

    $('.detail-note-home').on('click', function (e) {

        let id = $(this).data('id');
        let idCentrale = $(this).data('centrale');

        console.log(idCentrale);

        let aidy = Number(id);
        let aidyCentrale = Number(idCentrale);


        let url = CURRENT_URL + "note/detail/" + aidyCentrale + "/" + aidy;


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

                let title = `<p>Note #${data.id}</p>`;

                $('.modal-title-task-home').append(title);


                console.log(data);


                let tpl = `<div class="ui centered grid header-detail-note">
                              <h4>Crée le <b>${data.ins_date}</b> pour le client <b>${data.cl_raisonsoc}</b> <br> par <b>${data.ins_user}</b></h4>
                            <div class="one column row tpl-inject-note">
                                <div class="column note-content-home">
                                    <p class="note-description">${data.nom}</p>
                                </div>
    
                            </div>
                            <div class="two column row ">
                                <div class="column">
                                    <h4>Crée ${moment(data.ins_date).fromNow()} </h4>
                                </div>
                                 <div class="column footer-update-note">
                                    <button class="ui button positive modifier-note-home">Modifier la note</button>
                                </div>
                               <a class="link-note-client" href="http://crm.achatcentrale.fr/client/${data.cl_id}/${aidyCentrale}/general">${data.cl_raisonsoc}</a>
                               <br>
                            </div>
                            <p>${data.centrale}</p>

                            
                            
                                          
                            
                    </div>`;


                el.append(tpl);


                $('#modal-detail-task-home').modal('show');

                let content = $('.note-description').html();

                $('.modifier-note-home').on('click', function (e) {

                    $('.note-content-home').html('');
                    let tpl = `<div class="ui form"><div class="field"><label>Modifier la note</label><textarea class="text-content-update-note" style="margin-top: 0px; margin-bottom: 0px; height: 112px;">${content}</textarea></div><button class="ui button modifier-note-home">Enregistrer</button></div>`;

                    $('.modifier-note-home').hide();


                    $('.note-content-home').html(tpl);

                    $('.modifier-note-home').on('click', function (e) {

                        let note = $('.text-content-update-note').val();


                        let url = CURRENT_URL + "note/update/" + aidy + "/" + aidyCentrale;

                        console.log(url);


                        $.ajax({

                            // Adresse à laquelle la requête est envoyée
                            url: url,
                            data: {
                                'note': note
                            },

                            method: "POST",

                            // Le délai maximun en millisecondes de traitement de la demande
                            timeout: 4000,

                            // La fonction à apeller si la requête aboutie
                            success: function (data) {

                                let tpl = `<div class="column note-content-home">
                                    <p class="note-description">${note}</p>
                                    <p>enregistrement réussi</p>
                                </div>`;


                                $('.note-content-home').remove();
                                $('.tpl-inject-note').append(tpl);
                                $.notify("Note mise a jour", "success");


                            },
                            error: function (e) {
                                console.error(e);
                            }


                        });


                    })

                });


            },
            error: function (e) {
                console.error(e);
            }


        });


    });

    $('.detail-rdv-home').on('click', function (e) {

        let id = $(this).data('id');
        let idCentrale = $(this).data('centrale');

        let aidy = Number(id);
        let aidyCentrale = Number(idCentrale);


        let url = CURRENT_URL + "rdv/detail/" + aidyCentrale + "/" + aidy;

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


                let tpl = `<div class="ui centered  grid">
                            <div class="one column row">
                                <div class="column">
                                    <h5>Description du rendez vous</h5>
                                    <p class="task-description">${data.nom}</p>
                                </div>
    
                            </div>
                            <div class="two column row">
                                <div class="column">
                                    <h4>Créée ${moment(data.ins_date).fromNow()} </h4>
                                    <h4>Pour ${moment(data.echeance).fromNow()} </h4>
                                </div>
                                <div class="column">
                                    <a href="" class="ui negative basic button">Terminer</a>
                                </div>
                               
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

    $('.ui.search').search({
        apiSettings: {
            url: 'http://crm.achatcentrale.fr/user/search/{query}'
        },
        searchOnFocus: true,
        fields: {
            results: 'items',
            title: 'US_ID',
            description: 'US_PRENOM',
        },
        cache: true,
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
    });

    $('.ui.search.clients-auto').search({
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

    });



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
                            ${stateTask(data.statut)}
                        </div>
                        d
                        
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
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json"
        },


    });

    let fournisseurTable = $('#fournisseurs-all').DataTable({
        "colReorder": true,
        responsive: true,
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

    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        let regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        let results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    $('.user-label').focusout(function () {

        setTimeout(function () {

            let value = $('.user-label').val();
            let centrale = getUrlParameter('c');

            let url = "http://crm.achatcentrale.fr/client/label/" + centrale + "/" + value + "";

            $.getJSON(url, function (json) {
                $('.client-label').after('<div id="label-client-task" class="ui cursor  label ">' + json.raisonSoc + '<i class="remove icon remove-client-label cursor"></i></div>');
                $('#client-isDisabled').val(value).attr('readonly', 'readonly');

            });
        }, 200)

    });

    //TODO: Quand on appuie sur la croix sa retire la raison sociale
    $('#label-client-task').on('click', function (e) {
        console.log(e);
        $('#label-client-task').remove();
        $('#client-isDisabled').removeAttr('disabled');


    });

    $('.ui.dropdown.user-update').dropdown();

    $('#clients-dropdown').dropdown();

    $('.add-hastag-container').hide();

    $('.add-hastag-icon').on('click', function () {

        let $elTag = $('.add-hastag-icon');
        let $elValue = $('#value-hashtag-client');

        let centrale = $('#centrale').html();

        let clId = $('#id').html();


        if ($elTag.prevAll().length === 3) {

            $elValue.parent().toggleClass('error');
            $(this).toggleClass('disabled ');
            $('.save-hastag-client').toggleClass('disabled ');

        }


        $('.add-hastag-container').toggle("slow");
    });

    $('.save-hastag-client').on('click', function (e) {

        let $elTag = $('#hastag-inject');
        let $elValue = $('#value-hashtag-client');

        let centrale = $('#centrale').html();

        let clId = $('#id').html();

        let url = "http://crm.achatcentrale.fr/client/tag/new/" + centrale + "/" + clId;


        $.ajax({

            // Adresse à laquelle la requête est envoyée
            url: url,

            // Le délai maximun en millisecondes de traitement de la demande
            timeout: 4000,
            cache: false,

            type: 'POST',

            data: {
                cl: clId,
                tag: $elValue.val(),

            },


            // La fonction à apeller si la requête aboutie
            success: function (data) {
                console.log(data);

            },

            // La fonction à appeler si la requête n'a pas abouti
            error: function (data) {
                console.log(data);

            }

        });

        let tpl = `<li><a class="" href="http://crm.achatcentrale.fr/tag/${$elValue.val()}">#${$elValue.val()}</a></li>`;

        $elValue.val("");

        if ($elTag.prevAll().length === 3) {

            $elValue.parent().toggleClass('error');
            $(this).toggleClass('disabled ');


        }


        $elTag.append(tpl);


    });

    $('.go-to-fournisseur').on('click', function () {


        let id = $(this).data('id');


        let url = CURRENT_URL + "/" + id + "/general";


        window.location.href = url;

    });

    $('.ui.search.container-search-hastag').search({
        apiSettings: {
            url: 'http://crm.achatcentrale.fr/tag/search/{query}'
        },
        searchOnFocus: true,
        fields: {
            results: 'items',
            title: 'TAG',
        },
        minCharacters: 3,
        error: {
            source: 'Pas de source',
            noResults: 'Pas de resultat',
            logging: 'Error in debug logging, exiting.',
            noTemplate: 'A valid template name was not specified.',
            serverError: 'Problème de seerveur',
            maxResults: 'Results must be an array to use maxResults setting',
            method: 'The method you called is not defined.'
        },
        onSelect: function (result, response) {

            window.location.href = "http://crm.achatcentrale.fr/tag/" + result.TAG;

            return false;

        }
    });

    $('.remove-hashtag').on('click', function (e) {


        let centrale = $(this).data('centrale');
        let tag = $(this).data('tag');


        ///tag/remove/{tag}/{centrale}

        let url = "http://crm.achatcentrale.fr/tag/remove/" + tag + "/" + centrale;


        console.log(url);


        swal({
                title: "Supprimer un TAG",
                text: "Voulez-vous supprimez le TAG ?",
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

                $.post(url);

                $('#' + tag).transition('fade').remove();

                swal(
                    'Succés',
                    'TAG supprimé',
                    'success'
                );

                location.reload();


            });


    });





    $('.archive-task').on('click', function (e) {


        let centrale = $(this).data("centrale");
        let idTask = $(this).data("id");


        $.get("/taches/archive/" + idTask + "/" + centrale, function (data) {
            $.notify("Note archivé", "success");

            setTimeout(function () {

                window.location.reload();

            }, 3000)

        });

    });


    $('.submit_reassign').on('click', function (e) {
        let user = $('#reassign_user').val();
        let text = $('#reassign_text').val();
        let icon_reassign = $('#reassign_user_icon');

        let centrale = icon_reassign.data("centrale");
        let idTask = icon_reassign.data("task");

        let url = CURRENT_URL.substring(0, 53) + "/reassign/"+idTask+"/"+centrale;

        $.ajax({

            // Adresse à laquelle la requête est envoyée
            url: url,

            type: 'POST',


            data: {
                user_id: user,
                text_comment: text,
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



    $('#edit_mail_cursor').on('click', function (e) {

        let element_mail = $('#mail_content');

        let content_before = element_mail.text().replace(/ /g,'');

        element_mail.html('<div class="ui input"> <input id="edit_mail_val" type="text" placeholder="'+content_before+'"> </div><button style="margin-left: 5px" class=" mini ui green button " id="save_edit_mail">Ok</button>');


        $('#save_edit_mail').on('click', function (e) {

            let value = $('#edit_mail_val').val();


            let centrale = $('#centrale').html();

            let clId = $('#id').html();

            let url = "http://crm.achatcentrale.fr/client/"+clId+"/"+centrale+"/update/mail";


            $.ajax({

                // Adresse à laquelle la requête est envoyée
                url: url,

                type: 'POST',

                data: {
                    mail: value,
                },
                // Le délai maximun en millisecondes de traitement de la demande
                timeout: 4000,

                // La fonction à apeller si la requête aboutie
                success: function (data) {

                    element_mail.html('<a class="cursor data-client" data-index="mail" href="mailto:'+value+'"><i class="mail link  circular icon"></i></a>'+value)
                },

                // La fonction à appeler si la requête n'a pas abouti
                error: function (e) {
                    console.log(e);

                }

            });



        });


    });

    $('.remove_note').on('click', function (e) {



        let centrale = $('#centrale').html();
        let note = $(this).data("note");

        let url = "http://crm.achatcentrale.fr/client/" + note + "/" + centrale + "/note/remove";
        console.log(url);

        $.ajax({

            // Adresse à laquelle la requête est envoyée
            url: url,



            // Le délai maximun en millisecondes de traitement de la demande
            timeout: 4000,

            // La fonction à apeller si la requête aboutie
            success: function (data) {

                console.log(data);

                window.location.reload();


            },
            error: function (e) {
                console.error(e);
            }


        });


    });



    $('#add_origin_client').on('click', function () {


        $('.form-check-input').each(function(idx, elem){

            if(elem.checked){
                console.log(elem.value)
            }


        });
    });







});


$('#datetimepicker1').datetimepicker({
    locale: 'fr'
});

$('#datetimepicker2').datetimepicker({
    locale: 'fr',
    viewMode: 'months',
    format: 'MM/YYYY'
});

$('#datetimepicker3').datetimepicker({
    locale: 'fr',
});



$('.menu .item').tab();







