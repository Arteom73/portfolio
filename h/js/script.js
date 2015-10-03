$(function(){
	if($(window).width() > 480 && $(window).height() > 500){
		$(".firstScreen").outerHeight($(window).height());
	}
	$("body").css('padding-top', $(".firstScreen").outerHeight());
	$(".firstScreen").css('top', 0 - $("body").scrollTop() / 2);
});
$(window).resize(function(){
	var $window = $(window);
	if($window.width() > 480 && $window.height() > 500){
		$(".firstScreen").outerHeight($(this).height());
	}else if($window.width() > 480 && !($window.height() > 500)){
		$(".firstScreen").outerHeight(500);
	}else{
		$(".firstScreen").outerHeight("auto");
	}
	$("body").css('padding-top', $(".firstScreen").outerHeight());
});
$(window).scroll(function() {
	$(".firstScreen").css('top', 0 - $("body").scrollTop() / 2);
});

$(document).ready(function(){
	$(document).on("scroll", onScroll);
    
    $('.scroll-link').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('.scroll-link').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
            $target = $(target).offset().top - $('.header').outerHeight();

        $('html, body').stop().animate({
            'scrollTop': $target
        }, 500, 'swing', function () {
            $(document).on("scroll", onScroll);
        });
    });
});
function onScroll(event){
    var scrollPos = $(document).scrollTop() + $('.header').outerHeight();
    $('.scroll-link').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        console.log(refElement);
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.outerHeight() > scrollPos) {
            $('.scroll-link').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}