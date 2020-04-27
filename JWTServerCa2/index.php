<?php

require_once 'JWT_class.php';
require 'functions.php';
//Getting the input for the service
$service = filter_input(INPUT_GET, 'Service');

//getting the users key 
$apiKey = filter_input(INPUT_GET, 'apiKey');
//Checking that the user sent over the service they want to use


switch ($service) {
    //Takes user input for username password and memberType and puts them into the create user methods to add a new user to the db
    case 'createUser';
        $userName = filter_input(INPUT_GET, 'userName');
        $password = filter_input(INPUT_GET, 'password');
        $memberType = filter_input(INPUT_GET, 'memType');
        $test = createUser($userName, $password, $memberType);
        break;
    //Takes the user Login info and checks the db to see if a record is found with the same login info.
    case 'validateUser';
        $userName = filter_input(INPUT_GET, 'userName');
        $password = filter_input(INPUT_GET, 'password');

        $validate = validateUser($userName, $password);
        $userInfo = json_encode($validate);
        print_r($userInfo);

        break;

    //This outputs the data for the free service when the users requests it
    case 'freeService';
        //Getting the results and json encoding them then printing them for the curl
        $freeSResults = freeService();
        $frees = json_encode($freeSResults);
        print_r($frees);

        break;


    //This case gets one inputs and checks the key to see if the user can access the premium service
    case 'premiumService1';
        //Getting user inp
        $teamId = filter_input(INPUT_GET, 'teamID');
        //Getting the results and json encoding them then printing them for the curl
        $ps1Res = premiumService1($teamId);
        $premium1Res = json_encode($ps1Res);
        print_r($premium1Res);


        break;
    //This case gets two inputs and checks the key to see if the user can access the premium service
    case 'premiumService2';
        
        //Getting the info for sql
        $team1 = filter_input(INPUT_GET, 'team1ID');
        $team2 = filter_input(INPUT_GET, 'team2ID');
        
        //Getting user info and checking the api key
//        $userName = filter_input(INPUT_GET, 'userName');
//        $memberType = filter_input(INPUT_GET, 'memType');
//        
//       $checks= checkApi($api, $userName, $memberType);

//Getting the results and json encoding them then printing them for the curl
        $ps2Res = premiumService2($team1, $team2);
        $premium12Res = json_encode($ps2Res);
        print_r($premium12Res);

        break;

    default:
}