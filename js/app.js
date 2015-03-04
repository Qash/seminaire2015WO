// ANGULAR
(function(){
	var app=angular.module('serviceCulturel', ['angular.filter']);

	// CONTROLEUR FILTRES CAMPUS 
	app.controller('CampusFilterController', function(){
		this.activeFilter =[];
		this.events =[];
		this.chkFilter = function(filterToChk){
			return this.activeFilter.indexOf(filterToChk) !== -1;
		};

		this.toggleFilter = function(filterToSet){
			if(!this.chkFilter(filterToSet))
				this.activeFilter.push(filterToSet);
			else
				this.activeFilter.splice(this.activeFilter.indexOf(filterToSet),1);
		};
	});
	app.controller('TestController', ['$scope', '$http', function ($scope, $http) {
    $http.get('http://www.w3schools.com/website/Customers_JSON.php').success(function(data) {
        $scope.events = data;
    });
}]);
	// End
})();



$(document).ready(function() {
	
	if(window.location.hash=='')
		var curPage = '#accueil';
	else
		var curPage = window.location.hash;
	changePage(curPage);
	
	function changePage(arg){
		$(".accueil").fadeTo(500,0,"swing");
		$('.accueil').css('display', 'none');
		$(".inscription").fadeTo(500,0,"swing");
		$('.inscription').css('display', 'none');
		$(".information").fadeTo(500,0,"swing");
		$('.information').css('display', 'none');
		$(".ateliers").fadeTo(500,0,"swing");
		$('.ateliers').css('display', 'none');
		$("."+arg.substring(1)).css('display', 'block');
		$("."+arg.substring(1)).fadeTo(500,1,"swing");
	}	
	
	/* CARROUSEL */
	$("#owl-demo").owlCarousel({
	 
		autoPlay : 6000,
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