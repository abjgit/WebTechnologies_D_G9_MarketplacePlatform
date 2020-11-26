<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
            <td height="60px" width="500px">
                <img src="../asset/logo.png" height="60" width="110">
                <a href="reg.php">Registration</a>|
                <a href="../index.php">Mareket Place</a>
            </td>
        </tr>
        <tr>
            <td height="300px" width="500px">
                <form action="../php/logCheck.php" method="POST">
                    <fieldset>
                        <legend><b>Log in</b></legend>
                        Email: <input type="email" name="email"><br><br>
                        password: <input type="password" name="pass"><br>
                        <hr>
                        <input type="checkbox" name="rem_me">remember me<br>
                        <input type="reset" name="reset">
                        <input type="submit" name="submit" value="Log in">
                    </fieldset>
                </form>
                <?php
                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg']=='null')
                        {
                            echo "null submission...<br>Please enter all input to log in..<br>";
                        }
                        if($_REQUEST['msg']=='wrong')
                        {
                            echo "Sorry..Invalid email or password<br>";
                        }
                        if($_REQUEST['msg']=='deactive')
                        {
                            echo "The account is deactivated<br>";
                        }
                        if($_REQUEST['msg']=='de')
                        {
                            echo "Successfully, your account is deactivated..<br>";
                        }
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td height="60px" width="500px"></td>
        </tr>
    </table>
</body>
</html>