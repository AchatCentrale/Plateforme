
const area = document.getElementById('add-note');
Countable.on(area, counter =>{
    if(counter.all <= 500){
        $('#counting-note').empty().append('<p>'+counter.all+'/500</p>');
    }else{
        $('#counting-note').empty().append('<p style="color: red;">'+counter.all+'/500</p>');


    }
});