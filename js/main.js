$(document).ready(function()
{
	var isMobile = window.matchMedia("only screen and (max-width: 991px)");

	if(isMobile.matches) alert("MOBILE");

	var scrolling = false; //flaga, sprawdza czy w danym momencie bedziemy mogli nacisnac odnosnik
	var pages = 3; //ilosc "stron" na stronie

	var sliding = false; //flaga sprawdza czy w danym momencie zmieniany jest slajd
	var slidesQnt = $('.bubble-element').length; //ilosc slajdow
	var activeSlide = 1; //aktywny slajd
	var change = parseInt($('.bubble-element').outerWidth()) + 10; //o ile przesuwac
	var descriptionContent = $('#bubble-' + activeSlide +' figcaption').html(); //pobranie contentu slajdu

	var scrTop = $(window).scrollTop();
	function scrollTo(target)
	{
		scrolling = true;
		$('html, body').animate({scrollTop: target
			}, 1000, function()
			{
				scrolling = false;
			}
		);
	}

	function activePage()
	{
		var result = 0;
		var color = "";
		for(var i = 1; i <= pages; i++)
		{
			var element = $('.main-nav ul li:nth-child(' + i + ')');
			if(element.hasClass('active'))
			{
				result = i;
			}
		}
		switch(result)
		{
			case 2:
				color = "#6B00F0";
			break;

			case 3:
				color = "#0DB500";
			break;

			default: 
				color = "rgb(50, 128, 255)";
			break;
		}
		$('.logo span').css('color', color);
	}

	$.fn.isOnScreen = function()
	{

	    var win = $(window);

	    var viewport = {
	        top : win.scrollTop(),
	    };
	    viewport.bottom = viewport.top + win.height() + (win.height() * 0.1);

	    var bounds = this.offset();
	    bounds.bottom = bounds.top + this.outerHeight();

	    return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));

	}
	function animations()
	{
		$('.animate').each(function()
		{
			var anim = $(this).data('anim');
			if($(this).isOnScreen() && !$(this).hasClass('animated') && anim)
			{
				$(this).removeClass('animate').addClass('animated ' + anim);
			}
		});
	}
	function navChange(top)
	{
		if(top > 30 && !$('.main-nav').hasClass('nav-normal'))
		{
			$('.main-nav').removeClass('nav-expanded').addClass('nav-normal');
		}
		else if(top <= 30 && !$('.main-nav').hasClass('nav-expanded'))
		{
			$('.main-nav').removeClass('nav-normal').addClass('nav-expanded');		
		}
	}

	animations();
	activePage();
	navChange(scrTop);
	$('body').scrollspy({target: '.main-nav', offset: 100});

	$('.bubble-description').html(descriptionContent); //ustawienie contentu
	$('.bubble-control').click(function()
	{
		if(!sliding)
		{
			sliding = true;
			var shift = parseInt($('.bubble-content').css('left'));
			if($(this).hasClass('right'))
			{
				activeSlide++;
				if(activeSlide > slidesQnt)
				{
					activeSlide = 1;
					$('.bubble-content').css('left', change+'px');
				}
			}
			else
			{
				activeSlide--;
				if(activeSlide < 1)
				{
					activeSlide = slidesQnt;
					$('.bubble-content').css('left', ((activeSlide) * -change) + 'px');
				}
			}

			descriptionContent = $('#bubble-' + activeSlide +' figcaption').html();
			shift = (activeSlide-1) * -change;
			$('.bubble-description').addClass('fadeOutDown').removeClass('fadeInDown');
			$('.bubble-content').animate({'left': shift+'px'}, 300, function()
			{
				sliding = false;
				$('.bubble-description').html(descriptionContent).addClass('fadeInDown').removeClass('fadeOutDown');
			});
		}
	});


	$(window).scroll(function()
	{
		scrTop = $(this).scrollTop();
		activePage();
		navChange(scrTop);
		animations();
	});

	$('.scrollable, .main-nav ul li a').click(function(e)
	{
		e.preventDefault();
		var targetId = $(this).attr('href');
		var target = $(targetId).offset().top - $('.main-nav').outerHeight();
		if(!scrolling && (parseInt(target) != scrTop) )
			scrollTo(target);
	});
});