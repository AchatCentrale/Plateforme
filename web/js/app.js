function deleteTask(e) {
    console.log(e);
    let url = 'http://localhost:8000/taches/delete/' + e;

    swal({
            title: "Suppression d'une action",
            text: "Voulez-vous vraiment supprimer cet action ?",
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
                        title: "Suppression d'une action",
                        text: "Action supprimé",
                        type: "info",
                        showCancelButton: true,
                    });

                    let id = e;

                    $("#"+id).remove()
                },

                // La fonction à appeler si la requête n'a pas abouti
                error: function() {
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


