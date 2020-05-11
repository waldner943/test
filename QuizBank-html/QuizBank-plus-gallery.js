// imgのフェードイン
$(window).on('scroll', function(){

    var elem = $('[id^=fadeIn-img]');
    var isAnimate = 'isAnimate';

    elem.each(function(){
        var elemOffset = $(this).offset().top;
        var scrollPos = $(window).scrollTop();
        var wh = $(window).height();
        if(scrollPos > elemOffset - (wh / 1.6) ){
            $(this).addClass(isAnimate);
        }
    });
});