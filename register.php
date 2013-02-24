<!DOCTYPE html>

<html lang="en">

   <head>

    <meta charset="utf-8">

    <title>

    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- Le styles -->

    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <style>

      body { padding-top: 60px; /* 60px to make the container go all the way

      to the bottom of the topbar */ }

    </style>

    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

    <!--[if lt IE 9]>

      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">

      </script>

    <![endif]-->

    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">

    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">

    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <style>

    </style>

  </head>

  <body>

  

  <!-- FACEBOOK JAVASCRIPT SDK FOR AUTHORIZING APP -->

    <div id="fb-root"></div>

        <script>

          // Additional JS functions here

          window.fbAsyncInit = function() {

            FB.init({

              appId      : 'APP ID', // App ID

              channelUrl : '//raisedadead.koding.com/3e4f5dsynergykonnect/channel.html', // Channel File

              status     : true, // check login status

              cookie     : true, // enable cookies to allow the server to access the session

              xfbml      : true  // parse XFBML

            });

        

            // Additional init code here

            FB.getLoginStatus(function(response) {

              if (response.status === 'connected') {

                // connected

                // TODO: ADD REDIRECT TO NEXT PAGE

                window.location = 'mainapp.php';

              } else if (response.status === 'not_authorized') {

                // not_authorized

              } else {

                // not_logged_in

              }

             });

        

          };

          

          function login() {

            FB.login(function(response) {

                if (response.authResponse) {

                    // connected

                    // TODO: ADD REDIRECT TO NEXT PAGE

                    window.location = 'mainapp.php';

                } else {

                    // cancelled

                    window.location = 'Cancelled.html';

                }

            },{scope: 'email,user_birthday'});

          }

        

          // Load the SDK Asynchronously

          (function(d){

             var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];

             if (d.getElementById(id)) {return;}

             js = d.createElement('script'); js.id = id; js.async = true;

             js.src = "//connect.facebook.net/en_US/all.js";

             ref.parentNode.insertBefore(js, ref);

           }(document));

        </script>

    <!-- FACEBOOK JAVASCRIPT SDK FOR AUTHORIZING APP -->    

  

  <div class="container" style="width:800px">

    <div class="hero-unit">

    <img src="images/header.png" style="width:800px"/>

      <i class="icon-ok-sign">

      </i>

      <div>

        <h1>

          Almost There!

        </h1>

        <h4>

          <span style="font-size: 13px; line-height: 1.6em;">

            You will have to Register Via Facebook for Entering 

            the Contest! We belive in fair contest and we need 

			your Basic Info and Email. Please go ahead and click

			the register via Facebook button!

          </span>

        </h4>

      </div>

      <a class="btn btn-primary btn-large btn btn-block btn-primary" onClick="login()" href="#">

        Enter the Contest Now!

        <i class="icon-check icon-white">

        </i>

      </a>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script src="assets/js/bootstrap.js"></script>

  </div>

  </body>

</html>