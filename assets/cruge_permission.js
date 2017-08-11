$('.cruge-permission-input input[type=checkbox]').change(function(e){
    e.preventDefault();
    var data = {
        'user' : $(this).attr('data-id') , 
        'role' : $(this).attr('name') ,
        'flag' : $(this).is(':checked')
    };
    //console.log('clicked',cruge_permission_url,data);
    $.ajax({ cache: false, type: 'post', async: true, data: data,
        url: cruge_permission_url,
        success: function(resp){ 
            //console.log('success',resp);  
        }, 
        error: function(e){ console.log(e.responseText); }
    });
});
