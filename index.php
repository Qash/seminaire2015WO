<?php
session_start();
$_SESSION['id_user'] = 11302484;
?>
<!doctype html>
<html lang='fr' ng-app="serviceCulturel">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/stylesheet.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<title>Service Culturel Paris 13</title>
</head>
<body>
	<header>
		<section id="logo">
			<a href="#accueil" onclick="changePage(this.hash);"><img id="logoLeft" src="img/logoSC.png" alt="logo service culturel" /></a>
			<a href="http://www.univ-paris13.fr/" target="_blank"><img id="logoRight" src="img/logoUP13.png" alt="logo univ paris 13" /></a>
		</section>
		<!-- MENU PRINCIPAL -->
		<nav id="navSite">
			<ul>
				<li><a id="accueil" href="#accueil" onclick="changePage(this.hash);"><i class="fa fa-home"></i> ACCUEIL</a></li>
				<li><a id="inscription "href="#inscription" onclick="changePage(this.hash);"><i class="fa fa-paint-brush"></i> INSCRIPTION</a></li>
				<li><a id="information" href="#information" onclick="changePage(this.hash);"><i class="fa fa-newspaper-o"></i> RESTER INFORMÉ</a></li>
				<li><a id="ateliers" href="#ateliers" onclick="changePage(this.hash);"><i class="fa fa-briefcase"></i> ATELIERS</a></li>
				<li><a id="calendar" href="#calendar" onclick="changePage(this.hash);"><i class="fa fa-calendar"></i></a></li>
			</ul>
		</nav>
		
	</header>
	
	<main ng-controller="CampusFilterController as campusFilterCtrl">
		<!-- ------------ -->
		<!-- PAGE ACCUEIL -->
		<!-- ------------ -->
		<section class="accueil">
			<!-- MENU FILTRES CAMPUS -->
			<nav id="campusFilter">
				<ul>
					<li ng-class="{ 'truc': campusFilterCtrl.chkFilter('vil') }"><a ng-click="campusFilterCtrl.toggleFilter('vil')" href="#">Villetaneuse</a></li>
					<li ng-class="{ 'truc': campusFilterCtrl.chkFilter('bob') }"><a ng-click="campusFilterCtrl.toggleFilter('bob')" href="#">Bobigny</a></li>
					<li ng-class="{ 'truc': campusFilterCtrl.chkFilter('hlm') }"><a ng-click="campusFilterCtrl.toggleFilter('hlm')" href="#">Hors les murs</a></li>
				</ul>
			</nav>
			
			<!-- CAROUSEL -->
			<section id="owl-demo" class="owl-carousel owl-theme">
				<div class="item"><img src="img/slide1.jpg" alt="slide 1"></div>
				<div class="item"><img src="img/slide2.jpg" alt="slide 2"></div>
				<div class="item"><img src="img/slide3.jpg" alt="slide 3"></div>
			</section>
			
			<!-- PRESENTATION SERVICE CULTUREL -->
			<section id="presentationContainer" ng-if="!campusFilterCtrl.activeFilter.length" >
				<h2>Présentation du service culturel</h2>
				<h3>Le service culturel de Paris 13 propose tout au long de l’année :</h3>
				<ul id="presentationListe">
					<li>Des ateliers de pratique artistique (langue des signes, théâtre, écriture, musique, chant, arts plastiques, vidéo, histoire de l’art, histoire du cinéma).</li>
					<li>Un accompagnement aux projets artistiques des étudiants et du personnel.</li>
					<li>Des spectacles sur les campus (concerts, cirque, danse), des expositions, des événements exceptionnels (bal, scènes ouvertes)</li>
					<li>Des spectacles hors les murs dans les théâtres partenaires (MTD, MC93, TGP, Comédie Française, Théâtre national de Chaillot, Théâtre de la Ville, Théâtre du Rond Point, La Villette, le 104, la Gaîté Lyrique…)</li>
				</ul>
				<h4>Adhésion</h4>
				<p>10 € pour les étudiants et 15 € pour le personnel.</p>
				<h4>Où nous trouver ?</h4>
				<p>Campus de Villetaneuse : tous les jours de 10h à 17h
					<br />Café expo 1er étage / 99, avenue JB Clément, 93430 Villetaneuse / 01 49 40 38 27
					<br />Campus de Bobigny : tous les jours de 10h à 17h
					<br />Foyer de l’Illustration / 1 rue de Chablis, 93017 Bobigny / 01 48 38 88 29</p>
				</section>
				
				<!-- EVENEMENTS -->
				<section id="eventContainer" >
					<div ng-show="campusFilterCtrl.chkFilter('vil')">
						<h1>Villetaneuse</h1>
						<div id="event{{$index + 1}}" class="eventCard"  ng-repeat="event in events | where:{campus:'vil'}" > <!-- EVENEMENTS VILLETANEUSE -->
							<img src="{{event.preview}}" alt="img of {{event.name}}">
							<h2>{{event.name}}</h2>
							<p class="date" class="eventDate">{{event.date_debut | date : 'd-MMMM-yyyy'}}</p>
							<p class="description"><span class="desc">Description : </span><br />{{event.description}}</p>
							<?php if(isset($_SESSION['id_user'])) {
								?>
								<form action="php/event_inscription.php" method="POST">
									<input type="text" name="event" value="{{event.name}}">
									<input type="submit" name="submit" value="INSCRIPTION">
								</form>
								<?php
							}
							?>
						</div> 
					</div>
					
					<div ng-show="campusFilterCtrl.chkFilter('bob')">
						<h1>Bobigny</h1>
						<div id="event{{$index + 1}}" class="eventCard" ng-repeat="event in events | where:{campus:'bob'}" > <!-- EVENEMENTS BOBIGNY -->
							<img src="{{event.preview}}" alt="img of {{event.name}}">
							<h2>{{event.name}}</h2>
							<p class="date" class="eventDate">{{event.date_debut | date : 'd/MMM/yyyy'}}</p>
							<p class="description"><span class="desc">Description :</span> <br />{{event.description}}</p>
							<?php if(isset($_SESSION['id_user'])) {
								?>
								<form action="php/event_inscription.php" method="POST">
									<input type="text" name="event" value="{{event.name}}">
									<input type="submit" name="submit" value="INSCRIPTION">
								</form>
								<?php
							}
							?>
						</div> 
					</div>
					<div ng-show="campusFilterCtrl.chkFilter('hlm')">
						<h1>Hors les murs</h1>
						<div id="event{{$index + 1}}" class="eventCard"  ng-repeat="event in events | where:{campus:'hlm'}" > <!-- EVENEMENTS HLM -->
							<img src="{{event.preview}}" alt="img of {{event.name}}">
							<h2>{{event.name}}</h2>
							<p class="date" class="eventDate">{{event.date_debut | date : 'd-MMMM-yyyy'}}</p>
							<p class="description"><span class="desc">Description :</span> <br />{{event.description}}</p>
							<?php if(isset($_SESSION['id_user'])) {
								?>
								<form action="php/event_inscription.php" method="POST">
									<input type="text" name="event" value="{{event.name}}">
									<input type="submit" name="submit" value="INSCRIPTION">
								</form>
								<?php
							}
							?>
						</div> 
					</div>
				</section>
			</section>
			
			<!-- ---------------- -->
			<!-- PAGE INSCRIPTION -->
			<!-- ---------------- -->
			<section class="inscription">
				<section id="inscriptionContainer">
					<h1>Inscris-toi au service culturel !</h1>
					<form id="inscriptionForm" action="php/inscription_sc.php" method="POST">
						<ul>
							<li><label for="prenom">Prénom</label> <input type="text" name="firstname" placeholder="Prénom"> </br></li>
							<li><label for="nom">Nom</label> <input type="text" name="lastname" placeholder="Nom"> </br></li>
							<li><label for="mail">E-Mail</label> <input type="mail" name="mail" placeholder="adresse@mail.com"> </br></li>
							<li><label for="id_user">Numéro Etudiant</label> <input type="text" name="id_user" placeholder="11223344"> </br></li>
							<li><label for="pwd">Mot de passe</label> <input type="password" name="pwd" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;"> </br></li>
							<input type="submit" name="submit" value="Valider">
						</ul>
					</form>
				</section>
			</section>
			
			<!-- ---------------- -->
			<!-- PAGE INFORMATION -->
			<!-- ---------------- -->
			<section class="information">
				<section id="infoContainer">
					<h1>Rester informé !</h1>
					<p>Pour recevoir la newsletter concernant vos événements préférés, abonnez-vous !</p>
					<form id="infoForm" action="php/inscription_newsletter.php" method="POST">
						<ul>
							<li><label for="prenom">Prénom</label> <input type="text" name="firstname" placeholder="Prénom"> </br></li>
							<li><label for="nom">Nom</label> <input type="text" name="lastname" placeholder="Nom"> </br></li>
							<li><label for="mail">E-Mail</label> <input type="mail" name="mail" placeholder="adresse@mail.com"> </br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Théâtre"><span class="circle"><i class="fa fa-comment-o"></i></span> Théâtre </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Danse"><span class="circle"><i class="fa fa-child"></i></span> Danse </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Exposition"><span class="circle"><i class="fa fa-eye"></i></span> Exposition </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Musique"><span class="circle"><i class="fa fa-music"></i></span> Musique </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Clown"><span class="circle"><i class="fa fa-child"></i></span> Clown </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Battle"><span class="circle"><i class="fa fa-users"></i></span> Battle </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Block Party"><span class="circle"><i class="fa fa-users"></i></span> Block Party </label></br></li>
							<li class="box"><label><input type="checkbox" name="category[]" value="Concert"><span class="circle"><i class="fa fa-music"></i></span> Concert </label></br></li>
							<input type="submit" name="submit" value="Valider">
						</ul>
					</form>
				</section>
			</section>
			
			<!-- ---------------- -->
			<!-- PAGE ATELIERS -->
			<!-- ---------------- -->
			<section class="ateliers" ng-controller="ateliersController as ateliersCtrl">
				<section id="atelierContainer">
					
					<img id="atelierImg" src="img/ateliers.jpg" alt="ateliers" />
					<div id="presentationAteliers" ng-show="!toggle">
						<h1>Ateliers de pratique artistique</h1>
						<h3>Mode d'emploi</h3>
						<p>Le service culturel propose des ateliers de pratique artistique ouverts à tous, débutants ou expérimentés sur un cycle semestriel ou annuel. 
							Vous pouvez suivre un atelier intégré et validé dans votre cursus, soit effectué librement sans validation.</p>
							
							<h3>Inscription aux ateliers</h3>
							<p>Auprès du professeur lors du 1er atelier et au service culturel.</p>
							
							<h3>Début des cours</h3>
							<p>A partir du 29 septembre 2014</p>
							
							<h3>Adhésion</h3>
							<p>10 € pour les étudiants et 15 € pour l'ensemble des personnels de l'Université.<br />
								Le paiement de cette redevance permet de pratiquer une ou plusieurs activités du service culturel, de façon forfaitaire, en fonction des places disponibles au moment de votre inscription sur les activités choisies. </p>
								<button type="button" id="seeWorkshops" ng-click="toggle = !toggle"><i class="fa fa-arrow-circle-right"></i> Voir les ateliers</button>
							</div>
							<div ng-show="toggle" id="atelierContent">
								<button type="button" id="seeWorkshops" ng-click="toggle = !toggle"> Retour <i class="fa fa-arrow-circle-left"></i></button>
								<div ng-show="toggle" class="atelierCard"  ng-repeat="workshop in workshops" > <!-- ATELIERS -->
									<h2>{{workshop.name}}</h2>
									<p>{{workshop.description}}</p>
									<p><strong>Où :</strong> <br />{{workshop.location}}</p>
									<p><strong>Quand :</strong> <br />{{workshop.day}}</p>
									<p><strong>Qui :</strong> <br />{{workshop.coordinator}}</p>
								</div>
							</div>
						</section>
					</section>
				</main>
				<div class="calendar">
					<button class="calendarBtn" ng-click="campusFilterCtrl.nextDay()">Suivant</button>
					<div id="focusCard"> 
						{{campusFilterCtrl.focusDate.formatedDate}}
						<div ng-class="{multipleCard:campusFilterCtrl.focusDate.eventsDate.length>1}" class="eventCard" ng-repeat="event in focusDate.eventsDate">
							<img src="{{event.preview}}" alt="img of {{event.name}}">
							<h2>{{event.name}}</h2>
							<p class="date" class="eventDate">{{event.date_debut | date : 'd-MMMM-yyyy'}}</p>
							<p class="description"><span class="desc">Description : </span><br />{{event.description}}</p>
							<?php if(isset($_SESSION['id_user'])) {
								?>
								<form action="php/event_inscription.php" method="POST">
									<input type="text" name="event" value="{{event.name}}">
									<input type="submit" name="submit" value="INSCRIPTION">
								</form>
								<?php
							}
							?>
						</div>
						<div ng-show="campusFilterCtrl.focusDate.eventsDate.length===0">Y'a rien uesh</div>
					</div>
					<button class="calendarBtn" ng-click="campusFilterCtrl.prevDay()">Précédent</button>
					<br>
					<div class="dayCard" ng-repeat="day in week" ng-click='campusFilterCtrl.focusOn(day.date)'>
						<h2>{{day.dayOfWeek}}</h2>
						<h1>{{day.dayOfMonth}}</h1>
						<h2>{{day.month}}</h2>
					</div>
					</div>
				</main>
					<footer>
						<ul class="dl">
							<li><a href="files/Programme_culture_sem2.pdf" download><i class="fa fa-arrow-circle-right"></i>   TÉLÉCHARGER LE PROGRAMME</a></li>
							<li><a href="https://docs.google.com/forms/d/1h3njDFhLyUj51Afaz9RAo0UBaHAHnqkhxH_Q9c5y1zs/viewform" target="_blank"><i class="fa fa-file-text-o"></i>   QUESTIONNAIRE DE SATISFACTION</a></li>
							<li><a href="#"><i class="fa fa-gavel"></i>   MENTIONS LÉGALES</a></li>
							<li><a href="#">CONDITIONS GÉNÉRALES D'UTILISATION</a></li>
						</ul>
						<ul class="rsn">
							<li><a href="#"><i class="fa fa-facebook-square"></i> Sc_Paris13</a></li>
							<li><a href="#"><i class="fa fa-twitter-square"></i> Sc_Paris13</a></li>
						</ul>
						<img src="img/paris13-membre-spc-gris.png" alt="logo paris13 condorcet">
					</footer>

				</body>
				</html>
