$(function(){
	// Inicializar componentes de "materializecss".
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();

	//owl carousel
	$("#main-carousel").owlCarousel({
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true
	});
});