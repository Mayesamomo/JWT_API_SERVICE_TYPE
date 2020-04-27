<?php

require 'databaseUsers.php';
require 'databaseServices.php';

//This function takes input from the user and makes a new user and also generates the jwt token
function createUser($userName, $password, $memberType) {
    global $dbUsers;
    $secret = "Michael's freeKey";
    $secret2 = "Michael's keyPremium";
    $token = array();
    $token['userName'] = $userName;
    $token['memType'] = $memberType;
    if ($memberType == 'Free') {
        $jwt = JWT::encode($token, $secret);
    } else if ($memberType == 'Premium') {
        $jwt = JWT::encode($token, $secret2);
    }


    $query = "INSERT INTO users (userName, pass, memeberType, apiKey) VALUES ('$userName','$password','$memberType','$jwt');";
    $statement = $dbUsers->prepare($query);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        
    }
}


//Use jason encode before sending data in curl then  decode in controller
function validateUser($userN, $password) {
    global $dbUsers;
    $query2 = "SELECT * FROM users where userName = '$userN' and pass = '$password';";
    $statement = $dbUsers->prepare($query2);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        
    }

    $userLoginInfo = $statement->fetchAll();
    $statement->closeCursor();
    return $userLoginInfo;
}

//This is the free service that all users can access and will return a list of all the teams that are playing
function freeService() {
    global $dbServices;
    $query = "SELECT * FROM TEAMS";

    $statement = $dbServices->prepare($query);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        
    }

    $teams = $statement->fetchAll();
    $statement->closeCursor();

    return $teams;
}

//This function is the first premium service and will get the ammount of goals a certin team has scored and takes input from the user to pick which team they want to view
function premiumService1($teamId) {
    global $dbServices;
    $query = "SELECT teams.name,results.homeGoal,results.awayGoal FROM TEAMs,results WHERE teams.id=$teamId AND homeTeam=$teamId;";

    $statement = $dbServices->prepare($query);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        
    }

    $team = $statement->fetchAll();
    $statement->closeCursor();

    return $team;
}

//This is the second premium service and takes input from the user to get the restuls of the matches where two teams have played each other
function premiumService2($team1, $team2) {
    global $dbServices;
    $query = "SELECT * FROM results where (awayTeam=$team1 or homeTeam=$team1) and (awayTeam=$team2 or homeTeam=$team2);";

    $statement = $dbServices->prepare($query);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        
    }

    $teamsVs = $statement->fetchAll();
    $statement->closeCursor();

    return $teamsVs;
}


//function to check api
function checkApi($api,$userName,$memberType) {
    //Creating api key using same data as inital creation
    $secret2 = "Seans keyPremium";
    $token = array();
    $token['userName'] = $userName;
    $token['memType'] = $memberType;
    $jwt = JWT::encode($token, $secret2);
    
    
    //Checking if the new key matches the old one
    if($jwt==$api){
        return true;
    }
}
