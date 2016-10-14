$(document).ready(function()
{
	var scrolling = false; //flaga, sprawdza czy w danym momencie bedziemy mogli nacisnac odnosnik
	var pages = 3; //ilosc "stron" na stronie

	function scrollTo(target)
	{
		scrolling = true;
		$('html body').animate({scrollTop: target
			}, function()
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

	var sliding = false; //flaga sprawdza czy w danym momencie zmieniany jest slajd
	var slidesQnt = 4; //ilosc slajdow
	var activeSlide = 1; //aktywny slajd
	var change = parseInt($('.bubble-element').outerWidth()) + 10; //o ile przesuwac
	var descriptionContent = $('#bubble-' + activeSlide +' figcaption').html(); //pobranie contentu
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

	activePage();
	$('body').scrollspy({target: '.main-nav', offset: 100})

	if($(window).scrollTop() <= 30)
	{
		$('.main-nav ul li a').css("line-height", '3.2em');
		$('.logo').css('font-size', '1.5em');
	}

	$(window).scroll(function()
	{
		activePage();
		if($(this).scrollTop() > 30)
		{
			$('.main-nav ul li a').css("line-height", '1.5em');
			$('.logo').css('font-size', '1em');
		}
		else
		{
			$('.main-nav ul li a').css("line-height", '3.2em');
			$('.logo').css('font-size', '1.5em');
		}
	});

	$('.scrollable, .main-nav ul li a').click(function(e)
	{
		e.preventDefault();
		var targetId = $(this).attr('href');
		var target = $(targetId).offset().top - $('.main-nav').outerHeight();
		if(!scrolling)
			scrollTo(target);
	})
});