<?php
include '../view/header.php';
?>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th >Team Name</th>
            <th >Home Goal</th>
            <th >Away Goal</th> 
        </tr>   
    </thead>
    <?php foreach ($premiumRess as $premiumRes) { ?>
    <tbody>
         <tr id="restbl">
            <td scope="col"><?php echo $premiumRes['name'] ?></td>
            <td scope="col"><?php echo $premiumRes['homeGoal'] ?></td>
            <td scope="col"><?php echo $premiumRes['awayGoal'] ?></td>
        </tr>
    </tbody>
    <?php } ?>
</table>

<form id="formLogin"  action="../Controller/index.php" method="post">
    <input type='hidden' name='action' value="home">
    <button class="btn btn-primary" type ="submit">Home</button>
</form>
</div>
</html>