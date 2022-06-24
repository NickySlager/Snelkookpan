<?php require_once "header.php"?>
<body>
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
        <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>