<?php

    //Get PHP SDK
    require_once('fb/facebook.php');
    
    // Setting The Facebook Authentications
    $facebook = new Facebook( array(
    'appId'  => '333234520110394',
    'secret' => '5d67c1725e38f819acfd9c134b727030', 
    'cookie' => true, 
    ));
    
    $user = $facebook->getUser();
    
    if($user){
        try{
            $user_profile = $facebook->api('/me','GET');
        }catch(FacebookApiException $e){
            $user = NULL;
        }
    }
    
    $my_email = $user_profile['email'];
    
    require_once 'lib/MCAPI.class.php';
    require_once 'lib/config.inc.php'; //contains apikey
     
    $api = new MCAPI($apikey);
     
    $retval = $api->listMemberInfo( $listId, array($my_email) );
    
    //Debug Code
    /*
    if ($api->errorCode){
        echo "Unable to load listMemberInfo()!\n";
    	echo "\tCode=".$api->errorCode."\n";
    	echo "\tMsg=".$api->errorMessage."\n";
    } else {
    	echo "Success:".$retval['success']."\n";
    	echo "Errors:".sizeof($retval['error'])."\n";
    }*/
    
    if($retval['success']!=1){
?>

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
  
 <body scroll="no" style="overflow:hidden">
    <div id="fb-root"></div>
    <script type="text/javascript">
       window.fbAsyncInit = function() { 
            FB.init({appId: '333234520110394', status: true, cookie: true, xfbml: true, oauth: true});
        window.setTimeout(function() { 
            FB.Canvas.setAutoGrow(); }, 250); 
        }; 
         
        (function() { var e = document.createElement('script'); 
        e.async = true; 
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js'; 
        document.getElementById('fb-root').appendChild(e); }()); 
    </script>
    
    <div class="container" style="width:800px">
    
        <!-- MODAL DIV -->
            <div id="tnc" class="modal hide fade in" style="display: none; ">  
                <div class="modal-header">  
                    <a class="close" data-dismiss="modal">×</a>  
                    <h3>Terms and Conditions</h3>  
                </div>  
                <div class="modal-body">  
                    <h4>Kindly Note:</h4>  
                    <i class="icon-hdd"></i>
                    <h6>
                    The Data you are providing via this contest will not be used 
                    for purposes other than sending out updates and notifications in
                    conection with Synergy's Facebook Page</h6>
                    <i class="icon-user"></i>
                    <h6>
                    The Decision of the Contest Moderators shall be final and 
                    binding regarding all issues during and after the Contest.</h6>
                    <i class="icon-ban-circle"></i>
                    <h6>
                    Multiple Entries will be Auto-Disqualified by the System</h6>
                    <i class="icon-eye-open"></i>
                    <h6>
                    If Shortlisted, you will be screened Personally by Moderators</h6>
                    <i class="icon-envelope"></i>
                    <h6>
                    Please Note that by default, You will be SUBSCRIBED to our 
                    mailing lists. Requests to UNSUBSCRIBE will be entertained ONLY via 
                    Clicking on the UNSUBSCRIBE link in the mails you recieve!</h6>
                </div>  
                <div class="modal-footer">  
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>  
                </div>  
            </div>
    
      <div class="hero-unit">
      <img src="images/header.png"/>
        <hr>
        <div>
          <h3>
            Ready? Answer these:
          </h3>
          <h6>
            Please fill in the below form and you are ready to go!
          </h6>
        </div>
        <hr>
        <h4>
          Your Progress:
        </h4>
        
        <div class="progress progress-striped active">
          <div class="bar" style="width: 70%">
          </div>
        </div>
          <form action="post.php" method="post">
              <div class="controls controls-row">
                  <?php echo "<input id='name' name='name' type='text' value='".$user_profile['name']."' class='span5' placeholder='Your Full Name' required>"; ?> 
                  <?php echo "<input id='email' name='email' type='email' value='".$user_profile['email']."' class='span6' placeholder='Email address' required>"; ?>
              <!--
                  <input id="name" name="name" type="text" class="span5" placeholder="Your Full Name" required> 
                  <input id="email" name="email" type="email" class="span6" placeholder="Email address" required>
                -->
              </div>
            
             <div class="controls">
                  <?php echo"<input id='bday' name='bday' type='hidden' value='".$user_profile['birthday']."' "; ?>
                  <input id="ques1" name="ques1" type="text" class="span11" placeholder="What are the Buses of Synergy Called?">
                  <input id="ques2" name="ques2" type="text" class="span11" placeholder="There are four hostels, The Oldest is?">
                  <input id="ques3" name="ques3" type="text" class="span11" placeholder="Which building is powered by the windmill above TIFAC-CORE Building?">
                  <input id="ques4" name="ques4" type="text" class="span11" placeholder="What is the MOTTO in the Synergy's Emblem/Logo?">
              </div>
              
              <div class="controls controls-row">
                    <select id="role" name="role" class="input-xlarge span6">
                      <option>Select your Current Role</option>
                      <option>Faculty</option>
                      <option>Alumni - Passed Out Before 2011</option>
                      <option>Alumni - Passed Out in 2011</option>
                      <option>Alumni - Passed Out in 2012</option>
                      <option>Student - Passing Out in 2013</option>
                      <option>Student - Passing Out in 2014</option>
                      <option>Student - Passing Out in 2015</option>
                      <option>Student - Passing Out in 2016</option>
                    </select>
                    <select id="dept" name="dept" class="input-xlarge span5">
                      <option>Select Your Department</option>
                      <option>Computer Science And Engineering</option>
                      <option>Electronics and Telecommunication</option>
                      <option>Mechanical</option>
                      <option>Electrical</option>
                      <option>Information Technology</option>
                      <option>Civil</option>
                      <option>M.Tech or Basic Sciences or Others</option>
                    </select>                    
                </div>
            
              <div class="controls">
                  <textarea id="mesg" name="mesg" class="span11" placeholder="Why is Synergy The Best?" rows="5"></textarea>
              </div>
              
              <div class="controls controls-row">
                   <label class="checkbox">
                  <input type="checkbox" name="terms-and-conditions" required>
                  I agree to the <a data-toggle="modal" href="#tnc">Terms and Conditions</a>
                  </label>
                  <button id="contact-submit" type="submit" class="btn btn-primary btn-large pull-right">Submit Your Entry !</button>
              </div>
          </form>
               
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>

</html>

<?php

// ALREADY SUBSCRIBED PAGE

}else if($retval['success']==1){
?>

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
  <div class="container" style="width:800px">
    <div class="hero-unit">
    <img src="images/header.png" style="width:800px"/>
      <i class="icon-ok-sign">
      </i>
      <div>
      
      <hr>
      
        <h1>
          Howdy got addicted?
        </h1>
                <hr>
                <h4>
                  Your Progress:
                </h4>
                
                <div class="progress progress-striped active">
                  <div class="bar" style="width: 99%">
                  </div>
                </div>
                <hr>
        
        <h4>
          <span style="font-size: 13px; line-height: 1.6em;">
            Buddy you have already completed the entry into
            the contest and we cannot have multiple nominations
            from the same person! Just go ahead and share this 
            page if you want some stiff competition!
          </span>
        </h4>
      </div>
      
      <hr>
      
      <a class="btn btn-primary btn-large btn btn-block btn-primary" href="http://www.facebook.com/me" target="_top">
        Go Back to your Profile Page! 
        <i class="icon-user icon-white">
        </i>
      </a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </div>
  </body>
</html>

<?php

// ERROR IN FETCHING DATA AND NOT FOUND PAGE
}else{
    
    include 'tempError.html';
}
?>