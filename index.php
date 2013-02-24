<?php
/* ---------------------------------------------------- 
//
//  Facebook Admin Hunt Tab Application For Synergy
//
//	File Name: index.php
//	Author: Raisedadead a.k.a Mrugesh Mohapatra
//
//	Desc: Contains the at start landing methods 
//	for a user.
//-----------------------------------------------------*/


//Get PHP SDK
require_once('fb/facebook.php');

// Setting The Facebook Authentications
$facebook = new Facebook( array(
'appId'  => 'XXXXXXXXXXXXXXX', // App ID
'secret' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',  //APP SECRET
'cookie' => true, 
));

//Getting the Signed Request for User Login and Like Status
$signed_request = $facebook -> getSignedRequest();
$like_status = $signed_request["page"]["liked"];

//Displaying the Appropriate Content
if ($like_status == "1") {

    //Show a Register Page to Users who have Liked
    include 'register.php';

} else {

    //Show a Like Page to Users who haven't Liked
    include 'likepage.php';
}
?>