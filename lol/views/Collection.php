	 <!DOCTYPE html>
	 <html lang="en">
	 <head>
	 	<meta charset="UTF-8">
	 	<title>Collection</title>
	 	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	 	<link rel="stylesheet" type="text/css" href="css/articles.css">
	 	<link rel="stylesheet" href="css1/bootstrap.min.css"/>
		<link rel="stylesheet" href="css1/bootstrap.css"/>	
	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 	<link rel="stylesheet" type="text/css" href="css/Reclamation.css">
	 	<link rel="stylesheet" href="css/bootsnav.css">
	 	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css"> 
	 	<link rel="stylesheet" type="text/css" href="css/style.css">	
	 	<link rel="stylesheet" type="text/css" href="css/swiper.min.css">
	 	<link rel="stylesheet" type="text/css" href="css/slider.css">
	 	<script src="js1/jquery2.js"></script>
		<script src="js1/bootstrap.min.js"></script>
		<script src="js/panier.js"></script>
	 	
		
		
	 	<script src="js/bootsnav.js"></script>
	 	<style>


	 	body{
	 		background-image: url(image/background-01.png);
	 		background-size: cover;
	 		height: 750px;
	 	}

	 	nav.navbar.bootsnav{
	 		border: none;
	 		background: none;		
	 		margin-top: 20px;
	 	}


	 	nav.navbar.bootsnav ul.nav > li{margin-right: 20px;}
	 	nav.navbar.bootsnav ul.nav > li > a{
	 		padding: 10px 20px;
	 		border-radius: 0;
	 		color: #fdefcf;
	 		text-transform: uppercase;
	 		border: 2px solid rgba(255, 219, 98, 0.4);
	 		position: relative;
	 		transition: all 0.3s ease 0s;
	 	}




	 	nav.navbar.bootsnav ul.nav > li.dropdown > a{
	 		padding: 10px 30px 10px 15px;
	 	}

	 	nav.navbar.bootsnav ul.nav > li > a:hover,
	 	nav.navbar.bootsnav ul.nav > li.on > {
	 		color: #fdefcf;
	 	}


	 	nav.navbar.bootsnav ul.nav > li > a > span:before{
	 		content: "";
	 		width: 0;
	 		height: 3px;
	 		background: #fdefcf;
	 		position: absolute;
	 		bottom: 0;
	 		left: 0;
	 		z-index: -1;
	 		transition: all 0.3s ease 0s;
	 	}


	 	nav.navbar.bootsnav ul.nav > li:hover > a > span:before{
	 		width: 50%;
	 		animation: bounce 1.5s 0.3s ease-out infinite;
	 	}



	 	nav.navbar.bootsnav ul.nav > li.active > a > span:before,
	 	nav.navbar.bootsnav ul.nav > li.on > a > span:before{
	 		width: 50%;
	 		left: 25%;
	 	}



	 	nav.navbar.bootsnav ul.nav>li.dropdown > a.dropdown-toggle:after{
	 		position: absolute;
	 		top: 10px;
	 		right: 10px;
	 		margin:  0 0 0 7px;

	 	}

	 	nav.navbar.bootsnav ul.nav>li.dropdown > ul{
	 		top: 120%;
	 		transition: all 0.8s ease 0s;
	 	}


	 	nav.navbar.bootsnav ul.nav > li.dropdown.on > ul{

	 		top: 110%;

	 	}

	 	.dropdown-menu.multi-dropdown{
	 		position: absolute;
	 		left: -100% !important;
	 	}

	 	nav.navbar-bootsnav li.dropdown ul.dropdown-menu{
	 		box-shadow: 0 0 10px rgba(0,0,0,0.3);
	 		border: none;
	 		border-radius: 20px;

	 	}

	 	nav.navbar.bootsnav li.dropdown ul.dropdown-menu.megamenu-content li{
	 		font-size: 14px;
	 		color: white;
	 	}

	 	nav.navbar.bootsnav li.dropdown ul.dropdown-menu.megamenu-content .title{
	 		font-size: 16px;
	 		font-weight: bold;
	 		color: #1a4b6d;
	 	}
	 	@keyframes boucne{
	 		0%{
	 			left: 0;
	 		}
	 		48%{
	 			left: 50%;
	 		}
	 		50%{
	 			left: 50%;
	 		}

	 		98%{
	 			left:0%;
	 		}
	 		100%{
	 			left:0%;
	 		}
	 	}
	 	div .under-nav
	 	{
	 		width: 100%
	 	}
	 	div .under-nav .bar
	 	{
	 		margin-left: calc(50% - 160px);
	 		width: 320px;
	 		height: 30px;
	 		margin-top: 20px;
	 	}
	 	div .title
	 	{
	 		margin-top: 50px;
	 		background: none;
	 	}
	 	div .title li
	 	{
	 		width: 320px;
	 		height:100px;
	 		font-size: 50px;
	 		text-align: center;
	 		list-style: none;
	 		margin-top: 100px;
	 		margin-left: calc(50% - 180px);
	 		padding: 10px 20px;
	 		border: none;
	 		color: #fdefcf;
	 		text-transform: uppercase;
	 		transition: all 0.3s ease 0s;
	 	}
	 </style>
	</head>
	<body>
		<br>
		<br>
		<br>
		<br>
		<div class="Reclamation">
			<form>
				
			</form>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default navbar-mobile bootsnav on">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="navbar-menu">
							<ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
								<li class="active"><a href="NouvellesCollections.php" data-hover="Acceuil">Nouvelles Collections<span></span></a></li>
								<li class="dropdown">
									<a href="Collection.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="Shortcodes">Collection<span></span></a>
									<ul class="dropdown-menu animated">
										<li><a href="Location.html">Location</a></li>
										<li><a href="Achat.html">Achat</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle" data-hover="Rendez-vous">Rendez-vous<span></span></a>
									<ul class="dropdown-menu animated">
										<li><a href="RendezVousClient.html">Client</a></li>
										<li><a href="RendezVousProfessionel.html">Professionelle</a></li>
									</ul>
								</li>
								<li><a href="#" data-hover="Evenements"><span>Evenements</span></a></li>
								<li><a href="#" data-hover="Formations"><span>Formations</span></a></li>
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" class="dropdown" data-hover="Rendez-vous"></span><i class="fas fa-shopping-cart"></i><span class="badge">0</span></a>
									<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading" style="background-color:khaki; color:black;">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Image de l'article</div>
									<div class="col-md-3">Nom de l'article</div>
									<div class="col-md-3">Prix de l'article</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
								</li>
								<li><a href="#" data-hover="Professionelle"><span><img src="image/user.png" style="width: 21px;height: 21px;"></span></a></li>
								
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="under-nav">
		<img class="bar" src="image/bar.png">
	</div> 
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php
				include "../core/Collections.php";
				$hi = new CollectionR();
				$hi->afficherCollectionF();
			?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
	<div class="gallery">
	</div>
	<script type="text/javascript" src="js/swiper.min.js"></script>
	<script type="text/javascript">
		function showpic(id){
			$(".gallery").load("afficher.php",{id : id});
		}
	</script>
	<script>
		var swiper = new Swiper('.swiper-container', {
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows : true,
			},
			pagination: {
				el: '.swiper-pagination',
			},
		});
	</script>
</body>
</html>