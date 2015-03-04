(function(){
	var app=angular.module('serviceCulturel', []);

	app.controller('CampusFilterController', function(){
		this.activeFilter =[];

		this.chkFilter = function(filterToChk){
			return this.activeFilter.indexOf(filterToChk) !== -1;
		};

		this.toggleFilter = function(filterToSet){
			this.activeFilter.slice(filterToSet);
		};
	});

	// End
});