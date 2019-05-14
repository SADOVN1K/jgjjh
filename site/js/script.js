$('#genre li').click(function() {
    let genre_id = $(this).data('id');
    
    $('#serial-list figure').each(function(){
        console.log($(this).attr('id').split(',').indexOf(String(genre_id)));
        if ($(this).attr('id').split(',').indexOf(String(genre_id)) != -1){
            $(this).removeClass('no-active');
        } else {
            $(this).addClass('no-active');
            
        }                       
    })

    //cinema.removeClass('no-active').siblings().addClass('no-active');

});

