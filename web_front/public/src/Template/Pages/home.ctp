<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'SAMI';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
     <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
     <!-- css -->
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('owl.theme.css') ?>
    <?= $this->Html->css('style.default.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('animate.css') ?>

    <!-- js -->
    <?= $this->Html->script('modernizr-2.6.2.min.js'); ?>

    <script src=""></script>
    <style>
    .new-banner-text{
        margin-right: 15px;
        text-align: left;
        font-size: 30px;
        text-transform: uppercase;
        font-weight: bold;
        padding-bottom: 5px;
    }
    #map {
      height: 100%;
    }
    /*#floating-panel {
       position: absolute;
       top: 10px;
       left: 25%;
       z-index: 5;
       background-color: #fff;
       padding: 5px;
       border: 1px solid #999;
       text-align: center;
       font-family: 'Roboto','sans-serif';
       line-height: 30px;
       padding-left: 10px;
     }*/
    </style>


</head>
<body data-spy="scroll" data-target="#navigation" data-offset="120">


          <!-- *** NAVBAR ***
          _________________________________________________________ -->

          <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand scrollTo" href="#intro">
                        <img src="img/logo.png" alt="" style="margin-top: -10%;">
                      </a>
                  </div>

                  <div class="navbar-collapse collapse" id="navigation">

                      <ul class="nav navbar-nav navbar-right">
                          <li class="active"><a href="#intro">Inicio</a>
                          </li>
                          <li><a href="#section1">Ruta Favorita</a>
                          </li>
                          <li><a href="#section2">Estadísticas</a>
                          </li>
                          <li><a href="#section4">Contact</a>
                          </li>
                      </ul>
                  </div>
                  <!--/.nav-collapse -->

              </div>
          </div>
          <!-- /#navbar -->

          <!-- *** NAVBAR END *** -->


          <div id="all">


              <!-- *** INTRO IMAGE ***
          _________________________________________________________ -->
              <div id="intro" class="clearfix">
                  <div class="item">
                      <div class="container">
                          <div class="row new-banner-text">

                              <h1 style="color:#0040FF;" data-animate="fadeInDown">Sami</h1>
                              <p  style="color:black;" class="message" data-animate="fadeInUp">Una mañana desperte con ganas de pasear <br> por mi ciudad gracias a Sami Security, puedo <br> siempre ver mis rutas mas seguras!!</p>


                          </div>
                      </div>
                  </div>
              </div>

              <!-- *** INTRO IMAGE END *** -->



              <!-- *** SERVICES ***
          _________________________________________________________ -->
              <div class="section" id="section1">
                  <div class="container">
                      <div class="col-md-12">
                          <h2 class="title" data-animate="fadeInDown">Ruta Favorita?</h2>

                          <div id="floating-panel">
                            <input id="address" type="textbox" placeholder="Ingrese dirección 1" class="col-md-4 col-md-offset-1">
                            <input id="address1" type="textbox" placeholder="Ingrese dirección 2" class="col-md-4 col-md-offset-1">
                            <input id="submit" type="button" value="Buscar">
                          </div>
                          <br>
                          <div style="height:500px;" id="map"></div>

                      </div>
                      <!-- /.12 -->
                  </div>
                  <!-- /.container -->
              </div>
              <!-- /.section -->

              <!-- *** SERVICES END *** -->


              <!-- *** Estadísticas ***
          _________________________________________________________ -->

              <div class="section  text-gray" id="section2">
                  <div class="container">
                      <div class="col-md-12">


                          <h2 class="title" data-animate="fadeInDown">Estadísticas</h2>

                          <div class="row">

                              <div class="col-md-8 col-md-offset-2">

                                  <p class="text-large text-thin"  data-animate="fadeInUp">Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. </p>
                                  <p class="text-large text-thin margin-bottom"  data-animate="fadeInUp">A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.</p>

                                  <p   data-animate="fadeInUp"><img src="img/team.jpg" alt="" class="img-circle img-responsive ondra-michal"></p>

                              </div>

                          </div>

                      </div>
                      <!-- /.12 -->
                  </div>
                  <!-- /.container -->
              </div>
              <!-- /.section -->

              <!-- *** Estadísticas END *** -->

              <!-- *** JOIN US ***
          _________________________________________________________ -->

              <div class="section" data-animate="bounceIn">
                  <div class="container">
                      <div class="col-md-8 col-md-offset-2">


                          <h2 class="title">Join us for the fun!</h2>

                          <p class="lead margin-bottom">Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy! ", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just.</p>


                          <div class="row">

                              <div class="col-md-8 col-md-offset-2">


                                  <form action="#" method="post" id="frm-landingPage2" class="form">
                                      <div class="input-group">

                                          <input type="text" class="form-control" placeholder="your email address" name="email" id="frm-landingPage2-email" required value="">

                                          <span class="input-group-btn">

                                              <input class="btn btn-default" type="submit" value="Submit" name="_submit" id="frm-landingPage2-submit">

                                          </span>

                                      </div>
                                      <!-- /input-group -->
                                  </form>
                              </div>
                          </div>

                      </div>
                      <!-- /.12 -->
                  </div>
                  <!-- /.container -->
              </div>
              <!-- /.section -->

              <!-- *** JOIN US END *** -->

              <!-- *** CONTACT ***
          _________________________________________________________ -->

              <div class="section" id="section4" >
                  <div class="container">
                      <div class="col-md-8 col-md-offset-2">


                          <h2 class="title" data-animate="fadeInDown">Contact us</h2>

                          <p class="lead margin-bottom" data-animate="fadeInUp">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>


                          <ul class="list-unstyled text-large text-thin" data-animate="fadeInUp">
                              <li><strong>E-mail:</strong> hello@hello.com</li>
                              <li><strong>Phone:</strong> 123 456 888</li>
                          </ul>

                      </div>
                      <!-- /.12 -->
                  </div>
                  <!-- /.container -->
              </div>
              <!-- /.section -->



              <!-- *** FOOTER ***
          _________________________________________________________ -->

              <div class="section" id="footer">
                  <div class="container">

                      <div class="row">

                          <div class="col-sm-6">

                              <p class="social">
                                  <a href="#" class="external facebook" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-facebook"></i></a>
                                  <a href="#" class="external instagram" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-instagram"></i></a>
                                  <a href="#" class="external twitter" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-twitter"></i></a>
                                  <a href="mailto:#" class="email" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-envelope"></i></a>
                              </p>
                          </div>
                          <!-- /.6 -->

                          <div class="col-sm-6">
                              <p>&copy; 2016 Your name goes here.
                                  <!-- Do not remove the attribution, thx! If you need to do so, pls donate (http://bootstrapious.com/donate) to support us! -->
                                  Template by <a href="https://www.bootstrapious.com/landing-pages" class="external">Bootstrapious</a>.</p>
                          </div>

                      </div>

                  </div>
                  <!-- /.container -->
              </div>
              <!-- /.section -->

              <!-- *** FOOTER END *** -->
          </div>

          <!-- js base -->

          <?= $this->Html->script('jquery-1.11.0.min.js'); ?>
          <?= $this->Html->script('bootstrap.min.js'); ?>
          <?= $this->Html->script('waypoints.min.js'); ?>
          <?= $this->Html->script('owl.carousel.min.js'); ?>
          <?= $this->Html->script('jquery.scrollTo.min.js'); ?>
          <?= $this->Html->script('front.js'); ?>


      </body>
</html>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCILxmzsVKpgprW3wmiVyBk3-ylNy2g8Vc"></script>
<script>

function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: {lat: -34.397, lng: 150.644}
  });
  directionsDisplay.setMap(map);

  // var geocoder = new google.maps.Geocoder();

  document.getElementById('submit').addEventListener('click', function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  });
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('address').value,
          destination: document.getElementById('address1').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

  // function geocodeAddress(geocoder, resultsMap) {
  //   var address = document.getElementById('address').value;
  //   geocoder.geocode({'address': address}, function(results, status) {
  //     if (status === 'OK') {
  //       resultsMap.setCenter(results[0].geometry.location);
  //       var marker = new google.maps.Marker({
  //         map: resultsMap,
  //         position: results[0].geometry.location
  //       });
  //     } else {
  //       alert('Geocode was not successful for the following reason: ' + status);
  //     }
  //   });
  //
  //   var address1 = document.getElementById('address1').value;
  //   geocoder.geocode({'address1': address}, function(results, status) {
  //     if (status === 'OK') {
  //       resultsMap.setCenter(results[0].geometry.location);
  //       var marker = new google.maps.Marker({
  //         map: resultsMap,
  //         position: results[0].geometry.location
  //       });
  //     } else {
  //       alert('Geocode was not successful for the following reason: ' + status);
  //     }
  //   });
  // }
  google.maps.event.addDomListener(window, 'load', initMap);
</script>

<!-- <script type="text/javascript">
$( document ).ready(function() {
  initMap();
});
</script> -->
