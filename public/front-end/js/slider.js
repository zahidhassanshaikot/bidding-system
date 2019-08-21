$(document).on('ready', function() {
      
      $(".food-slider").slick({
        dots: true,
        arrows:false,
        infinite: true,
        autoplay:false,
        centerMode:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: false,
    	cssEase: 'linear',
    	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  	]
      });

    });