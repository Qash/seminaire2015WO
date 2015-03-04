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