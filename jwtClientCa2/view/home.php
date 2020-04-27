<?php
include '../view/header.php';
?>

<h3 class="card-title">Welcome <?php echo $_SESSION['userN']; ?></h3>
<form id='freeS' action="../Controller/index.php" method="post">
    <input type='hidden' name='action' value="freeS">
    <button class="btn btn-primary" type='submit' id="btnSub">Get All Teams</button>
</form>

<form id='ps1'action="../Controller/index.php" method="post">
    <input type='hidden' name='action' value="preS1">
    <select class="form-control form-control-sm" name='team'>
        <option name='team' value='1'>select a team</option>
        <option name='team' value='1'>Dundalk</option>
        <option name='team' value='2'>Shamrock Rovers</option> 
        <option name='team' value='4'>Bohemians</option> 
        <option name='team' value='5'>Derry City</option> 
        <option name='team' value='6'>St. Patricks Athletic</option> 
        <option name='team' value='7'>Sligo Rovers</option> 
        <option name='team' value='8'>Waterford</option> 
        <option name='team' value='9'>Cork City</option>
        <option name='team' value='10'>Finn Harps</option> 
        <option name='team'  value='11'>UCD</option> 
    </select><br><br>

    <button class="btn btn-primary" type='submit'>Get Home goals</button>
</form>

<form id='ps2' action="../Controller/index.php" method="post">
    <input type='hidden' name='action' value="preS2">
    <select class="form-control form-control-sm" name='team'>
        <option name='team' value='1'>select a team</option>
        <option name='team' value='1'>Dundalk</option>
        <option name='team' value='2'>Shamrock Rovers</option> 
        <option name='team' value='4'>Bohemians</option> 
        <option name='team' value='5'>Derry City</option> 
        <option name='team' value='6'>St. Patricks Athletic</option> 
        <option name='team' value='7'>Sligo Rovers</option> 
        <option name='team' value='8'>Waterford</option> 
        <option name='team' value='9'>Cork City</option>
        <option name='team' value='10'>Finn Harps</option> 
        <option name='team'  value='11'>UCD</option> 
    </select><br><br>

    <select name='team2'>
        <option name='team' value='1'>select a team</option>
        <option name='team2' value='1'>Dundalk</option>
        <option name='team2' value='2'>Shamrock Rovers</option> 
        <option name='team2' value='4'>Bohemians</option> 
        <option name='team2' value='5'>Derry City</option> 
        <option name='team2' value='6'>St. Patricks Athletic</option> 
        <option name='team2' value='7'>Sligo Rovers</option> 
        <option name='team2' value='8'>Waterford</option> 
        <option name='team2' value='9'>Cork City</option>
        <option name='team2' value='10'>Finn Harps</option> 
        <option name='team2'  value='11'>UCD</option> 
    </select><br><br>

    <button class="btn btn-primary" type='submit'>Teams VS Teams</button>
</form>
<div class="card-footer">
    <button class="btn btn-primary" onclick="showApi(1)" id="apiBtn">Show Api Key</button>
    <h2 style='display:none' id="api">Api Key: <?php echo $_SESSION['api_key']; ?></h2>
</div>

</div>
</html>


