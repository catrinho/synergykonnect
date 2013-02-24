<?php

    $retval = false;
    
        
    $EMAIL = $_REQUEST['email'];
    $NAME = $_REQUEST['name'];
    $QUS1 = $_REQUEST['ques1'];
    $QUS2 = $_REQUEST['ques2'];
    $QUS3 = $_REQUEST['ques3'];
    $QUS4 = $_REQUEST['ques4'];
    $ROLE = $_REQUEST['role'];
    $DEPT = $_REQUEST['dept'];
    $MESG = $_REQUEST['mesg'];
    $BDAY = $_REQUEST['bday'];

    //TODO:ADD FORM CHECK
    $form_post = true;

    //Send the data to Mailchimp
    if($form_post == true ){ 
        
        require_once 'lib/MCAPI.class.php'; 
        require_once 'lib/config.inc.php'; 
        
        $my_email = $EMAIL;
        
        $double_optin = false;
        $send_welcome = false;
        
        $api = new MCAPI($apikey);  
        
        $merge_vars = Array( 
            'EMAIL' => $EMAIL, 
            'NAME' => $NAME, 
            'QUS1' => $QUS1,
            'QUS2' => $QUS2,
            'QUS3' => $QUS3,
            'QUS4' => $QUS4,
            'ROLE' => $ROLE,
            'DEPT' => $DEPT,
            'MESG' => $MESG,
            'BDAY' => $BDAY,
        );  
        
        $retval = $api->listSubscribe( 
            $listId, 
            $my_email, 
            $merge_vars, 
            $double_optin, 
            $send_welcome
        );
        
        if(retval) include 'tempSucess.html';
        else include 'tempError.html';
    }else{
        //TODO: include 'formError.html';
        
        //Debug Code
        
        echo "Field: "; echo $EMAIL; echo "<br>";
        echo "Field: "; echo $NAME; echo "<br>";
        echo "Field: "; echo $QUS1; echo "<br>";
        echo "Field: "; echo $QUS2; echo "<br>";
        echo "Field: "; echo $QUS3; echo "<br>";
        echo "Field: "; echo $QUS4; echo "<br>";
        echo "Field: "; echo $ROLE; echo "<br>";
        echo "Field: "; echo $DEPT; echo "<br>";
        echo "Field: "; echo $MESG; echo "<br>";
        echo "Field: "; echo $BDAY; echo "<br>";
        
    }

?>