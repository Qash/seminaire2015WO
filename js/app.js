// ANGULAR
(function(){
	moment.locale('fr', {
		months : "Janvier_Fevrier_Mars_Avril_Mai_Juin_Juillet_Aout_Septembre_Octobre_Novembre_Decembre".split("_"),
		monthsShort : "Janv._Fevr._Mars_Avr._Mai_Juin_Juil._Aout_Sept._Oct._Nov._Dec.".split("_"),
		weekdays : "Dimanche_Lundi_Mardi_Mercredi_Jeudi_Vendredi_Samedi".split("_"),
		weekdaysShort : "Dim._Lun._Mar._Mer._Jeu._Ven._Sam.".split("_"),
		weekdaysMin : "Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
		longDateFormat : {
			LT : "HH:mm",
			LTS : "HH:mm:ss",
			L : "DD/MM/YYYY",
			LL : "D MMMM YYYY",
			LLL : "D MMMM YYYY LT",
			LLLL : "dddd D MMMM YYYY"
		}});

	var app=angular.module('serviceCulturel', ['angular.filter']);

	// CONTROLEUR FILTRES CAMPUS 
	app.controller('CampusFilterController',['$scope','$http', function($scope,$http){
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
		$http.get('./php/event_call.php').success(function(data) {
			$scope.events = data;
		});

		this.focusDate={
			date:moment(),
			formatedDate:moment().format("LLLL"),
			month:moment.months()[moment().get('month')],
			dayOfWeek:moment.weekdays()[moment().get('day')],
			dayOfMonth:moment().get('date'),
			year:moment().get('year'),
			eventsDate:[]
		};
		this.week=[];
		for (var i = 0; i < this.events.length; i++) {
			this.events[i].date_debut=moment(this.events[i].date_debut);
		};
	//INITIALISATION focusDate.events
	for (var i = 0; i < this.events.length; i++) {
		if(this.events[i].date_debut.isSame(this.focusDate.formatedDate)){
			this.focusDate.eventsDate.push(events[i]);
		}
	};
	//FIN INIT focusDate.events
	//INITIALISATION week
	for (var j = 3; j > 0; j--) {
		this.week.push({
			date:moment(this.focusDate.date).subtract(j,"days"),
			formatedDate:moment(this.focusDate.date).subtract(j,"days").format("LLLL"),
			month:moment.months()[moment(this.focusDate.date).subtract(j,"days").get('month')],
			dayOfWeek:moment.weekdays()[moment(this.focusDate.date).subtract(j,"days").get('day')],
			dayOfMonth:moment(this.focusDate.date).subtract(j,"days").get('date'),
			year:moment(this.focusDate.date).subtract(j,"days").get('year'),
		});

	};
	for (var j = 1; j < 4; j++) {
		this.week.push({
			date:moment(this.focusDate.date).add(j,"days"),
			formatedDate:moment(this.focusDate.date).add(j,"days").format("LLLL"),
			month:moment.months()[moment(this.focusDate.date).add(j,"days").get('month')],
			dayOfWeek:moment.weekdays()[moment(this.focusDate.date).add(j,"days").get('day')],
			dayOfMonth:moment(this.focusDate.date).add(j,"days").get('date'),
			year:moment(this.focusDate.date).add(j,"days").get('year'),

		});
	};
	//FIN INIT week

	this.focusOn=function(dayClicked){
		this.focusDate={
			date:dayClicked,
			formatedDate:dayClicked.format("LLLL"),
			month:moment.months()[dayClicked.get('month')],
			dayOfWeek:moment.weekdays()[dayClicked.get('day')],
			dayOfMonth:dayClicked.get('date'),
			year:dayClicked.get('year'),
			eventsDate:[]
		};
		for (var i = 0; i < this.events.length; i++) {
			if(this.events[i].date_debut.isSame(this.focusDate.formatedDate)){
				this.focusDate.eventsDate.push(this.events[i]);
			}
		};
		this.refreshWeek();
	};

	this.refreshWeek=function(){
		this.week=[];
		for (var j = 3; j > 0; j--) {
			this.week.push({
				date:moment(this.focusDate.date).subtract(j,"days"),
				formatedDate:moment(this.focusDate.date).subtract(j,"days").format("LLLL"),
				month:moment.months()[moment(this.focusDate.date).subtract(j,"days").get('month')],
				dayOfWeek:moment.weekdays()[moment(this.focusDate.date).subtract(j,"days").get('day')],
				dayOfMonth:moment(this.focusDate.date).subtract(j,"days").get('date'),
				year:moment(this.focusDate.date).subtract(j,"days").get('year')
			});
		};
		for (var j = 1; j < 4; j++) {
			this.week.push({
				date:moment(this.focusDate.date).add(j,"days"),
				formatedDate:moment(this.focusDate.date).add(j,"days").format("LLLL"),
				month:moment.months()[moment(this.focusDate.date).add(j,"days").get('month')],
				dayOfWeek:moment.weekdays()[moment(this.focusDate.date).add(j,"days").get('day')],
				dayOfMonth:moment(this.focusDate.date).add(j,"days").get('date'),
				year:moment(this.focusDate.date).add(j,"days").get('year')

			});
		};
	};
	this.nextDay=function(){

		this.focusDate={
			date:this.focusDate.date.add(1,"d"),
			formatedDate:this.focusDate.date.format("LLLL"),
			month:moment.months()[this.focusDate.date.get('month')],
			dayOfWeek:moment.weekdays()[this.focusDate.date.get('day')],
			dayOfMonth:this.focusDate.date.get('date'),
			year:this.focusDate.date.get('year'),
			eventsDate:[]
		};
		for (var i = 0; i < this.events.length; i++) {
			if(this.events[i].date_debut.isSame(this.focusDate.formatedDate)){
				this.focusDate.eventsDate.push(this.events[i]);
			}
		};
		this.refreshWeek();
	};
	this.prevDay=function(){
		this.focusDate={
			date:this.focusDate.date.subtract(1,"d"),
			formatedDate:this.focusDate.date.format("LLLL"),
			month:moment.months()[this.focusDate.date.get('month')],
			dayOfWeek:moment.weekdays()[this.focusDate.date.get('day')],
			dayOfMonth:this.focusDate.date.get('date'),
			year:this.focusDate.date.get('year'),
			eventsDate:[]
		};
		for (var i = 0; i < this.events.length; i++) {
			if(this.events[i].date_debut.isSame(this.focusDate.formatedDate)){
				this.focusDate.eventsDate.push(this.events[i]);
			}
		};
		this.refreshWeek();
	};
}]);
app.controller('categoryController',['$scope','$http', function($scope,$http){
	this.RelCategories =[];
	$http.get('./php/recup_cat.php').success(function(data) {
		$scope.RelCategories = data;
	});
}]);

app.controller('ateliersController',['$scope','$http', function($scope,$http){
	this.workshops =[];
	$http.get('./php/workshops_call.php').success(function(data) {
		$scope.workshops = data;
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
	moment.locale('fr');
	
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

function changePage(arg){
	$(".accueil").fadeTo(500,0,"swing");
	$('.accueil').css('display', 'none');
	$(".inscription").fadeTo(500,0,"swing");
	$('.inscription').css('display', 'none');
	$(".information").fadeTo(500,0,"swing");
	$('.information').css('display', 'none');
	$(".ateliers").fadeTo(500,0,"swing");
	$('.ateliers').css('display', 'none');
	$(".calendar").fadeTo(500,0,"swing");
	$('.calendar').css('display', 'none');
	$("."+arg.substring(1)).css('display', 'block');
	$("."+arg.substring(1)).fadeTo(500,1,"swing");
}	
