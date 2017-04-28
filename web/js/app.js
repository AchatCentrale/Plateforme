
    function deleteTask(e) {
        console.log(e)

        let url = 'http://localhost:8000/taches/delete/'+ e;

        $.ajax(url, function (e) {
            console.log(e);
        })
    }


    //envoie de mail ajax
    $('.mail-send').on('click', function (e) {

        let user = $(this).data('user');
        console.log(user);

        $.ajax({
            url: "/send/client/"+user,
            success: function(result){
                console.log(result);
            }});
    });


