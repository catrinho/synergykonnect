<?php
/* ---------------------------------------------------- 
//
//     Facebook Page Tab Application For Synergy
//
//-----------------------------------------------------*/

//Get PHP SDK
require_once('fb/facebook.php');

// Setting The Facebook Authentications
$facebook = new Facebook( array(
'appId'  => '333234520110394',
'secret' => '5d67c1725e38f819acfd9c134b727030', 
'cookie' => true, 
));

//Getting the Signed Request for User Login and Like Status
$signed_request = $facebook -> getSignedRequest();
$like_status = $signed_request["page"]["liked"];

//Displaying the Appropriate Content
if ($like_status == "1") {
    
    //Show a Register Page to Users who have Liked
    include 'register.php';
    //include 'mainapp.php';
    
} else {

    //Show a Like Page to Users who haven't Liked
    include 'likepage.php';
    
}
?>