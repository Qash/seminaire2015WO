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

/* CARROUSEL */
$(document).ready(function() {
 
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