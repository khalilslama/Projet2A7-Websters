<!DOCTYPE html>
<!-- saved from url=(0054)http://localhost/website/frontend/view/newsletter.html -->
<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();  
 
// On récupère nos variables de session
if (isset($_SESSION['l']) && isset($_SESSION['p'])) 
{ 
?>

          <a href="login/logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <title>index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/articles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" href="css/bootsnav.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">   
  <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="css/slider.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="news.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
<!-- START CONTENT  -->
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-left: 80px;">
        <nav class="navbar navbar-default navbar-mobile bootsnav on">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
              <li class="active"><a href="index.html" data-hover="Acceuil">Nouvelles Collections<span></span></a></li>
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
                  <li><a href="ch.php">Client</a></li>
                  <li><a href="">Professionelle</a></li>
                </ul>
              </li>
              <li><a href="reclamation.html" data-hover="evenement"><span>Contact</span></a></li>
              <li><a href="blog1.php" data-hover="blog"><span>blog</span></a></li>
                  <li><a href="fa.php" data-hover="FAQS"><span>FAQS</span></a></li>
            
              <!--<li><a href="" data-hover=""></a></li>-->
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>


<div class="under-nav">
  <img class="bar" src="image/bar.png">
</div> 
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class="swiper-image">
        <img src="image/acceuil.jpg">
      </div>
      <div class="swiper-description">
        <h2>2012</h2>
      </div>
    </div>
    <div class="swiper-slide">
      <div class="swiper-image">
        <img id="Collection2013" src="image/img1.jpg">
      </div>
      <div class="swiper-description">
        <h2>2013</h2>
      </div>
    </div>
    <div class="swiper-slide">
      <div class="swiper-image">
        <img src="image/img2.jpg">
      </div>
      <div class="swiper-description">
        <img src="image/2012.png">
      </div>
    </div>
    <div class="swiper-slide"></div>
    <div class="swiper-slide"></div>
    <div class="swiper-slide"></div>
    <div class="swiper-slide"></div>
    <div class="swiper-slide"></div>
  </div>
  <div class="swiper-pagination"></div>
</div>
<div class="gallery">
  <div class="card">
    <div class="front"><img src="image/img1.jpg"></div>
    <div class="back">
      <div class="details">
        <h2>TITRE</h2>
        <p>qsdqsdsqsdqsdsqsdsqsdqsdsqdqsdQSDqsdqsdqsdqsdsdqsdqsdqsjdhjqhfkjqdshfhsdgqfhgqsdhfghdsgfjhsdgfjhgdsfjgdsjhfgsdjfgjhsdqfghjdgfjhq</p>
        <button class="AjouterDansPanier"><i class="fas fa-cart-plus"></i></button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="front"><img src="image/img2.jpg"></div>
    <div class="back">
      <div class="details">
        <h2>TITRE</h2>
        <p>qsdqsdsqsdqsdsqsdsqsdqsdsqdqsd</p>
        <button class="AjouterDansPanier"><i class="fas fa-cart-plus"></i></button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="front"><img src="image/acceuil.jpg"></div>
    <div class="back">
      <div class="details">
        <h2>TITRE</h2>
        <p>qsdqsdsqsdqsdsqsdsqsdqsdsqdqsd</p>
        <button class="AjouterDansPanier"><i class="fas fa-cart-plus"></i></button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/swiper.min.js"></script>
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
  $('.gallery').css('display','none');
  $('#Collection2013').click(function(){
    $(".gallery").fadeIn();
  });
</script>
<br>
<br>

<div class="parent-wrapper">
  <form method="GET" action="ajouternewsletter.php" >
  <span class="close-btn glyphicon glyphicon-remove"></span>
  <div class="subscribe-wrapper">
    <h4>NEWSLETTER</h4>
    <input type="email" name="email" class="subscribe-input" placeholder="Your e-mail " required="required">
    <br>
    <input type="submit" value="inscrire" class="submit-btn">
  </div>
  </form>
</div>

</body>
</html>
<?php
}

else { 
      echo 'Veuillez vous connecter </br>';  
    echo '<a href="login/auth.html">Cliquer pour se connecter</a>';

}  
//définir la session une session est un tableau temporaire 
//1 er point c quoi une session
// 
?>