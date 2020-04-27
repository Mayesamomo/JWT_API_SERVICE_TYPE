<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="../CSS/common.css" rel="stylesheet" type="text/css"/>
        <script>
            function displayFormLogin(num)
            {
                if (num === 1)
                    document.getElementById("formLogin").style.display = "block";
            }

            function displayFormSignUp(num)
            {
                if (num === 1)
                    document.getElementById("formSignUp").style.display = "block";
            }
        </script>
    </head>
    <div class="container" id="bdy">
        <H1>League of Ireland App</H1>
        <button class="btn btn-success" onclick='displayFormLogin(1)' id='login'>Login</button>
        <button class="btn btn-success" onclick='displayFormSignUp(1)' id='signup'>Sign up</button>
        <section id='Userform'>
            <form id="formLogin" style='display:none' action="../Controller/index.php" method="post">
                <input type='hidden' name='action' value="sign_in">
                <input type='text' name ='userName' placeholder="Username"><br>
               <input type='password' name ='password' placeholder="Password"><br>
               <button class="btn btn-primary" type ="submit">Login</button>
            </form>
            <br><br>
            <form id="formSignUp" style='display:none' action="../Controller/index.php" method="post">
                <input type='hidden' name='action' value="createUser">
                <input type='text' name ='userName' placeholder="Username"><br>
                <input type='password' name ='password' placeholder="Password"><br>
                Member Type:<select class="form-control form-control-sm" name='memType'>
                    <option name ='memType'>Free</option>
                    <option name ='memType'>Premium</option>
                </select><br>
                <button class="btn btn-success" type ="submit">Sign Up</button>
            </form>
        </section>
    </body>
</html>

