<?php
include "../core/config.php";
session_start();
$bdd = config::getConnexion();
if(isset($_SESSION['Id'])) {

   $requser = $bdd->prepare("SELECT * FROM client WHERE Id = ?");
   $requser->execute(array($_SESSION['Id']));
   $user = $requser->fetch();
   $img= $user['avatar'];
    }
    else{
      header('location:../index.html');
        } 
?>
<html class="no-js">
<head>
	<title>Mon Profile</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/sweetalert2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/profilestyle2.css">
  <link rel="stylesheet" type="text/css" href="../css/component.css" />
  <link rel="stylesheet" href="../css/bootsnav.css">
  <script src="../js/bootsnav.js"></script>
   <script src="../js/bootsnav.js"></script>
   <script src="../js/sweetalert2.min.js"></script>
  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>  
 

  <style>
  
    
    body{
      background-image: url(../img/background-01.png);
      background-size: cover;
      height: 750px;
      overflow-y : auto;
    }
    
    nav.navbar.bootsnav{
      border: none;
      background: none;
      margin-bottom: 20px;    
      
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
      text-decoration: none;
      
      
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
    }
    
    
   
   
  </style>
  
	
</head>
<body onload="loginsucc()">
  <img src="../catalogue/logo.png" style="z-index: 0;margin-left: 665px;">
  <br>
  <br>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-fixed-top navbar-expand-md bootsnav on">
                    <!--<div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>-->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                            
                            <li><a href="NouvellesCollections.php">Nouvelle Collection<span></span></a></li>
                            <li>
                                <a href="Collection.php">Collections<span></span></a>
                                
                            </li>
                            
                            <li>
                              <a href="#">Rendez-vous<span></span></a>
                
                            </li>
                            <li><a href="#">EvenementS<span></span></a></li>
                            <li><a href="#">FormationS<span></span></a></li>
                            <li class="active"><a href="Acceuil.html">Profile<span></span></a></li>
                            
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </div>

<div class="under-nav">
  <img class="bar" src="../img/bar.png">
</div>
  
   <!--  ******************* Début contenu ******************-->
  <div class="profil" style="margin-left: auto;margin-right: auto; margin-top: 50px;">
  	
   <div class="sidebar">
   	<nav class="profilnav">
   		<ul class="tab-group">
   			<li class="tab active"><a href="#ongle1">Mon Espace</a></li>
   			<li class="tab" id="cartebout"><a href="#ongle2">Ma carte</a></li>
   			
   		</ul>
   	</nav>
   </div>

   <div class="tab-content">
      <div id="ongle1">
        <button class="btn" id="pen" onclick="myFunctioninput()" style="width: 45px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        <form action="Modifierclient.php" method="POST" enctype="multipart/form-data">
      <div class="card" style="width:200px">
      <img class="card-img-top" src="Membreimg/<?php echo $img ?>" alt="Card image" style="width:80%">
      <div class="card-body">
      
      <div class="box" style="width: 100%">
          <input type="file" name="photo" id="file-3" class="inputfile inputfile-3"/>
          <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" style="color: #947047"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 11px; color: #947047">Modifier&hellip;</span></label>
        </div>
      
      </div>
      </div>
      
        
         
        
   	    <div class="hero">
   	  
        <div class="form-group">
        <input type="text" name="n" class="form-control form-control-sm" id="in1" value="<?php echo $user['Nom']?>" pattern="[A-Za-z]{1,20}" disabled required/>
        </div>


        
        <div class="form-group">
        <input type="text" name="p" class="form-control form-control-sm" id="in2" value="<?php echo $user['Prenom']  ?>" pattern="[A-Za-z]{1,20}" disabled required/>
       </div>



        
        <div class="form-group">
        <input type="text" name="Nu" class="form-control form-control-sm" id="in3" value="<?php echo $user['Numero']  ?>" pattern="[0-9]{1,8}" disabled required/>
        </div>

        

        <div class="form-group">
        <input type="email" name="Em" class="form-control form-control-sm" id="in4" value="<?php echo $user['Email']  ?>" disabled required/>
        </div>

   	   		
   	  </div>
      <button class= "btn btn-light" type="submit" name="bout">Confirmer</button> 
      </form>
      </div>


     <div id="ongle2">

     <div class="vcard">
            <div class="header">
                <div class="wave_bg">
                    <div class="wave-01"></div>
                    <div class="wave-02"></div>
                    <div class="wave-03"></div>
                </div>
                
                <div class="profile_pic_content">
                    <img class="profile_pic" src="Membreimg/<?php echo $img ?>">
                </div>
            </div>
            <div class="card_content">
                <div class="name">
                    <h4 style="margin-bottom: 10px;"><?php echo $user['Nom']?></h4>
                </div>
                
                <img src="../catalogue/logo.png" style="position: relative; margin-bottom: 10px;">
                <a class="button" id="bote" onclick="changerbot()">
                    activer
                </a>
            </div>
        </div>
        <h6>Votre carte vous benifice des réductions importantes.Activez La!</h6>
        <small>Note:Vous pouvez activer qu'après avoir valider une commade au moins</small>
    </div>

   </div>


   <div class="foot">
   	<button type="button" class= "btn btn-outline-danger" data-toggle="modal" data-target="#myModal">Désactiver</button>
    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">Déconnexion</button>
    <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title">Ops!!</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        
        <div class="modal-body">
          Désactiver votre compte..
        </div>
        
        
        <div class="modal-footer">
          <form method="POST" action="suppclient.php">
          <button type="submit" name="desa" class="btn btn-danger">Ok</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Déconnecter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Etes-vous sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="margin-bottom: 24px;" data-dismiss="modal">Fermer</button>
        <form id="docform" method="POST" action="../core/logout.php">
        <button type="submit" name="dec" class="btn btn-primary">Enregistrer/quitter</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
   </div>

  </div>





  
  



