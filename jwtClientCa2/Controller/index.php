<?php

//Starting session to store the user ifo
session_start();

//checking there is an action and if it is null setting it to the deafult action
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');

    if ($action == null) {
        $action = 'show_home';
    }
}
//Setting the basic url to access the server
$basicUrl = "http://localhost/JWTServerCa2/index.php";

switch ($action) {
    //The deafault case which shows the home page
    case 'show_home';
        include '../view/homePage.php';
        break;
    //Checking the user Login info
    case 'sign_in';
        
        //Getting user info and setting vars
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $flag=false;
        //building the url
        $keyReq = "?userName=" . $userName
                . "&password=" . $password
                . "&Service=validateUser";
        
        //using curl to get the json
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $userCheck = curl_exec($ch);
        //decoding the json returned
        $userInfos = json_decode($userCheck, true);
        curl_close($ch);
        
        //Putting user info in the the session
        foreach ($userInfos as $userInfo) {
            $_SESSION['api_key'] = $userInfo['apiKey'];
            $_SESSION['userN'] = $userInfo['userName'];
            $_SESSION['memType'] = $userInfo['memeberType'];
        }
        
        
       //Checking user login info
        foreach ($userInfos as $userInfo) {
            if ($userName == $userInfo['userName']) {
                if ($password == $userInfo['pass']) {
                    $flag=true;
                }
            } 
            
            
        }
         
        
        //Checking if the user has the correct login info
        if($flag==true){
            include '../view/home.php';
        }else if($flag==false){
            include '../view/homePage.php';
        }
        break;
    case 'createUser';
        
        //Getting user info from form
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $memType = filter_input(INPUT_POST, 'memType');
        //building url
        $keyReq = "?userName=" . $userName
                . "&password=" . $password
                . "&memType=" . $memType
                . "&Service=createUser";
        
        
        //Setting up and executing curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $user = curl_exec($ch);
        curl_close($ch);
        include '../view/homePage.php';
        break;
    
    
    //Getting sending url to server for free service with no inputs 
    case 'freeS';
        //building the url
        $keyReq = "?Service=freeService";
        
        
        //using curl to get the data
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $freeSResults = curl_exec($ch);
        curl_close($ch);
        
        //decoding the json data returned
        $freesRess = json_decode($freeSResults, true);


        include '../view/freeService.php';
        break;

    case 'preS1';
        //Getting the team id from user
        $team = filter_input(INPUT_POST, 'team');
        
        
        //building url
        $keyReq = "?teamID=" . $team .
                "&Service=premiumService1";
        
        
        //getting json using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $preS1 = curl_exec($ch);
        curl_close($ch);
        //decoding json
        $premiumRess = json_decode($preS1, true);
        include '../view/ps1Service.php';
        break;

    case 'preS2';
        //getting user info and info for sql
        $team = filter_input(INPUT_POST, 'team');
        $team2 = filter_input(INPUT_POST, 'team2');
        $userName = $_SESSION['userN'];
        $password = $_SESSION['memType'];
        $api = $_SESSION['api_key'];
        
        //bulding url

        $keyReq = "?team1ID=" . $team .
                "&team2ID=" . $team2 .
                "&userName=" . $userName .
                "&pass=" . $password .
                "&apiKey=" . $api .
                "&Service=premiumService2";
        
        
        //getting json using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $preS2 = curl_exec($ch);
        curl_close($ch);
        
        //decoding the json
        $premium2Ress = json_decode($preS2, true);
        include '../view/ps2Service.php';

        break;
    
    
    //For when user wants to return to homepage
    case 'home';
        include '../view/home.php';
        break;
}
