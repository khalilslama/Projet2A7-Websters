<?php


?>
<!DOCTYPE html>
<html>
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
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Najeh</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Articles</a></li>
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Validation du panier</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Nom</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantité</b></div>
							<div class="col-md-2 col-xs-2"><b>Prix</b></div>
							<div class="col-md-2 col-xs-2"><b>Prix Totale</b></div>
						</div>
						<div id="cart_checkout"></div>
						
						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
</body>	
</html>
















		