</body>
</html>

<script src="js/custom-file-input.js"></script>

  <script type="text/javascript">
    
   $('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});


  </script>
  <script type="text/javascript">
    
   function myFunctioninput(){
  var x = document.getElementById("in1").disabled;
 if(x==false)
  {document.getElementById("in1").disabled = true;
  document.getElementById("in2").disabled = true;
document.getElementById("in3").disabled = true;
  document.getElementById("in4").disabled = true;}
  else
  {document.getElementById("in1").disabled = false;
  document.getElementById("in2").disabled = false;
document.getElementById("in3").disabled = false;
  document.getElementById("in4").disabled = false;}
  
  
}
  </script>
  <script type="text/javascript">
    
      function loginsucc(){
           const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000
});

          Toast.fire({
           type: 'success',
           title: 'Signed in successfully'
})
      }

    </script>

    <script type="text/javascript">
      
     
       //window.location= 'verfiercarte.php';
       
       $.ajax(
           {
             url: 'verfiercarte.php',
             method: 'POST',
             data :{ verif: 1
                     
                   },
            success: function (response){
             if(response.indexOf('activer')>=0)
              {
                  $("#bote").text("Activer");

              }
              if(response.indexOf('desactiver')>=0)
              {
                  $("#bote").text("Désactiver");
              }

            }, 
            } 
           
        );
     
   
    </script>

   <script type="text/javascript">
     function changerbot()
     {
         var valeurbout = $("#bote").text();
        if(valeurbout.indexOf('Activer')>=0) {
              $.ajax(
           {
             url: 'ajoutercarte.php',
             method: 'POST',
             data :{ act: 1
                     
                   },
            success: function (response){
             if(response.indexOf('activer')>=0)
              {Swal.fire(
                  'Félicitation',
                  'Votre Carte est activé!',
                  'success'
                    )}
            },  
           }
        );
         $("#bote").text("Désactiver");
        }
        if(valeurbout.indexOf('Désactiver')>=0)
        {
         $.ajax(
           {
             url: 'suppcarte.php',
             method: 'POST',
             data :{ des: 1
                     
                   },
            success: function (response){
             if(response.indexOf('desactiver')>=0)
              {Swal.fire(
                  'Attention!',
                  'Vous avez desactiver votre carte',
                  'question'
                      )}
            },  
           }
        );
           $("#bote").text("Activer");
        }
     }
   </script>
   