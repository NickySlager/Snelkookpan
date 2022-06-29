<?php require_once "header.php"?>
<body>
    <div class="wrapper">
        <div class="login-pagina-container">
            <div class="login-container">
                <form action="backend/loginController.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</labe>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-button">
                <input type="submit" name="submit" value="Login">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php require_once "footer.php"?>