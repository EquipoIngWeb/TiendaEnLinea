$(function(){
	// Inicializar componentes de "materializecss".
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();
	 $('select').material_select();
    $('.modal').modal();

	//owl carousel
	$("#main-carousel").owlCarousel({
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		autoPlay: true,
		transitionStyle : "fade",
	});
	$("#popular-carousel").owlCarousel({
		navigation : true,
		items : 4,
		autoPlay: true,
	});

});
