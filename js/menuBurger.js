$(".burger-icon").click(function(){
    if($(this).hasClass('clickmenu')) {
        $(this).removeClass('clickmenu');
        $.each($('.menu-item'), function(i, el){
        $(el).css({'opacity':1});

        setTimeout(function(){
            $(el).animate({
            'opacity':0
            }, 600);
        },100 + ( i * 100 ));
    })
    }else{       
        $(this).addClass('clickmenu')
          // comparsa link
        $.each($('.menu-item'), function(i, el){
        $(el).css({'opacity':1});

        setTimeout(function(){
            $(el).animate({
            'opacity':1.0
            }, 600);
        },600 - ( i * 100 ));
    })
    }

    if($('.menu-right').hasClass('menu-right-display')) {
        $('.menu-right').removeClass('menu-right-display')
        $('.menu-right').addClass('menu-right-close');
    }else{
        $('.menu-right').removeClass('menu-right-close');
        $('.menu-right').addClass('menu-right-display');
    }
});