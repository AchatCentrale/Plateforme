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





    $('.hover-update-client').hover( function (e) {
        var tpl = '<i class="fa fa-pencil fa-lg pencil-update" aria-hidden="true"></i>';


        e.currentTarget.innerHTML += tpl;
    });


    $('.hover-update-client').on('click', '.pencil-update' ,  function (e) {

        console.log(e.delegateTarget.dataset.content);

        var tpl = '<input type="text" placeholder="'+e.delegateTarget.dataset.content+'" >'
        console.log(tpl);

        //TODO: finir l'action
    });


    $('.hover-update-client').mouseleave( function () {
        $('.pencil-update').remove();
    })


    $('.btn-del').on('click', function () {


        var user = $('.mail-send').data('user');
        console.log(user);

        $.ajax({
            url: "/delete/client/"+user,
            success: function(result){
                console.log(result);
            }});
    });








} );
