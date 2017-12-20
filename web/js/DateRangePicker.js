$(function() {


    let ref = $('#ref-client');
    let centrale = $('#centrale-client');

    if (document.getElementById("myChart")) {


        let url ='http://crm.achatcentrale.fr/conso/'+ref.html()+'/'+centrale.html();
        console.log(url);

        $.ajax({
            url: url,
            timeout: 4000,
            success: function (data) {
                console.log(data);
                let ctx = document.getElementById("myChart").getContext("2d");
                let config = {
                    type: data.type,
                    data: {
                        datasets: data.datasets,
                        strokeColor : "rgba(220,220,220,1)",
                        labels: data.labels
                    },
                    options:  {
                        responsive: true,
                        title: {
                            display: true,
                            text: data.title
                        }
                    }
                };
                window.myPie = new Chart(ctx, config);
            },
            error: function() {
                console.log("Désolé, aucun résultat trouvé.");
            }
        });
    }



    let start = moment().subtract(1, 'year');
    let end = moment().subtract(1, 'month').date(0);

    function cb(start, end) {
        $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
    }

    $('#reportrange').daterangepicker({
        "locale": {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Appliquer",
            "cancelLabel": "Annuler",
            "fromLabel": "Depuis",
            "toLabel": "To",
            "customRangeLabel": "Personnalisé",
            "weekLabel": "W",
            "daysOfWeek": [
                "Di",
                "Lu",
                "Ma",
                "Me",
                "Je",
                "Ve",
                "Sa"
            ],
            "monthNames": [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            "firstDay": 1
        },
        startDate: start,
        endDate: end,
        ranges: {
            'Il y a 3 mois': [moment().subtract(3, 'months').date(0), moment().date(0)],
            'Il y a 6 mois': [moment().subtract(6, 'months').date(0), moment().date(0)],
            'Il y a 1 an': [moment().subtract(1, 'year').date(0), moment().date(0)],
        }
    },
        cb);

    cb(start, end);


    $('#reportrange').on('apply.daterangepicker', function (e, picker) {
        console.log(picker.startDate.format('YYYY-MM-DD'));
        console.log(picker.endDate.format('YYYY-MM-DD'));

        let start = picker.startDate.format('YYYY-MM-DD');
        let end = picker.endDate.format('YYYY-MM-DD');

        let ref = $('#ref-client');
        let centrale = $('#centrale-client');

        let url = 'http://crm.achatcentrale.fr/conso/tableau/'+ref.html()+'/'+centrale.html()+'?start='+start+'&end='+end;
        let urlTotal = 'http://localhost:8000/conso/ca/'+ref.html()+'/'+centrale.html()+'?start='+start+'&end='+end;

        $.ajax({
            url: urlTotal,
            timeout: 4000,
            success: function (data) {
                console.log(data);

                $('.ca_prix_public').empty().append(data.Total_ca_public );
                $('.ca_prix_centrale').empty().append(data.Total_ca_centrale);
                $('.ca_prix_total').empty().append(data.total);

            },
            error: function() {
                console.log("Désolé, aucun résultat trouvé.");
            }
        });


        $.ajax({
            url: url,
            timeout: 4000,
            success: function (data) {
               console.log(data);

               $('#ajax-conso-table').empty().append(data).fadeIn();
            },
            error: function() {
                console.log("Désolé, aucun résultat trouvé.");
            }
        });



        if (document.getElementById("myChart")) {


            let url ='http://crm.achatcentrale.fr/conso/'+ref.html()+'/'+centrale.html()+'?start='+start+'&end='+end;
            console.log(url);

            $.ajax({
                url: url,
                timeout: 4000,
                success: function (data) {
                    console.log(data);
                    let ctx = document.getElementById("myChart").getContext("2d");
                    let config = {
                        type: data.type,
                        data: {
                            datasets: data.datasets,
                            strokeColor : "rgba(220,220,220,1)",
                            labels: data.labels
                        },
                        options:  {
                            responsive: true,
                            title: {
                                display: true,
                                text: data.title
                            }
                        }
                    };
                    window.myPie = new Chart(ctx, config);
                },
                error: function() {
                    console.log("Désolé, aucun résultat trouvé.");
                }
            });
        }

    })
});