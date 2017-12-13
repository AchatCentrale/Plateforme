
const area = document.getElementById('add-note');
Countable.on(area, counter =>{
    if(counter.all <= 500){
        $('#counting-note').empty().append('<p>'+counter.all+'/500</p>');
    }else{
        $("#add-note").prop('disabled', true);
        $('#counting-note').empty().append('<p>'+counter.all+'/500</p>');


    }
});