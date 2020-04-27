<?php
include '../view/header.php';
?>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th>Team Name</th>
        </tr> 
    </thead>
    <?php foreach ($freesRess as $freesRes) { ?>
        <tbody>
            <tr id="restbl">
                <td><?php echo $freesRes['name'] ?></td>
            </tr>
        </tbody>
        <tr id="restbl">
            <td><?php echo $freesRes['name'] ?></td>
        </tr>
    <?php } ?>
</table>

<form id="formLogin"  action="../Controller/index.php" method="post">
    <input type='hidden' name='action' value="home">
    <button class="btn btn-primary" type ="submit">Home</button>
</form>
</body>
</html>

