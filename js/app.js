(function(){
	var app=angular.module('serviceCulturel', []);

	app.controller('CampusFilterController', function(){
		this.activeFilter = 1;

		this.chkFilter = function(filterToChk){
			return this.activeFilter === filterToChk;
		};

		this.setFilter = function(filterToSet){
			this.activeFilter = filterToSet;
		};
	});

	// End
})();

/* CARROUSEL */
$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});