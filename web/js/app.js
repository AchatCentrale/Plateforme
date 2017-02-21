$( function() {



    //accordeon liste user
    $( "#accordion" ).accordion({
        active: false,
        collapsible: true,
    });

    //envoie de mail ajax
    $('.mail-send').on('click', function (e) {

        var user = $(this).data('user');
        console.log(user);

        $.ajax({
            url: "/send/client/"+user,
            success: function(result){
                console.log(result);
            }});
    });











} );
