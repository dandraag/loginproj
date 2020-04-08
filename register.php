

<!DOCTYPE html>
<html>
    <title>
        Register Here!
    </title>
    <body>
        <div id='container'>
            <div id="header">
                Register!
            </div>
            <div id="form">
                <form action="register.php" method="POST">
                    <div class="input-group">
                        <label for="username">Username:</label><br>
                        <input type="text" id="username" name="username"><br>
                    </div>
                    <div class="input-group">
                        <label for="password_1">Password:</label><br>
                        <input type="password" id="password_1" name="password_1"><br>
                    </div>
                    <div class="input-group">
                        <label for="password_2">Retype Password:</label><br>
                        <input type="password" id="password_2" name="password_2"><br>
                    </div>
                    <div class="input-group">
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name"><br>
                    </div>
                    <div class="input-group">
                        <label for="address">Address:</label><br>
                        <input type="text" id="address" name="address"><br>
                    </div>
                        <input type="submit" id="btn" name="reg_user">
                </form>
            </div>
        </div>
    </body>
</html>