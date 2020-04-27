<?php
include '../view/header.php';
?>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>Home Team ID</th>
            <th>Home Goal</th>
            <th>Away Goal</th>
            <th>Away Team ID</th>
            <th>Attendance</th>
        </tr>
    </thead>


<?php foreach ($premium2Ress as $premium2Res) { ?>
    <tbody class="table-stripe">
         <tr id="restbl">
        <td scope="col"><?php echo $premium2Res['homeTeam'] ?></td>
        <td scope="col"><?php echo $premium2Res['homeGoal'] ?></td>
        <td scope="col"><?php echo $premium2Res['awayGoal'] ?></td>
        <td scope="col"><?php echo $premium2Res['awayTeam'] ?></td>
        <td scope="col"><?php echo $premium2Res['attendance'] ?></td>

    </tr>
    </tbody>
   
<?php } ?>
</table>

<form id="formLogin"  action="../Controller/index.php" method="post">
    <input type='hidden' name='action' value="home">
    <button class="btn-primary" type ="submit">Home</button>
</form>
</body>
</html>
